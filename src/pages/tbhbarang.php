<?php 
// cek belum masuk/login
if (!isset($_SESSION["pengguna"])) {
  header("Location: login.php");
  exit;
}

 require_once '../service/koneksi.php';

 if ( isset($_POST["kirim"])) {
  if (tambah($_POST) > 0) {
    echo "
      <script>
        alert('Data berhasil ditambahkan!');
        document.location.href = 'dasboar.php?section=tblbarang';
      </script>
    ";
  } else {
    echo "
      <script>
        alert('Data gagal ditambahkan!');
        document.location.href = 'dasboar.php?section=tblbarang';
      </script>
    ";
  }


 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Barang</title>
    <link rel="shortcut icon" href="../img/watch.png" type="image/x-icon">
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">

        <div>
            <img class="w-16 cursor-pointer mx-auto my-auto" src="../img/watch.png" alt="...">
        </div>

        <h2 class="text-2xl font-semibold mb-2 text-center my-1">Tambah Barang</h2>
        <div class="mb-6">
          <label for="id"class="mb-3 block text-base font-medium text-[#07074D]">No:</label>
          <input type="number" id="id" name="id" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>

        <div class="mb-4 my-3">
            <label for="nama" class="mb-3 block text-base font-medium text-[#07074D]">Nama Barang:</label>
            <input type="text" id="nama" name="nama_barang" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>
        <div class="mb-4 my-3">
            <label for="Gambar" class="mb-3 block text-base font-medium text-[#07074D]">Gambar:</label>
            <input type="file" id="Gambar" name="Gambar" min="0" class="w-full appearance-none rounded-md py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
        </div>
        <div class="mb-4">
            <label for="harga" class="mb-3 block text-base font-medium text-[#07074D]">Harga:</label>
            <input type="text" id="harga" name="harga" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>
        <div class="mb-4">
            <label for="merk" class="mb-3 block text-base font-medium text-[#07074D]">Merk:</label>
            <input type="text" id="merk" name="Merk" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>
        <div class="mb-4">
            <label for="jumlah" class="mb-3 block text-base font-medium text-[#07074D]">Jumlah:</label>
            <input type="number" id="jumlah" name="jumlah" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>
        <div class="flex justify-end my-2">
            <button type="submit" name="kirim"  class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">Kirim</button>
        </div>
    </form>
</body>

</html>