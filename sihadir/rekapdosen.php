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
    <title>Rekap Dosen</title>
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
          <a class="sihadir" href="berandaadmin.php">
            <img src="photo/logo sihadir 1.png" class="navbar-brand" />
            SIHADIR
          </a>
          <!-- <i class="fa-solid fa-bars" style="color: #fff" id="hamburger"></i> -->
        </nav>
        <div class="sidebar" id="sidebar">
          <div class="profil">
          <a href="editprofil_admin.php">
          <img src="<?php echo $fotoProfil; ?>" width="70" />
         </a>
            <div>
              <p><?php echo $username; ?></p>
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
          <i class="fa-solid fa-bars" style="color: #fff" id="hamburger"></i>
          <h1 class="center">REKAPAN DOSEN</h1>
        </div>
        <div class="admin1">
          <div class="row1">
            <div class="colum1">
              <div class="semester">
                Semester:<br />
                <select class="input-width">
                  <option name="semester" value="satu">Satu</option>
                  <option name="semester" value="dua">Dua</option>
                  <option name="semester" value="tiga">Tiga</option>
                  <option name="semester" value="empat">Empat</option>
                  <option name="semester" value="lima">Lima</option>
                  <option name="semester" value="enam">Enam</option>
                </select>
              </div>
              <div class="kk">
                Kode kelas <br />
                <select class="input-width">
                  <option name="kk" value="a">A</option>
                  <option name="kk" value="b">B</option>
                  <option name="kk" value="c">C</option>
                  <option name="kk" value="d">D</option>
                  <option name="kk" value="e">E</option>
                  <option name="kk" value="ic">IC</option>
                </select>
              </div>
              <div>
                <button class="input-width red-btn">REKAP ABSEN</button>
              </div>
            </div>
            <div class="colum2">
              <div class="period">
                M/B/S <br />
                <select class="input-width">
                  <option name="period" value="a">Minggu</option>
                  <option name="period" value="b">Bulan</option>
                  <option name="period" value="c">1 Semester</option>
                </select>
              </div>
              <div class="stat-btn">
                    <button class="red-btn" onclick="redirectToStatistik()">informasi statistik</button>
            </div>
            </div>
            <div class="colum3">
              <div class="bottom-right">
                <button class="red-btn">cetak</button>
              </div>
            </div>
          </div>
          <div class="row2">
            <div class="tabel">
              <table>
                <thead>
                  <tr>
                    <th>NO</th>
                    <th>NIP</th>
                    <th>NAMA DOSEN</th>
                    <th>SAKIT</th>
                    <th>IZIN</th>
                    <th>ALPHA</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>1</td>
                    <td>19730206 199501 1 001</td>
                    <td>Ferry Faisal, S.ST., M.T.</td>
                    <td>2</td>
                    <td>1</td>
                    <td>1</td>
                    
                  </tr>
                  <tr>
                    <td>2</td>
                    <td>19840611 201903 1 012</td>
                    <td>Lindung Siswanto, S.Kom., M.Eng</td>
                    <td>1</td>
                    <td>1</td>
                    <td>-</td>
                    
                  </tr>
                  <tr>
                    <td>3</td>
                    <td>19840717 201903 1 010</td>
                    <td>Tri Bowo Atmojo, S.T., M.Cs.</td>
                    <td>2</td>
                    <td>5</td>
                    <td>2</td>
                    
                  </tr>
                  <tr>
                    <td>4</td>
                    <td>19771002 201404 2 001</td>
                    <td>Neny Firyanti, S.T., M.T.</td>
                    <td>1</td>
                    <td>1</td>
                    <td>-</td>
                    
                  </tr>
                  <tr>
                    <td>5</td>
                    <td>19801102 201212 2 003</td>
                    <td>Budianingsih, S.T., M.T.</td>
                    <td>-</td>
                    <td>1</td>
                    <td>-</td>
                    
                  </tr>
                  <tr>
                    <td>6</td>
                    <td>19720304 199501 1 001</td>
                    <td>Yasir Arafat, S.ST., M.T.</td>
                    <td>2</td>
                    <td>-</td>
                    <td>1</td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script src="js/index.js"></script>
    <script>
  function redirectToStatistik() {
    window.location.href = 'statistik_dosen.php';
  }
</script>
  </body>
</html>