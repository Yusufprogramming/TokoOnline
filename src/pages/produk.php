<?php 
 session_start();
 require_once '../service/koneksi.php';

 $databarang = mysqli_query($conn,"SELECT * FROM barang");
 $produk = mysqli_fetch_all($databarang, MYSQLI_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produk</title>
    <link rel="shortcut icon" href="../img/watch.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="bg-gray-200">
    <header class="bg-white shadow">
        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8 flex justify-between">
            <h1 class="text-3xl font-bold tracking-tight text-gray-900">Produk</h1>
            <a href="logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0 0 13.5 3h-6a2.25 2.25 0 0 0-2.25 2.25v13.5A2.25 2.25 0 0 0 7.5 21h6a2.25 2.25 0 0 0 2.25-2.25V15m3 0 3-3m0 0-3-3m3 3H9" />
                </svg>
                </span>
            </a>
        </div>
    </header>

    <!-- component -->
    <?php foreach ($produk as $row) : ?>
    <div tabindex="0" class="focus:outline-none">
        <!-- Remove py-8 -->
        <div class="mx-auto container py-6">
            <div class="flex flex-wrap items-center lg:justify-evenly justify-center">
                <!-- Card 1 -->
                <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
                    <div>
                        <img alt="Jam Tangan" src="../img/<?= $row["gambar"]; ?>" tabindex="0" class="focus:outline-none w-full h-44" />
                    </div>
                    <div class="bg-white">
                        <div class="flex items-center justify-between px-4 pt-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" tabindex="0" class="focus:outline-none" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2"></path>
                                </svg>
                            </div>
                            <div class="bg-blue-500 px-1.5 px-6 rounded-full flex justify-center items-center">
                                <button type="submit" tabindex="0" class="text-white focus:outline-none text-xs">
                                    <a href="deskripsi1.php" class="p-2 block">Beli</a>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center">
                                <h2 tabindex="0" class="focus:outline-none text-lg font-semibold"><?= $row[""]; ?></h2>
                                <p tabindex="0" class="focus:outline-none text-xs text-gray-600 pl-5">1 hari yang lalu</p>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">Sebagian besar model G-Shock memiliki ketahanan air hingga 200 meter, membuatnya ideal untuk berenang, snorkeling, dan menyelam.</p>
                            <div class="flex mt-4">
                                <div>
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Garansi 12 bulan</p>
                                </div>
                                <div class="pl-2">
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Kotak lengkap</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-4">
                                <h2 tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-semibold">Jakarta Selatan, Indonesia</h2>
                                <h3 tabindex="0" class="focus:outline-none text-indigo-700 text-xl font-semibold"></h3>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
      
                

                <!-- <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
                    <div>
                        <img alt="person capturing an image" src="../img/apple.jpeg" tabindex="0" class="focus:outline-none w-full h-44" />
                    </div>
                    <div class="bg-white">
                        <div class="flex items-center justify-between px-4 pt-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" tabindex="0" class="focus:outline-none" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2"></path>
                                </svg>
                            </div>
                            <div class="bg-blue-500 px-1.5 px-6 rounded-full flex justify-center items-center">
                                <button type="submit" tabindex="0" class="text-white focus:outline-none text-xs">
                                    <a href="deskripsi2.php" class="p-2 block">Beli</a>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center">
                                <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">Apple</h2>
                                <p tabindex="0" class="focus:outline-none text-xs text-gray-600 pl-5">2 hari yang lalu</p>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">Apple Watch dilengkapi dengan layar Retina yang cerah dan tajam, dengan dukungan untuk layar selalu aktif (always-on display) pada model-model terbaru.</p>
                            <div class="flex mt-4">
                                <div>
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Garansi 6 bulan</p>
                                </div>
                                <div class="pl-2">
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Kotak lengkap</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-4">
                                <h2 tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-semibold">Jakarta, Indonesia</h2>
                                <h3 tabindex="0" class="focus:outline-none text-indigo-700 text-xl font-semibold"></h3>
                            </div>
                        </div>
                    </div>
                </div>
                

                <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
                    <div>
                        <img alt="person capturing an image" src="../img/samsung.jpeg" tabindex="0" class="focus:outline-none w-full h-44" />
                    </div>
                    <div class="bg-white">
                        <div class="flex items-center justify-between px-4 pt-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" tabindex="0" class="focus:outline-none" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2"></path>
                                </svg>
                            </div>
                            <div class="bg-blue-500 px-1.5 px-6 rounded-full flex justify-center items-center">
                                <button type="submit" tabindex="0" class="text-white focus:outline-none text-xs">
                                    <a href="deskripsi3.php" class="p-2 block">Beli</a>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center">
                                <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">Samsung</h2>
                                <p tabindex="0" class="focus:outline-none text-xs text-gray-600 pl-5">2 hari yang lalu</p>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">Menampilkan layar Super AMOLED yang cerah dan tajam, dengan dukungan untuk layar selalu aktif (always-on display) yang membuat tampilan jam tetap terlihat.</p>
                            <div class="flex mt-4">
                                <div>
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Garansi 3 Bulan</p>
                                </div>
                                <div class="pl-2">
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Kontak Lengkap</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-4">
                                <h2 tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-semibold">Sumatera selatan, Indenosia</h2>
                                <h3 tabindex="0" class="focus:outline-none text-indigo-700 text-xl font-semibold"></h3>
                            </div>
                        </div>
                    </div>
                </div>
               


                <div tabindex="0" class="focus:outline-none mx-2 w-72 xl:mb-0 mb-8">
                    <div>
                        <img alt="girl texting" src="../img/rolexx.jpeg" class="focus:outline-none w-full h-44" />
                    </div>
                    <div class="bg-white">
                        <div class="flex items-center justify-between px-4 pt-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" tabindex="0" class="focus:outline-none" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2"></path>
                                </svg>
                            </div>
                            <div class="bg-blue-500 px-1.5 px-6 rounded-full flex justify-center items-center">
                                <button type="submit" tabindex="0" class="text-white focus:outline-none text-xs">
                                    <a href="deskripsi4.php" class="p-2 block">Beli</a>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center">
                                <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">Rolex</h2>
                                <p tabindex="0" class="focus:outline-none text-xs text-gray-600 pl-5">5 hari yang lalu</p>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">Rolex menggunakan bahan-bahan berkualitas tinggi seperti emas 18 karat, platinum, dan Oystersteel (jenis stainless steel eksklusif Rolex) yang sangat tahan terhadap korosi</p>
                            <div class="flex mt-4">
                                <div>
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Garansi 12 Bulan</p>
                                </div>
                                <div class="pl-2">
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Kontak Lengkap</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-4">
                                <h2 tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-semibold">Bandung, Indonesia</h2>
                                <h3 tabindex="0" class="focus:outline-none text-indigo-700 text-xl font-semibold"></h3>
                            </div>
                        </div>
                    </div>
                </div>



                      <div>
                        <img alt="girl texting" src="../img/" class="focus:outline-none w-full h-44" />
                    </div>
                    <div class="bg-white">
                        <div class="flex items-center justify-between px-4 pt-4">
                            <div>
                                <svg xmlns="http://www.w3.org/2000/svg" tabindex="0" class="focus:outline-none" width="20" height="20" viewBox="0 0 24 24" stroke-width="1.5" stroke="#2c3e50" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M9 4h6a2 2 0 0 1 2 2v14l-5-3l-5 3v-14a2 2 0 0 1 2 -2"></path>
                                </svg>
                            </div>
                            <div class="bg-blue-500 px-1.5 px-6 rounded-full flex justify-center items-center">
                                <button type="submit" tabindex="0" class="text-white focus:outline-none text-xs">
                                    <a href="deskripsi4.php" class="p-2 block">Beli</a>
                                </button>
                            </div>
                        </div>
                        <div class="p-4">
                            <div class="flex items-center">
                                <h2 tabindex="0" class="focus:outline-none text-lg font-semibold">Rolex</h2>
                                <p tabindex="0" class="focus:outline-none text-xs text-gray-600 pl-5">5 hari yang lalu</p>
                            </div>
                            <p tabindex="0" class="focus:outline-none text-xs text-gray-600 mt-2">Rolex menggunakan bahan-bahan berkualitas tinggi seperti emas 18 karat, platinum, dan Oystersteel (jenis stainless steel eksklusif Rolex) yang sangat tahan terhadap korosi</p>
                            <div class="flex mt-4">
                                <div>
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Garansi 12 Bulan</p>
                                </div>
                                <div class="pl-2">
                                    <p tabindex="0" class="focus:outline-none text-xs text-gray-600 px-2 bg-gray-200 py-1">Kontak Lengkap</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between py-4">
                                <h2 tabindex="0" class="focus:outline-none text-indigo-700 text-xs font-semibold">Bandung, Indonesia</h2>
                                <h3 tabindex="0" class="focus:outline-none text-indigo-700 text-xl font-semibold"></h3>
                            </div>
                        </div>
                    </div>
                </div> -->
              
    <script src="chrome-extension://kgejglhpjiefppelpmljglcjbhoiplfn/shadydom.js"></script>
    <script>
        if (!window.ShadyDOM) window.ShadyDOM = {
            force: true,
            noPatch: true
        };
    </script>
</body>

</html>