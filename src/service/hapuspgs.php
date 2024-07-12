<?php 
// cek belum masuk/login
session_start();

if (!isset($_SESSION["pengguna"])) {
  header("Location: ../login.php");
  exit;
}

require_once 'koneksi.php';

// menangkap data id
$hapuspetugas = $_GET["id"];


// Memeriksa apakah data berhasil dihapus atau tidak

if ( hapuspetugas($hapuspetugas) > 0) {
  echo "
  <script>
    alert('Data berhasil dihapus!');
    document.location.href = '../pages/dasboar.php?section=tblpetugas';
  </script>
  ";
} else {
  echo "
  <script>
    alert('Data gagal dihapus!');
    document.location.href = '../pages/dasboar.php?section=tblpetugas';
  </script>
  ";
}
?>
