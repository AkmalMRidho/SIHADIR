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
    <title>Konfirmasi Absen</title>
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
          <a class="sihadir" href="berandadosen.php">
            <img src="photo/logo sihadir 1.png" class="navbar-brand" />
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
                <a href="berandadosen.php" style="color:black;text-decoration:none">
                  <p>Dashboard</p>
            </a>
              </div>
              <div class="detail">
                <p>MAIN UTAMA</p>
                <div class="dropdown" id="dropdown">
                  <a href="absensidosen.php" style="color:white;text-decoration:none">
                    <p>PRESENSI</p>
                  </a>
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
          <h1 class="center">KONFIRMASI ABSEN</h1>
        </div>
        <div class="admin1">

          <div class="row2">
            <div class="tabel">
              <table>
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NAMA MAHASISWA</th>
                    <th>KETERANGAN</th>
                    <th>JAM</th>
                    <th>KONFIRMASI</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>123456789</td>
                    <td>Lorem.</td>
                    <td>06.55</td>
                    <td> <button class="btn1">TERIMA</button>  <button class="btn2">TOLAK</button></td>
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>123456789</td>
                    <td>Lorem</td>
                    <td>06.55</td>
                    <td> <button class="btn1">TERIMA</button>  <button class="btn2">TOLAK</button></td>
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>123456789</td>
                    <td>Lorem</td>
                    <td>06.55</td>
                    <td> <button class="btn1">TERIMA</button>  <button class="btn2">TOLAK</button></td>
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>123456789</td>
                    <td>Lorem</td>
                    <td>06.55</td>
                    <td> <button class="btn1">TERIMA</button>  <button class="btn2">TOLAK</button></td>
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>123456789</td>
                    <td>Lorem</td>
                    <td>06.55</td>
                    <td> <button class="btn1">TERIMA</button>  <button class="btn2">TOLAK</button></td>
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>123456789</td>
                    <td>Lorem</td>
                    <td>06.55</td>
                    <td> <button class="btn1">TERIMA</button>  <button class="btn2">TOLAK</button></td>
                  </tr>
                  <tr>
                    <td>7</td>
                    <td>123456789</td>
                    <td>Lorem</td>
                    <td>06.55</td>
                    <td> <button class="btn1">TERIMA</button>  <button class="btn2">TOLAK</button></td>
                  </tr>
                  <tr>
                    <td>8</td>
                    <td>123456789</td>
                    <td>Lorem</td>
                    <td>06.55</td>
                    <td> <button class="btn1">TERIMA</button>  <button class="btn2">TOLAK</button></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/index.js"></script>
  </body>
</html>