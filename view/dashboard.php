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

    <?php include 'layouts/navbar.php' ?>
    <main id='peternak-dashboard' class="">
        <section class="bg-[#FFFAE6] w-full min-h-screen">
            <div class="max-w-screen-xl px-4 pt-36 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-36">
            <h2 class="text-5xl font-bold text-center mb-8">Berita</h2>
            <?php if(isset($_SESSION['success'])):?>
                    <div class=" mt-4 w-full lg:w-full text-sm lg:text-base lg:flex lg:justify-center mb-4 " id="alert">
                        <div class="p-2 bg-green-500 items-center text-indigo-100 leading-none rounded-full flex lg:inline-flex relative" role="alert" >
                            <span class="flex rounded-full bg-green-800 uppercase px-2 py-1 text-xs font-bold mr-3">Berhasil</span>
                            <span class="font-semibold mr-2 text-left flex-auto"><?= $_SESSION['success'] ?></span>
                            <span class="" id="close-btn">
                                <svg class="fill-current h-6 w-6 text-white-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
                <!-- Search Bar -->
                <div class="flex flex-col-reverse lg:flex-row items-center gap-4 mb-8 justify-between">
                    <div class="flex w-full items-center gap-4">
                            <!-- <form action="" method="post"> -->
                            <button type="submit"
                                class="shadow-md flex items-center justify-center gap-2 p-2.5 text-sm font-medium h-full text-white bg-[#FF5F00] rounded-lg shadow-lg">
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
                    <button type="button" class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-500 ease-in-out bg-[#FF5F00] hover:bg-[#FFC100] min-w-32 shadow-lg w-full lg:w-auto"
                    onclick="window.location='<?=urlpath('tambahberita')?>'">
                    Tambah
                    </button>
                    <?php endif; ?>
                </div>
                <div class="grid md:grid-cols-3 gap-6">
                    <?php foreach ($berita as $data) : ?>
                    <div class="bg-gray-100 p-6 rounded-lg shadow-lg">
                        <?php if(isset($data['thumbnail'])):?>
                            <img src="assets/berita/<?= $data['thumbnail'] ?>" alt="blog image" class="mb-4 max-h-40 w-full object-cover object-top">
                        <?php endif; ?>
                        <h3 class="text-xl font-bold mb-4"><?= $data['judul'] ?></h3>
                        <p class="mb-4"><?= substr($data['deskripsi'], 0, 100) ?>...</p>
                        <a href="<?=urlpath('berita?id='.$data['id'])?>" class="text-blue-600 hover:underline">Baca Selengkapnya</a>
                    </div>
                    <?php endforeach; ?>
                </div>

                <?php if ($total_pages > 1): ?>
                    <div class="mt-6">
                        <ul class="flex gap-2 justify-center">
                            <?php if ($current_page > 1): ?>
                                <li><a href="?page=<?= $current_page - 1 ?>" class="px-3 py-2 bg-gray-200 rounded-lg">Previous</a></li>
                                <?php if ($current_page > 3): ?>
                                    <li><a href="?page=<?= 1 ?>" class="px-3 py-2 bg-gray-200 rounded-lg">1</a></li>
                                    <li><span class="px-3 py-2 bg-gray-200 rounded-lg">...</span></li>
                                <?php endif; ?>
                            <?php endif; ?>
                            <?php
                            // Menampilkan tombol navigasi untuk halaman
                            for ($i = max(1, $current_page - 2); $i <= min($current_page + 2, $total_pages); $i++): ?>
                                <?php if ($i == $current_page): ?>
                                    <li><a href="?page=<?= $i ?>" class="px-3 py-2 bg-gray-300 text-gray-700 rounded-lg"><?= $i ?></a></li>
                                <?php else: ?>
                                    <li><a href="?page=<?= $i ?>" class="px-3 py-2 bg-gray-200 rounded-lg"><?= $i ?></a></li>
                                <?php endif; ?>
                            <?php endfor; ?>
                            <?php if ($current_page < $total_pages): ?>
                                <?php if ($current_page < $total_pages - 2): ?>
                                    <li><span class="px-3 py-2 bg-gray-200 rounded-lg">...</span></li>
                                    <li><a href="?page=<?= $total_pages ?>" class="px-3 py-2 bg-gray-200 rounded-lg"><?= $total_pages ?></a></li>
                                <?php endif; ?>
                                <li><a href="?page=<?= $current_page + 1 ?>" class="px-3 py-2 bg-gray-200 rounded-lg">Next</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                <?php endif; ?>

            </div>
        </section>
    </main>
    <!-- Footer -->
     <?php if(isset($_SESSION['success'])) unset($_SESSION['success']); ?>
    <?php include 'layouts/footer.php'; ?>
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
