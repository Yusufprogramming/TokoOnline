<?php
// cek belum masuk/login
session_start();

if (!isset($_SESSION["pengguna"])) {
  header("Location: login.php");
  exit;
}

require_once 'koneksi.php';

// Ambil data di URL
$id = $_GET["id"];

// Query data barang 
$data = query("SELECT * FROM penggunaa WHERE id = $id")[0];
// if (password_verify($_POST["katasandi"])) {
   
// }

// Cek tombol submit sudah ditekan atau belum
if (isset($_POST["kirim"])) {

  //Cek data berhasil diedit atau belum
   if (editpgs($_POST) > 0) {
    var_dump($tes); die;
  //   echo "
  //     <script>
  //       alert('Data berhasil diedit!');
  //       document.location.href = '../pages/dasboar.php?section=tblpetugas';
  //     </script>
  //   ";
  // } else {
  //   echo "
  //     <script>
  //       alert('Data gagal diedit!');
  //       document.location.href = '../pages/dasboar.php?section=tblpetugas';
  //     </script>
  //   ";
  };
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit barang</title>
  <link rel="shortcut icon" href="../img/watch.png" type="image/x-icon">
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- FONTS -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
  <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="bg-gray-100">
  <div class="container mx-auto px-4 py-8 flex item-center justify-center">
    <div class="shadow-md rounded-lg bg-white p-8 shadow-lg w-1/2">
      <form action="" method="post" enctype="multipart/form-data">
        <div>
          <img class="w-16 cursor-pointer mx-auto my-auto" src="../img/watch.png" alt="...">
        </div>

        <h2 class="text-2xl font-semibold mb-2 text-center my-1">Edit Barang</h2>
        <div class="mb-6">
          <label for="id" class="mb-3 block text-base font-medium text-[#07074D]">No:</label>
          <input type="number" id="id" name="id" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required value="<?= $data["id"]; ?>">
        </div>

        <div class="mb-4 my-3">
          <label for="nama" class="mb-3 block text-base font-medium text-[#07074D]">Nama Pengguna:</label>
          <input type="text" id="nama" name="nama_pengguna" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required
           value="<?= $data["nama_pengguna"]; ?>">
        </div>
        
        <div class="mb-4">
          <label for="merk" class="mb-3 block text-base font-medium text-[#07074D]">Email:</label>
          <input type="email" id="merk" name="Merk" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required
            value="<?= $data["email"]; ?>">
        </div>

        <div class="mb-4">
          <label for="harga" class="mb-3 block text-base font-medium text-[#07074D]">Kata Sandi:</label>
          <input type="password" id="harga" name="password" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required
           value="<?= $data["kata_sandi"]; ?>">
        </div>

        <div class="mb-5">
        <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">Jabatan</label>
        <select name="jabatan" id="guest" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" value="<?= $data["jabatan"]; ?>">
            <option value="">Pilih Kategori</option>
            <option value="admin">Admin</option>
            <option value="petugas">Petugas</option>
        </select>
    </div>
        <div class="flex justify-between my-8 mx-5 max-w-sm">
          <a href="../pages/dasboar.php" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-10 text-center text-sm font-semibold text-white outline-none">Kembali</a>
          <button type="submit" name="kirim" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-10 text-center text-base font-semibold text-white outline-none">Kirim</button>
        </div>
    </div>
  </div>

  </form>
</body>

</html>