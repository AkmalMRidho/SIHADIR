<?php
session_start();
include 'config/db.php';

// Cek apakah form login telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];
    $status = $_POST["status"];

    $conn = connectDB();

    $username = $conn->real_escape_string($username);
    $password = $conn->real_escape_string($password);
    $status = $conn->real_escape_string($status);

    $tableName = '';
    $usernameColumn = '';
    // Tentukan nama tabel dan kolom username berdasarkan status
    switch ($status) {
        case "mahasiswa":
            $tableName = "mahasiswa";
            $usernameColumn = "Nim";
            break;
        case "dosen":
            $tableName = "dosen";
            $usernameColumn = "Nama_Dosen";
            break;
        case "admin":
            $tableName = "admin";
            $usernameColumn = "Nama";
            break;
        default:
            $error = "Status tidak valid!";
            break;
    }

    if (empty($error)) {
        // Query untuk memeriksa kecocokan data login di tabel yang sesuai
        $query = "SELECT * FROM $tableName WHERE $usernameColumn='$username' AND password='$password'";
        $result = $conn->query($query);

        if ($result->num_rows == 1) {
            $_SESSION["username"] = $username;

            // Redirect ke dashboard sesuai dengan status
            $redirectUrl = "beranda" . strtolower($status) . ".php?login=success";
            header("Location: $redirectUrl");
            exit();
        } else {
            $error = "Username atau password salah!";
        }
    }

    $conn->close();
}
?>

<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Sunflower:wght@500&display=swap"
        rel="stylesheet">
</head>

<body>
    <div class="card">
        <div class="card2">
            <div class="container">
                <h1><img src="foto/logo sihadir.png" width="200"></h1>
                <h1>SIHADIR</h1>

                <?php if (isset($error)) { ?>
                    <p style="color: red;">
                        <?php echo $error; ?>
                    </p>
                <?php } ?>

                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <label for="username">Username:</label>
                    <input type="text" name="username" id="username" required><br>

                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" required><br>

                    <label for="status">Status:</label>
                    <div class="status">
                        <select name="status" id="status" required>
                            <option value="mahasiswa">Mahasiswa</option>
                            <option value="dosen">Dosen</option>
                            <option value="admin">Admin</option>
                        </select><br>
                        <div style="text-align: center;"><br><br><br><button type="submit">LOGIN</button></div>
                </form>
            </div>
</body>

</html>
