<?php
session_start();

// Hapus semua variabel sesi
session_unset();

// Hapus sesi
session_destroy();

// Redirect kembali ke halaman login
header("Location: Login.php");
exit();
?>