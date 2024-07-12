<?php
session_start();
require_once '../service/koneksi.php';

if (isset($_SESSION['pengguna'])) {
    $nama = $_SESSION['pengguna'];
} else {
    $nama = "Nama tidak ditemukan!";
}

// Determine which section to display based on the query parameter
$section = isset($_GET['section']) ? $_GET['section'] : 'produk';

// // Tombol cari ditekan
// if (isset($_POST["cari"])) {
//     $databarang = cari($_POST["keyword"]);
    
//    }
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dasboar</title>
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
    <div class="flex">
        <!-- Sidebar -->
        <div class="w-64 bg-gray-800 text-white min-h-screen" id="sidebar">
            <div class="p-7 flex justify-content">
                <div class="flex p-2 space-evenly">
                    <span>
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25" />
                        </svg>
                    </span>
                    <p class="text-2xl font-bold">Halo, <?= $nama; ?>!</p>
                </div>
            </div>

            <div class="px-4 py-2">
                <p class="text-gray-400 uppercase">Dasboar</p>
                <nav class="mt-4">
                    <a href="?section=produk" class="flex items-center p-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 1 0-7.5 0v4.5m11.356-1.993 1.263 12c.07.665-.45 1.243-1.119 1.243H4.25a1.125 1.125 0 0 1-1.12-1.243l1.264-12A1.125 1.125 0 0 1 5.513 7.5h12.974c.576 0 1.059.435 1.119 1.007ZM8.625 10.5a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Zm7.5 0a.375.375 0 1 1-.75 0 .375.375 0 0 1 .75 0Z" />
                        </svg>
                        <span class="ml-2">Produk</span>
                    </a>

                    <div class="mt-2">
                        <button id="pendataan-barang-button" class="flex items-center w-full p-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h3.75M9 15h3.75M9 18h3.75m3 .75H18a2.25 2.25 0 0 0 2.25-2.25V6.108c0-1.135-.845-2.098-1.976-2.192a48.424 48.424 0 0 0-1.123-.08m-5.801 0c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m0 0H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V9.375c0-.621-.504-1.125-1.125-1.125H8.25ZM6.75 12h.008v.008H6.75V12Zm0 3h.008v.008H6.75V15Zm0 3h.008v.008H6.75V18Z" />
                            </svg>
                            <span class="ml-2">Tambah Data</span>
                            <svg class="ml-auto h-5 w-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="submenu" class="mt-2 pl-8 hidden">
                            <a href="?section=petugas" class="block p-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded">Petugas</a>
                            <a href="?section=barang" class="block p-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded">Barang</a>
                        </div>
                    </div>
                    <div class="mt-2">
                        <button id="pendataan-barang-button2" class="flex items-center w-full p-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
                            </svg>

                            <span class="ml-2">Laporan</span>
                            <svg class="ml-auto h-5 w-5 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                        <div id="submenu2" class="mt-2 pl-8 hidden">
                            <a href="?section=tblpetugas" class="block p-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded">Petugas</a>
                            <a href="?section=tblbarang" class="block p-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded">Barang</a>
                        </div>
                    </div>

                    <!-- <a href="?section=laporan" class="flex items-center mt-2 p-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062
                            <a href="?section=laporan" class="flex items-center mt-2 p-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 3 18.72m9-3.72c3.313 0 6-2.687 6-6s-2.687-6-6-6-6 2.687-6 6 2.687 6 6 6zm0 0v3m-3 0h6" />
                    </svg>
                    <span class="ml-2">Laporan</span>
                </a> -->

                    <!-- <a href="?section=keluar" class="flex items-center mt-2 p-2 text-gray-300 hover:bg-gray-700 hover:text-white rounded">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25a3.75 3.75 0 0 0-7.5 0V9M12 15v6M12 3a9 9 0 0 1 9 9v4.5a4.5 4.5 0 0 1-4.5 4.5h-9a4.5 4.5 0 0 1-4.5-4.5V12a9 9 0 0 1 9-9z" />
                    </svg>
                    <span class="ml-2">Keluar</span>
                </a> -->
                </nav>
            </div>
        </div>

        <!-- Main content -->
        <div class="w-3/4 flex-1 items-center justify-center p-5">
            <div class="bg-white p-4 rounded shadow-md flex items-center justify-between">
                <button class="p-2 text-gray-700 hover:bg-gray-100 rounded">
                    <span class="material-icons"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12H12m-8.25 5.25h16.5" />
                        </svg></span>
                </button>

                <!-- Cari Barang -->
                <!-- <div class="my-2 mr-4 flex w-full items-center justify-between rounded-lg border px-3 py-3 sm:w-[350px] sm:flex-initial">
                    <input class="w-full text-sm outline-none" name="cari" placeholder="Cari Barang" />
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="h-5 w-6 text-gray-400">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z" />
                    </svg>
                </div> -->

                <!-- Akun admin -->
                <div class="relative ml-3">
                    <div>
                        <button type="button" class="relative flex rounded-full text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                            <span class="absolute -inset-1.5"></span>
                            <span class="sr-only">Open user menu</span>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-8">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                            </svg></button>
                    </div>
                    <div class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none hidden" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1" id="user-menu">
                        <a href="logout.php" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Keluar</a>
                    </div>
                </div>
            </div>



            <div class="flex-1 p-6">
                <?php if ($section == 'produk') : ?>
                    <div id="produk">
                        <?php include 'produk.php'; ?>
                    </div>
                <?php elseif ($section == 'petugas') : ?>
                    <div id="pembeli">
                        <?php include 'tbhpetugas.php'; ?>
                    </div>
                <?php elseif ($section == 'barang') : ?>
                    <div id="pembayaran">
                        <?php include 'tbhbarang.php'; ?>
                    </div>
                <?php elseif ($section == 'tblpetugas') : ?>
                    <div id="pendataan-barang-button2">
                        <?php include 'tblpetugas.php'; ?>
                    </div>
                <?php elseif ($section == 'tblbarang') : ?>
                    <div id="pendataan-barang-button2">
                        <?php include 'tblbarang.php'; ?>
                    </div>
                <?php endif; ?>
            </div>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const pendataanBarangButton = document.getElementById('pendataan-barang-button');
                    const submenu = document.getElementById('submenu');
                    pendataanBarangButton.addEventListener('click', function() {
                        submenu.classList.toggle('hidden');
                        submenu.classList.toggle('block');
                    });
                });

                document.addEventListener('DOMContentLoaded', function() {
                    const pendataanBarangButton2 = document.getElementById('pendataan-barang-button2');
                    const submenu = document.getElementById('submenu2');
                    pendataanBarangButton2.addEventListener('click', function() {
                        submenu.classList.toggle('hidden');
                        submenu.classList.toggle('block');
                    });
                });

                // Profile dropdown
                document.getElementById('user-menu-button').addEventListener('click', function() {
                    var userMenu = document.getElementById('user-menu');
                    userMenu.classList.toggle('hidden');
                });

                // Close the dropdown menu if the user clicks outside of it
                window.onclick = function(event) {
                    var userMenu = document.getElementById('user-menu');
                    if (!event.target.closest('#user-menu-button')) {
                        if (!userMenu.classList.contains('hidden')) {
                            userMenu.classList.add('hidden');
                        }
                    }
                };
            </script>
</body>

</html>