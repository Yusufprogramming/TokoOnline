<?php
// cek pengguna belum masuk/login
if (!isset($_SESSION["pengguna"])) {
    header("Location: ./service/koneksi.php");
    exit;
}

require_once '../service/koneksi.php';

$databarang = query("SELECT * FROM penggunaa ORDER BY id ASC");

// Tombol cari ditekan
if (isset($_POST["cari"])) {
    $databarang = caripetugas($_POST["keyword"]);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Petugas</title>
    <link rel="shortcut icon" href="../img/watch.png" type="image/x-icon">
</head>

<body>
    <div class="p-4">
        <h1 class="text-3xl mb-4">Data Petugas/Pengguna</h1>
        <div class="overflow-x-auto">
            <form action="" method="post">
                 <!-- Cari Barang -->
                 <div class="bg-white my-2 mr-4 flex w-full items-center justify-between rounded-lg border px-3 py-3 sm:w-[350px] sm:flex-initial">
                    <input type="text" name="keyword" class="w-full text-sm outline-none bg-white" placeholder="Cari Petugas">
                    <button type="submit" name="cari"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg></button>
                </div>
                <table class="min-w-full text-md bg-white shadow-md rounded mb-4">
                    <thead>
                        <tr class="border-b">
                            <th class="text-center p-3 px-5">No</th>
                            <th class="text-center p-3 px-5">Nama Pengguna</th>
                            <th class="text-center p-3 px-5">Kata Sandi</th>
                            <th class="text-center p-3 px-5">Email</th>
                            <th class="text-center p-3 px-5">Jabatan</th>
                            <th class="text-center p-3 px-5">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
            </form>
            <?php foreach ($databarang as $row) : ?>
                <tr class="text-center">
                    <td><?= $row["id"]; ?></td>
                    <td><?= $row["nama_pengguna"]; ?></td>
                    <td class="p-3"><?= $row["kata_sandi"]; ?></td>
                    <td><?= $row["email"]; ?></td>
                    <td><?= $row["jabatan"]; ?></td>
                    <td class="p-3 px-5 flex justify-end">
                        <a href="../service/editpgs.php?id=<?= $row["id"]; ?>" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                        <a href="../service/hapuspgs.php?id=<?= $row["id"]; ?>" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Hapus</a>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    </div>
</body>

</html>