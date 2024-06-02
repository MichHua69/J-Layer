<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>J-Layer</title>
</head>
<body>
    <section class="bg-[#FFFAE6]">
        <div class="grid max-w-screen-xl px-4 pt-28 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 relative">
            <div class="flex justify-between absolute top-8 items-center w-full px-4" id="navbar-menu">
                <div class="bg-[#FFC100] rounded-full h-full">
                    <img src="assets/images/logo.png" class="h-20" alt="">
                </div>
                <div class="space-x-2">
                    <button id='login-btn' onclick="window.location.href='<?= urlpath('login')?>'">Login</button>
                    <button id='register-btn' onclick="window.location.href='<?= urlpath('register')?>'">Register</button>
                </div>
            </div>
        </div>
    </section>
    <section class="bg-[#FFFAE6]">
        <div class="grid max-w-screen-xl px-4 pt-28 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:grid-cols-12 lg:py-28 lg:relative">
        
            <div class="mr-auto place-self-center lg:col-span-8">
                <h1 class="max-w-2xl mb-4 text-4xl font-extrabold leading-none tracking-tight md:text-5xl xl:text-6xl">Solusi Mudah untuk Pengajuan Pakan Peternak</h1>
                <p class="max-w-2xl mb-6 font-light text-gray-700 lg:mb-8 md:text-lg lg:text-xl">Mempermudah peternak dalam mendapatkan pakan berkualitas dengan cepat dan efisien.</p>
                <button id='ajukan-btn' onclick="window.location.href='<?php echo urlpath('login') ?>'">Ajukan Pakan</button>

            </div>
            <img src="assets/images/mains.png" alt="main image" class="hidden border-4 border-[#FFC100] right-0 lg:mt-0 lg:col-span-3 lg:flex lg-justify-center object-cover lg:h-full rounded-t-full">
        </div>
    </section>

    <!-- Blog/News Section -->
    <section class="bg-white py-20">
        <div class="container mx-auto px-6">
            <h2 class="text-3xl font-bold text-center mb-12">Blog</h2>
            <div class="grid md:grid-cols-3 gap-6">
                <div class="bg-gray-100 p-6 rounded-lg">
                    <img src="assets/images/ayam.jpg" alt="blog image" class="mb-4">
                    <h3 class="text-xl font-bold mb-4">Tips Memilih Pakan Berkualitas</h3>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna vitae nisl...</p>
                    <a href="#" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg">
                    <img src="assets/images/ayam.jpg" alt="blog image" class="mb-4">
                    <h3 class="text-xl font-bold mb-4">Manfaat Pakan Organik untuk Ternak</h3>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna vitae nisl...</p>
                    <a href="#" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                </div>
                <div class="bg-gray-100 p-6 rounded-lg">
                    <img src="assets/images/ayam.jpg" alt="blog image" class="mb-4">
                    <h3 class="text-xl font-bold mb-4">Cara Efektif Mengelola Stok Pakan</h3>
                    <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna vitae nisl...</p>
                    <a href="#" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-10">
        <div class="container mx-auto px-6 text-center">
            <p>&copy; 2024 J-Layer. All rights reserved.</p>
        </div>
    </footer>

    <script>
        function toggleSidebar(id) {
            const element = document.getElementById(id);
            if (element.classList.contains('-translate-x-full')) {
                element.classList.remove('-translate-x-full');
            } else {
                element.classList.add('-translate-x-full');
            }
        }
    </script>
    
</body>
</html>
<script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
