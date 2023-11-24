<?php
session_start();
include 'config/db.php';
if (isset($_SESSION["username"])) {
  $username = $_SESSION["username"];

     // Ambil data foto profil dari database
     $conn = connectDB();
     $query = "SELECT foto_admin FROM admin WHERE Nama = '$username'";
     $result = $conn->query($query);
   
     if ($result->num_rows == 1) {
       $row = $result->fetch_assoc();
       $fotoProfil = $row['foto_admin'];
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
  <title>Dashboard Admin</title>
  <link rel="stylesheet" href="css/beranda.css" />
  <link rel="stylesheet" href="css/responsive.css" />
  <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Sunflower:wght@500&display=swap"
    rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
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
        <a class="sihadir" href="berandaadmin.php">
          <img src="photo/logo sihadir 1.png" width="60" />
          <p>SIHADIR</p>
        </a>
        <!-- <i class="fa-solid fa-bars" style="color: #fff" id="hamburger"></i> -->
      </nav>
      <div class="sidebar" id="sidebar">
        <div class="profil">
        <a href="editprofil_admin.php">
        <img src="<?php echo $fotoProfil; ?>" width="70" />
        </a>
          <div>
            <p>
              <?php echo $username; ?>
            </p>
            <p>Admin Teknik Informatika</p>
          </div>
        </div>
        <div class="container">
          <div class="dashboard">
            <div class="data-dashboard">
              <img src="photo/home.png " width="30" />
              <a href="berandaadmin.php" style="color:black;text-decoration:none">
                <p>Dashboard</p>
              </a>
            </div>
            <div class="detail">
              <p>MAIN UTAMA</p>
              <div class="dropdown" id="dropdown">
                <p>REKAPAN ABSENSI</p>
                <i class="fa-solid fa-caret-down rotate-icon" id="icon-dropdown" style="color: #fff"></i>
              </div>
              <div class="panel" id="panel">
              <a href="rekapmhs.php"style="color:white;font-size:22px;text-decoration:none">
                <p>MAHASISWA</p>
                </a>
                <a href="rekapdosen.php"style="color:white;font-size:22px;text-decoration:none">
                <p>DOSEN</p>
                </a>
                <a href="kompensasi.php"style="color:white;font-size:22px;text-decoration:none">
                <p>DATA KOMPENSASI</p>
                </a>
                <br>
                <button class="btn" onclick="confirmLogout()">LOGOUT</button>
              </div>
            </div>
          </div>   
        </div>  
      </div>
    </div>
    
    <div class="content">
      <div class="title">
        <i class="fa-solid fa-bars" style="color: #fff",text-align:center id="hamburger"></i>
        <h1 class="center">Selamat Datang
          <?php echo $username; ?>
        </h1>
      </div>
      <div class="admin">
        <!--  <p>(NAMA ADMIN)</p> -->
        <div class="polnep">
          <img src="photo/logo polnep.png" width="80" />
          <h2>POLITEKNIK NEGERI PONTIANAK</h2>
          <p>Jl. Jenderal Ahmad Yani, Bansir Laut,</p>
          <p>Kec. Pontianak Tenggara, Kota Pontianak,</p>
          <p>Kalimantan Barat 78124</p>
        </div>
      </div>
    </div>
  </div>
  <script src="js/index.js"></script>
</body>

</html>