<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/main.css"> -->
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <title>Berita</title>
</head>
<body>
    <?php $role = $_SESSION['role'];?>
    <?php include 'layouts/navbar.php' ?>
    <main id='peternak-dashboard' class="">
        <section class="bg-[#FFFAE6] w-full">
            <div class="max-w-screen-xl px-4 pt-36 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-36">
            <h2 class="text-5xl font-bold text-center mb-8">Berita</h2>
                <!-- Search Bar -->
                <div class="flex flex-col-reverse lg:flex-row items-center gap-4 mb-8 justify-between">
                    <div class="flex w-full items-center gap-4">
                            <!-- <form action="" method="post"> -->
                            <button type="submit"
                                class="shadow-md flex items-center justify-center gap-2 p-2.5 text-sm font-medium h-full text-white bg-[#FFC100] rounded-lg shadow-lg">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 20 20">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                                </svg>
                                <span class="text-lg">Search</span>
                            </button>
                            <input type="search" id="search-dropdown" class="block p-2.5 text-md bg-gray-100 rounded-e-lg border-gray-300 border-3 rounded-lg shadow-lg w-full" placeholder="Cari Berita"/>
                            <!-- </form> -->
                        </div>
                    <?php if($role === 1): ?>
                    <button type="button" class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-[#FFC100] hover:bg-[#FFC100] min-w-32 shadow-lg w-full lg:w-auto"
                    onclick="window.location=''">
                    Tambah
                    </button>
                    <?php endif; ?>
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img src="assets/images/ayam.jpg" alt="blog image" class="mb-4">
                        <h3 class="text-xl font-bold mb-4">Tips Memilih Pakan Berkualitas</h3>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna vitae nisl...</p>
                        <a href="#" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img src="assets/images/ayam.jpg" alt="blog image" class="mb-4">
                        <h3 class="text-xl font-bold mb-4">Manfaat Pakan Organik untuk Ternak</h3>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna vitae nisl...</p>
                        <a href="#" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img src="assets/images/ayam.jpg" alt="blog image" class="mb-4">
                        <h3 class="text-xl font-bold mb-4">Cara Efektif Mengelola Stok Pakan</h3>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna vitae nisl...</p>
                        <a href="#" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img src="assets/images/ayam.jpg" alt="blog image" class="mb-4">
                        <h3 class="text-xl font-bold mb-4">Tips Memilih Pakan Berkualitas</h3>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna vitae nisl...</p>
                        <a href="#" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img src="assets/images/ayam.jpg" alt="blog image" class="mb-4">
                        <h3 class="text-xl font-bold mb-4">Manfaat Pakan Organik untuk Ternak</h3>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna vitae nisl...</p>
                        <a href="#" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                    </div>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <img src="assets/images/ayam.jpg" alt="blog image" class="mb-4">
                        <h3 class="text-xl font-bold mb-4">Cara Efektif Mengelola Stok Pakan</h3>
                        <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam non urna vitae nisl...</p>
                        <a href="#" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                    </div>
                </div>
            </div>
        </section>
    </main>
    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-3">
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
    <script>
        const detailBtn = document.getElementById('detail-btn');
        const validasiBtn = document.getElementById('validasi-btn');
        const setujuBtn = document.getElementById('setuju-btn');
        const tolakBtn = document.getElementById('tolak-btn');
        
        validasiBtn.addEventListener('click', () => {
            detailBtn.classList.add('hidden');
            validasiBtn.classList.add('hidden');
            setujuBtn.classList.remove('hidden');
            tolakBtn.classList.remove('hidden');
        });

    </script>
</body>
</html>
