<?php 
// cek belum masuk/login
session_start();

if (!isset($_SESSION["pengguna"])) {
  header("Location: ../login.php");
  exit;
}

require_once 'koneksi.php';

// menangkap data id
$hapus = $_GET["id"];


// Memeriksa apakah data berhasil dihapus atau tidak
if ( hapus($hapus) > 0) {
    echo "
    <script>
      alert('Data berhasil dihapus!');
      document.location.href = '../pages/dasboar.php?section=tblbarang';
    </script>
    ";
} else {
    echo "
    <script>
      alert('Data gagal dihapus!');
      document.location.href = '../pages/dasboar.php?section=tblbarang';
    </script>
    ";
}

?>
