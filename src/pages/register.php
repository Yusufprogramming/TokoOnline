<?php 
require '../service/koneksi.php';

 if (isset($_POST["daftar"])) {
    if (daftar($_POST) > 0) {
        echo "<script>
        alert('Nama Pengguna sudah ditambahkan!');
              document.location.href= 'login.php';
        </script>"; 
    } else {
        echo mysqli_error($conn);
    }
 }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Register</title>
  <link rel="shortcut icon" href="../img/watch.png" type="image/x-icon">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link href="./output.css" rel="stylesheet">
  <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
</head>
<body class="bg-gray-100">

  <div class="container mx-auto px-4 py-3 flex item-center justify-center">
    <div class="shadow-md rounded-lg bg-white p-10 shadow-lg w-1/2">

      <div>
         <img class="w-16 cursor-pointer mx-auto my-auto" src="../img/watch.png" alt="...">
      </div>

      <h1 class="text-xl font-bold mb-6 text-center">Daftar Sekarang</h1>

      <form action="" method="post">
      <div class="mb-6">
          <!-- <label for="id"  class="mb-3 block text-base font-medium text-[#07074D]">ID</label> -->
          <input type="hidden" id="id" name="id" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>
        <div class="mb-4">
          <label for="name" class="mb-2 block text-base font-medium text-[#07074D]">Nama</label>
          <input type="text" id="name" name="pengguna" placeholder="Masukan Nama" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>

        <div class="mb-4">
          <label for="email" class="mb-2 block text-base font-medium text-[#07074D]">Email</label>
          <input type="email" id="email" name="email" placeholder="Masukan Email" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>

        <div class="mb-4">
          <label for="password" class="mb-2 block text-base font-medium text-[#07074D]">Kata Sandi</label>
          <input type="password" id="password" name="katasandi" placeholder="Masukan Kata Sandi" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>

        <div class="mb-6">
          <label for="konfirm_password" class="mb-2 block text-base font-medium text-[#07074D]">Konfirmasi Kata Sandi</label>
          <input type="password" id="Konfirm_password" name="katasandi2" placeholder="Masukan Konfirmasi" min="0" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>
        <div class="mb-6">
          <!-- <label for="jabatan"  class="mb-3 block text-base font-medium text-[#07074D]">Konfirmasi Kata Sandi</label> -->
          <input type="hidden" id="jabatan" name="jabatan" value="user" class="w-full appearance-none rounded-md border border-[#e0e0e0] bg-white py-3 px-2 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" required>
        </div>

        <div class="mb-4">
            <button type="submit" name="daftar"
             class="w-full bg-blue-500 text-gray-100 font-bold py-2 px-4 rounded-lg hover:bg-blue-700">Daftar</button>
            
            <div class="text-center my-2 mx-auto">
                <p class="text-sm">Sudah punya akun?<a href="login.php" class="text-sm text-blue-500 hover:text-blue-700"> Masuk</a></p>
            </div>
        </div>
      </form>
    </div>
  </div>
</body>
</html>

</body>
</html>