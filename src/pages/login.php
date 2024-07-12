<?php
// Cek pengguna sudah masuk/login
session_start();
require '../service/koneksi.php';


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST["pengguna"]) && isset($_POST["katasandi"])) {
    $nama_pengguna = $_POST["pengguna"]; 
    $kata_sandi = $_POST["katasandi"]; 
     
    $query = "SELECT * FROM penggunaa WHERE nama_pengguna = '$nama_pengguna' and kata_sandi = '$kata_sandi'";
    $db = $conn -> query($query);
    $cek = $db -> num_rows;
    $tampil = $conn -> query("SELECT * FROM penggunaa WHERE nama_pengguna = '$nama_pengguna'");
    $jabatan = $tampil -> fetch_array();

    if ($cek > 0) {
       if ($jabatan['jabatan'] == 'admin' && 'petugas') {
         $_SESSION['pengguna'] = $nama_pengguna;
         header("Location: dasboar.php");
         exit;
       }elseif ($jabatan['jabatan'] == 'user') {
        $_SESSION['pengguna'] = $nama_pengguna;
        header("Location: produk.php");
        exit;
       }
    }
  }

    // // Mencegah SQL Injection dengan prepare statement
    // $query = "SELECT * FROM penggunaa WHERE nama_pengguna = ? AND kata_sandi = ?";
    // $stmt = $conn->prepare($query);
    
    // if ($stmt === false) {
    //     die('Prepare failed: ' . htmlspecialchars($conn->error));
    // }
    
    // $stmt->bind_param("ss", $nama_pengguna, $kata_Sandi);
    // if (!$stmt->execute()) {
    //     die('Execute failed: ' . htmlspecialchars($stmt->error));
    // }
    
    // $result = $stmt->get_result();
    // if ($result === false) {
    //     die('Get result failed: ' . htmlspecialchars($stmt->error));
    // }

    // if ($result->num_rows > 0) {
    //     // Menyimpan Informasi pengguna dalam sesi
    //     while ($row = $result->fetch_assoc()) {
    //         $_SESSION['pengguna'] = $row['nama_pengguna'];
    //         if ($row['jabatan'] == 'admin') {
    //             $_SESSION["masuk"] = true;
    //             $_SESSION["admin"] = true;
    //             // Redirect ke admin dashboard
    //             header("Location: dasboar.php");
    //             exit;
    //         } else {
    //             $_SESSION["masuk"] = true;
    //             $_SESSION['pengguna'] = $row['nama_pengguna'];
    //             // Redirect ke pengguna dashboard
    //             header("Location: produk.php");
    //             exit;
    //         }
    //     }
    // } else {
    //     echo "Gagal masuk!";
    // }

    // $stmt->close();


 //cek Cookie
 if (isset($_COOKIE['key']) && isset($_COOKIE['pengguna'])) {
  $id = $_COOKIE['key'];
  $pengguna = $_COOKIE['pengguna'];

  // Ambil pengguna berdasarkan id
  $hasil = mysqli_query($conn, "SELECT nama_pengguna FROM penggunaa WHERE id = $id");
  $data = mysqli_fetch_assoc($hasil);

  // pencocokan cookie dan pengguna
  if ($pengguna === hash('sha256', $data['nama_pengguna'])) {
      $_SESSION['masuk'] = true;
  }
}

if (isset($_POST["masuk"])) {

  $nama_pengguna = $_POST["pengguna"]; 
  $kata_Sandi = $_POST["katasandi"]; 
   
  $hasil = mysqli_query($conn, "SELECT * FROM penggunaa WHERE nama_pengguna = '$nama_pengguna'");

  // Cek Nama Pengguna dan Kata sandi
  if (mysqli_num_rows($hasil)=== 1) {
     $data = mysqli_fetch_assoc($hasil);
     if(password_verify($kata_Sandi, $data["katasandi"])); {
     
     // Set Session
     $_SESSION["pengguna"] = true;

    // Set Cookie
    if (isset($_POST["ingatsaya"])) {
       setcookie('key',$data['id'],time()+300);
       setcookie('pengguna',hash('sha256', $data['nama_pengguna'],time()+300));
    }
     header("Location: produk.php");
     exit;
  }
 } else {
   $error = true;
 }

}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link rel="shortcut icon" href="../img/watch.png" type="image/x-icon">
  <link href="./output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
  <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-sm">
    <div>
      <img class="w-16 cursor-pointer mx-auto my-auto" src="../img/watch.png" alt="...">
    </div>

    <h2 class="text-2xl font-bold text-center mb-6">Masuk</h2>
    <form action="" method="POST">
      <div class="mb-4">
        <label for="pengguna" class="mb-2 block text-base font-medium text-[#07074D]">Nama:</label>
        <input type="text" id="pengguna" name="pengguna" placeholder="Masukan Nama Anda" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
      </div>
      <div class="mb-4">
        <label for="password" class="mb-2 block text-base font-medium text-[#07074D]">Kata Sandi:</label>
        <input type="password" id="password" name="katasandi" placeholder="Masukan Kata Sandi Anda"  min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
      </div>

      <div class="mb-2 mx-2">
        <input type="checkbox" name="ingatsaya" id="ingatsaya">
        <label for="ingatsaya" class="text-sm py-2">Ingat saya</label>
      </div>

      <div class="mb-2">
        <button type="submit" name="masuk" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-700">
          Masuk
        </button>
      </div>

      <div class="text-center text-sm">
        <p>Tidak punya akun? <a href="register.php" class="text-blue-500 hover:text-blue-700"> Daftar</a></p>
      </div>
    </form>
  </div>

</body>

</html>