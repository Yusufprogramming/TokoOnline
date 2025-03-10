<!doctype html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>

<body class="font-[Poppins] bg-gradient-to-t from-[#fbc2eb] to-[#a6c1ee] h-screen">
    <header class="bg-gray-800 text-white">
        <nav class="flex justify-between items-center w-[92%]  mx-auto p-3">
            <div>
                <img class="w-16 cursor-pointer" src="src/img/watch.png" alt="...">
            </div
                class="nav-links duration-500 md:static absolute bg-white md:min-h-fit min-h-[60vh] left-0 top-[-100%] md:w-auto  w-full flex items-center px-5">
                <ul class="flex md:flex-row flex-col md:items-center md:gap-[4vw] gap-8">
                    <li>
                        <a class="hover:text-gray-500" href="index.php">Beranda</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="src/layout/tentang.php">Tentang</a>
                    </li>
                    <li>
                        <a class="hover:text-gray-500" href="src/layout/kontak.php">Kontak</a>
                    </li>
                </ul>
            </div>
            <div class="flex items-center gap-6">
                <button onclick="window.location.href='src/pages/register.php'" class=" bg-indigo-600  text-white px-5 py-2 rounded-full hover:bg-[#87acec]"  <a href="../pages/register.php"></a>Daftar</button>
                <ion-icon onclick="onToggleMenu(this)" name="menu" class="text-3xl cursor-pointer md:hidden"></ion-icon>
            </div>
    </header>


    <script>
        const navLinks = document.querySelector('.nav-links')
        function onToggleMenu(e){
            e.name = e.name === 'menu' ? 'close' : 'menu'
            navLinks.classList.toggle('top-[9%]')
        }
    </script>
</body>

</html>