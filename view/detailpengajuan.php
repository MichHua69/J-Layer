<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <title>Detail Pengajuan</title>
</head>
<body>
    <?php include 'layouts/navbar.php' ?>
    <section class="bg-[#FFFAE6] min-h-screen">
        <div class="max-w-screen-xl px-4 pt-36 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-36">
            <h1 class="text-center font-bold mb-8 text-3xl lg:text-5xl">Detail Pengajuan</h1>
            <div class="bg-white shadow-md rounded-lg p-8 mx-auto w-full lg:w-full">
                <form method="POST" action="" class=" space-y-6">
                    <div class="rounded-md">
                        <div class="mt-4">
                            <label class="font-semibold" for="alamat">Alamat</label>
                            <p class="mt-4">Alamatnya mana</p>
                        </div>
                        <div class="mt-4">
                            <label class="font-semibold" for="foto_peternakan">Foto Peternakan</label>
                            <div class="h-full w-full lg:w-2/3 lg:h-72 overflow-y-scroll rounded-md preview mb-2" id="foto_peternakan-container" style="scrollbar-width: none;">
                                <img id="foto_peternakan-preview" src="assets/images/ayam.jpg" alt="Foto Peternakan" class="w-full object-cover object-top" />
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="font-semibold" for="foto_usaha">Foto Surat Usaha</label>
                            <div class=" h-full w-full lg:w-2/3 lg:h-72 overflow-y-scroll rounded-md preview mb-2" id="foto_usaha-container" style="scrollbar-width: none;">
                                <img id="foto_usaha-preview" src="assets/images/ayam.jpg" alt="Foto Surat Usaha" class=" w-full object-cover object-top" />
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="font-semibold" for="jumlah_pakan">Jumlah Pakan Yang Diajukan (Kg)</label>
                            <p class="mt-4">30 kg</p>
                        </div>                             
                    </div>
                    
                    <div class="flex justify-center items-center gap-2">
                        <button
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-medium rounded-md text-white bg-[#FF5F00] hover:bg-[#FFFAE6] hover:text-[#FF5F00]"
                            type="submit"
                        >
                            Validasi
                        </button>
                        <button
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-medium rounded-md text-white bg-[#FF5F00] hover:bg-[#FFFAE6] hover:text-[#FF5F00]"
                            type="submit"
                        >
                            Tolak
                        </button>
                    </div>
                    <div>
                        <div class="mt-4">
                            <select id="validation" class="mt-4 w-full p-4 bg-[#ebebec] rounded-md" name="validation">
                                <option value="sedangdiproses">Sedang Diproses</option>
                                <option value="validasi">Telah Validasi</option>
                                <option value="tolak">Di Tolak</option>
                            </select>
                        </div> 
                    </div>
                </form>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white py-2">
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
