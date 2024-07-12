<?php

require_once '../service/koneksi.php';

if (isset($_POST["kirim"])) {
    // Coba menambahkan petugas baru
    if (tambahpetugas($_POST) > 0) {
        echo "
        <script>
            alert('Data berhasil ditambahkan!');
            document.location.href = './dasboar.php?section=tblpetugas';
        </script>
        ";
    } else {
        // Jika penambahan petugas gagal, langsung keluar dengan pesan gagal
        echo "
        <script>
            alert('Data gagal ditambahkan!');
            document.location.href = './dasboar.php?section=tblpetugas';
        </script>
        ";
        exit;
    }

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

if (isset($_POST["kirim"])) {

  $nama_pengguna = $_POST["pengguna"]; 
  $kata_Sandi = $_POST["kata_sandi"]; 
   
  $hasil = mysqli_query($conn, "SELECT * FROM penggunaa WHERE nama_pengguna = '$nama_pengguna'");

  // Cek Nama Pengguna dan Kata sandi
  if (mysqli_num_rows($hasil)=== 1) {
     $data = mysqli_fetch_assoc($hasil);
     if(password_verify($kata_Sandi, $data["kata_sandi"])); {
     
     // Set Session
     $_SESSION["pengguna"] = true;

    // Set Cookie
    if (isset($_POST["ingatsaya"])) {
       setcookie('key',$data['id'],time()+300);
       setcookie('pengguna',hash('sha256', $data['nama_pengguna'],time()+300));
    }
     header("Location: ./dasboar.php?section=tblpetugas");
     exit;
  }
 } else {
   $error = true;
 }
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Petugas</title>
    <link rel="shortcut icon" href="../img/watch.png" type="image/x-icon">
</head>
<body>
<div class="px-6 py-4">

<form action="" method="post">

    <div>
        <img class="w-16 cursor-pointer mx-auto my-auto" src="../img/watch.png" alt="...">
    </div>

    <h2 class="text-2xl font-semibold mb-2 text-center my-1">Tambah Petugas</h2>
    <div class="mb-6">
          <label for="id" class="mb-3 block text-base font-medium text-[#07074D]">No:</label>
          <input type="number" id="id" name="id" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>

    <div class="mb-4 my-3">
        <label for="nama" class="mb-3 block text-base font-medium text-[#07074D]">Nama Petugas:</label>
        <input type="text" id="nama" name="pengguna" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
    </div>
    <div class="mb-4 my-3">
        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">Email:</label>
        <input type="email" id="email" name="email" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
    </div>
    <div class="mb-4 my-3">
        <label for="kata_sandi" class="mb-3 block text-base font-medium text-[#07074D]">Kata Sandi:</label>
        <input type="password" id="kata_sandi" name="kata_sandi" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
    </div>
    <div class="mb-5">
        <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">Jabatan</label>
        <select name="jabatan" id="guest" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
            <option value="">Pilih Kategori</option>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
    </div>

    <div class="flex justify-end my-2">
        <button type="submit" name="kirim" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">Kirim</button>
    </div>
</form>
</body>
</html>