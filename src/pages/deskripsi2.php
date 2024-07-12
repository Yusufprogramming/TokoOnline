<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembeli</title>
    <link rel="shortcut icon" href="../img/watch.png" type="image/x-icon">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- component -->
    <div class="flex items-center justify-center p-12">
        <div class="mx-auto w-full max-w-[1200px] bg-white p-8 rounded-lg shadow-lg">
            <form action="https://formbold.com/s/FORM_ID" method="POST" class="flex flex-wrap">
                <div class="w-full lg:w-1/2 p-4">
                    <div class="mb-6">
                        <img src="../img/apple.jpeg" alt="Watch" class="w-full rounded-md shadow-md" />
                    </div>
                </div>
                <div class="w-full lg:w-1/2 p-4">
                    <div class="mb-6">
                        <label for="fName" class="mb-3 block text-base font-medium text-[#07074D]">
                            Nama Depan
                        </label>
                        <input type="text" name="fName" id="fName" placeholder="Nama Depan" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-6">
                        <label for="lName" class="mb-3 block text-base font-medium text-[#07074D]"> Nama Belakang
                        </label>
                        <input type="text" name="lName" id="lName" placeholder="Nama Belakang" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-6">
                        <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">Merk
                        </label>
                        <select name="guest" id="guest" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">Pilih Kategori</option>
                            <option value="G-SHOCK">G-SHOCK</option>
                            <option value="Apple">Apple</option>
                            <option value="Samsung">Samsung</option>
                            <option value="Rolex">Rolex</option>
                        </select>
                    </div>
                    <div class="mb-6">
                        <label for="quantity" class="mb-3 block text-base font-medium text-[#07074D]">Jumlah
                        </label>
                        <input type="number" name="quantity" id="quantity" placeholder="5" min="0" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-6">
                        <label for="email" class="mb-3 block text-base font-medium text-[#07074D]">Email / No Telepon
                        </label>
                        <input type="text" name="email" id="email" placeholder="@gmail.com/08233" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md" />
                    </div>
                    <div class="mb-6">
                        <label for="guest" class="mb-3 block text-base font-medium text-[#07074D]">Metode Pembayaran
                        </label>
                        <select name="pembayaran" id="guest" class="w-full rounded-md border border-[#e0e0e0] bg-white py-3 px-6 text-base font-medium text-[#6B7280] outline-none focus:border-[#6A64F1] focus:shadow-md">
                            <option value="">Pilih Kategori</option>
                            <option value="G-SHOCK">BCA</option>
                            <option value="Apple">BRI</option>
                            <option value="Samsung">Bank Mandiri</option>
                            <option value="Rolex">Gopay</option>
                        </select>
                    </div>
                    <div class="flex justify-between">
                        <button type="button" class="hover:shadow-form rounded-md  bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            <a href="produk.php">Batal</a>
                        </button>
                        <button type="submit" class="hover:shadow-form rounded-md bg-[#6A64F1] py-3 px-8 text-center text-base font-semibold text-white outline-none">
                            Kirim
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
