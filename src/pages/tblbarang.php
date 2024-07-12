<?php
// cek pengguna belum masuk/login
if (!isset($_SESSION["pengguna"])) {
    header("Location: login.php");
    exit;
}

require_once '../service/koneksi.php';

$databarang = query("SELECT * FROM barang ORDER BY id ASC");

// Tombol cari ditekan
if (isset($_POST["cari"])) {
    $databarang = cari($_POST["keyword"]);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel Barang</title>
    <link rel="shortcut icon" href="../img/watch.png" type="image/x-icon">
</head>

<body>
    <div class="p-4">
        <h1 class="text-3xl mb-4">Data Barang</h1>

        <div class="overflow-x-auto">
            <form action="" method="post" enctype="multipart/form-data">
                <!-- Cari Barang -->
                <div class="bg-white my-2 mr-4 flex w-full items-center justify-between rounded-lg border px-3 py-3 sm:w-[350px] sm:flex-initial">
                    <input type="text" name="keyword" class="w-full text-sm outline-none bg-white" placeholder="Cari Barang">
                    <button type="submit" name="cari"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-6 text-gray-400">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                        </svg></button>
                </div>
                <table class="min-w-full text-md bg-white shadow-md rounded mb-4">
                    <thead>
                        <tr class="border-b">
                            <th class="text-left p-3 px-8">No</th>
                            <th class="text-left p-3 px-8">Gambar</th>
                            <th class="text-left p-3 px-8">Nama Barang</th>
                            <th class="text-left p-3 px-8">Harga</th>
                            <th class="text-left p-3 px-8">Merk</th>
                            <th class="text-left p-3 px-8">Jumlah</th>
                            <th class="text-left p-3 px-8">Aksi</th>
                        </tr>
                    </thead>
                <tbody>
            </form>
            <?php foreach ($databarang as $row) : ?>
                <tr class="text-center">
                    <td><?= $row["id"]; ?></td>
                    <td><img src="src/img/<?= $row["gambar"]; ?>" class="w-50"></td>
                    <td><?= $row["nama_barang"]; ?></td>
                    <td><?= $row["harga"]; ?></td>
                    <td><?= $row["merk"]; ?></td>
                    <td><?= $row["jumlah"]; ?></td>
                    <td class="p-3 px-5 flex justify-end">
                        <button type="submit" name="edit"><a href="../service/edit.php?id=<?= $row["id"]; ?>" class="mr-3 text-sm bg-blue-500 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a></button>
                        <button type="submit" name="hapus"><a href="../service/hapus.php?id=<?= $row["id"]; ?>" class="text-sm bg-red-500 hover:bg-red-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Hapus</a></button>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
            </table>
        </div>
    </div>
</body>

</html>