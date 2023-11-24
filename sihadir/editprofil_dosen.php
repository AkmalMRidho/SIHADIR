<?php
?>

<html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profil Dosen</title>
    <link rel="stylesheet" href="css/style2.css">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Sunflower:wght@500&display=swap"
        rel="stylesheet">
</head>

<body>

    <div class="card">
        <div class="card2">
            <div class="container">
                <div class="gambar1" style="text-align: center;">
                    <a href="berandadosen.php">
                        <img src="photo/logo sihadir 1.png" width="60" />
                    </a>
                </div>
                <form action="/update_profil_mahasiswa" method="post" enctype="multipart/form-data">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama" placeholder="Nama Lengkap" required>

                    <label for="nip">NIP:</label>
                    <input type="text" id="nip" name="nip" placeholder="Masukkan NIP" required>

                    <label for="foto">Foto Profil:</label>
                    <input type="file" id="foto" name="foto" accept="image/*">

                    <label for="password">Password Baru:</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password baru">

                    <label for="konfirmasi_password">Konfirmasi Password:</label>
                    <input type="password" id="konfirmasi_password" name="konfirmasi_password"
                        placeholder="Konfirmasi password baru">

                    <div style="text-align: center;"><br><br><br><button type="submit">Simpan Perubahanan</button></div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>