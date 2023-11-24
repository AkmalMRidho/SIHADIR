<?php
session_start();
include 'config/db.php';
if (isset($_SESSION["username"])) {
    $username = $_SESSION["username"];

    // Ambil data foto profil dari database
   $conn = connectDB();
   $query = "SELECT foto_dosen FROM dosen WHERE Nama_Dosen = '$username'";
   $result = $conn->query($query);
 
   if ($result->num_rows == 1) {
     $row = $result->fetch_assoc();
     $fotoProfil = $row['foto_dosen'];
   } else {
     // Default jika tidak ada foto profil
     $fotoProfil = 'user.png';
   }
 
   $conn->close();
} else {
    echo '<script>alert("Maaf ! Anda Belum Login !!");</script>';
    echo '<script>window.location="user.php";</script>';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Absensi Dosen</title>
    <link rel="stylesheet" href="css/beranda.css" />
    <link rel="stylesheet" href="css/responsive.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Sunflower:wght@500&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"/>
      <style>
    /* Tambahkan style untuk membuat bingkai bulat pada foto profil */
    .profil img {
      border-radius: 50%;
    }
  </style>
  <script>
    function confirmLogout() {
      var confirmation = confirm("Apakah Anda yakin ingin logout?");
      if (confirmation) {
        window.location = "logout.php";
      }
    }
  </script>
  </head>
  <body>
    <div class="beranda">
      <div class="body">
        <nav>
          <a class="sihadir" href="absensidosen.php">
            <img src="photo/logo sihadir 1.png" width="60" />
            SIHADIR
          </a>
          <!-- <i class="fa-solid fa-bars" style="color: #fff" id="hamburger"></i> -->
        </nav>
        <div class="sidebar" id="sidebar">
          <div class="profil">
          <a href="editprofil_dosen.php">
          <img src="<?php echo $fotoProfil; ?>" width="70" />
         </a>
            <div>
              <p><?php echo $username; ?></p>
              <p>Dosen</p>
            </div>
          </div>
          <div class="container">
            <div class="dashboard">
              <div class="data-dashboard">
                <img src="photo/home.png " width="30" />
                <a href="berandadosen.php" style="color:black;text-decoration:none"><p>Dashboard</p></a>
              </div>
              <div class="detail">
                <p>MAIN UTAMA</p>
                <div class="dropdown" id="dropdown">
                  <p>PRESENSI</p>
                </div>
                <a href="konfirmasiabsen.php"style="color:white;font-size:22px;text-decoration:none">
                <p>KONFIRMASI ABSEN</p>
              </a>
              </div>
            </div>
            <button class="btn" onclick="confirmLogout()">LOGOUT</button>
          </div>
        </div>
      </div>
      <div class="content">
        <div class="title">
          <i class="fa-solid fa-bars" style="color: #fff" id="hamburger"></i>
          <h1 class="center">Silahkan Isi Presensi</h1>
        </div>
        <div class="admin2">
            <p>Keterangan Absensi :</p>
            <div class="admin-btn">
            <button class="btn">Hadir</button>
            <button class="btn">Ijin</button>
            <button class="btn">Sakit</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/index.js"></script>
  </body>
</html>