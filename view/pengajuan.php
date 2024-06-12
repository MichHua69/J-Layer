<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <!-- <link rel="stylesheet" href="assets/css/main.css"> -->
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <title>J-Layer</title>
</head>
<body>
    <?php include 'layouts/navbar.php' ?>
    <?php if ($role === 1): ?>
    <main id='dinas-dashboard' class="">
        <section class="bg-[#FFFAE6] w-full min-h-screen">
            <div class="max-w-screen-xl px-4 pt-36 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-36">
                <h1 class="text-center font-bold mb-8 text-3xl lg:text-5xl">Data Pengajuan</h1>
                <div class="bg-white shadow-md rounded-lg p-4 mx-auto w-full lg:w-full">
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Nama Peternak</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Pengajuan Pakan</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Status</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center w-full" id="tbody-dinas">
                            <?php foreach ($pengajuan as $item): ?>
                            <tr>
                                <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg"><?= $item['peternak'] ?></td>
                                <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg"><?= $item['jumlah_pakan'] ?> kg</td>
                                <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <?php 
                                        if ($item['id_status_validasi'] == 3) {
                                            echo $item['status_validasi'];
                                        } else if ($item['id_status_validasi'] == 1 && $item['id_status_konfirmasi'] == 1) {
                                            echo $item['status_validasi'];
                                            
                                        } else if ($item['id_status_validasi'] == 2 && $item['id_status_konfirmasi'] == 1) {
                                            echo $item['status_validasi'];
                                        } else {
                                            echo $item['status_konfirmasi'];
                                        } 
                                    ?>
                                </td>
                                <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <div class="flex gap-2 justify-center">
                                    <?php if ($item['id_status_validasi'] == 1):?>
                                        <button class="font-semibold items-center gap-2 bg-[#FF0000] text-white hover:bg-red-800 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn" onclick="window.location.href='<?= urlpath('detailpengajuan')?>?id=<?= $item['id'] ?>'">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Detail Pengajuan</span>
                                        </button>
                                    <?php elseif($item['id_status_validasi'] == 2 && $item['id_status_konfirmasi'] == 1) : ?>
                                        <button class="font-semibold items-center gap-2 bg-blue-600 text-white hover:bg-blue-800 py-3 px-4 rounded-lg flex justify-center w-full text-center items-center" onclick="window.location.href='<?= urlpath('detailvalidasi')?>?id=<?= $item['id'] ?>'">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Detail Validasi</span>
                                        </button>
                                    <?php elseif ($item['id_status_validasi'] == 2 && $item['id_status_konfirmasi'] == 2): ?>
                                        <button class="font-semibold items-center gap-2 bg-[#008A33] text-white hover:bg-green-800 py-3 px-4 rounded-lg flex justify-center w-full text-center" onclick="window.location.href='<?= urlpath('detailkonfirmasi') . '?id=' . $item['id'] ?>'"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Detail Konfirmasi</span>
                                        </button>
                                    <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if ($total_pages > 1): ?>
                    <div class="mt-6">
                        <ul class="flex gap-2 justify-center">
                            <?php if ($current_page > 1): ?>
                                <?php if ($current_page > 3): ?>
                                    <li><a href="?page=<?= 1 ?>" class="px-3 py-2 bg-gray-200 rounded-lg">1</a></li>
                                    <li><span class="px-3 py-2 bg-gray-200 rounded-lg">...</span></li>
                                <?php endif; ?>
                                <li><a href="?page=<?= $current_page - 1 ?>" class="px-3 py-2 bg-gray-200 rounded-lg">Previous</a></li>
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
    <?php elseif ($role === 2): ?>
    <main id='kepalaternak-dashboard' class="">
        <section class="bg-[#FFFAE6] w-full min-h-screen">
            <div class="max-w-screen-xl px-4 pt-36 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-36">
                <h1 class="text-center font-bold mb-8 text-3xl lg:text-5xl">Data Pengajuan</h1>
                <div class="bg-white shadow-md rounded-lg p-4 mx-auto w-full lg:w-full">
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Tanggal Pengambilan</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Jumlah Pakan yang Divalidasi</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Status</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center w-full" id="tbody-kepala">
                            <?php foreach ($validasi as $item): 
                                ?>
                                <tr>
                                    <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg"><?= date('d-m-Y', strtotime($item['tanggal_pengambilan'])) ?></td>
                                    <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg"><?= $item['jumlah_pakan'] ?> kg</td>
                                    <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg"><?php 
                                        if ($item['pengajuan']['id_status_validasi'] == 3) {
                                            echo $item['status_validasi'];
                                        } else if ($item['pengajuan']['id_status_validasi'] == 1 && $item['pengajuan']['id_status_konfirmasi'] == 1) {
                                            echo $item['status_validasi'];
                                            
                                        } else if ($item['pengajuan']['id_status_validasi'] == 2 && $item['pengajuan']['id_status_konfirmasi'] == 1) {
                                            echo $item['status_validasi'];
                                        } else {
                                            echo $item['status_konfirmasi'];
                                        } 
                                    ?></td>
                                    <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                        <div class="flex gap-2 justify-center">
                                        <?php if($item['pengajuan']['id_status_validasi'] == 2 && $item['pengajuan']['id_status_konfirmasi'] == 1):?>
                                            <button class="font-semibold items-center gap-2 bg-blue-600 text-white hover:bg-blue-800 py-3 px-4 rounded-lg flex justify-center w-full text-center items-center" onclick="window.location.href='<?= urlpath('detailvalidasi') ?>?id=<?= $item['pengajuan']['id'] ?>'">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                                <span class="hidden lg:block">Detail Validasi</span>
                                            </button>
                                        <?php else :?>
                                            <button class="font-semibold items-center gap-2 bg-[#008A33] text-white hover:bg-green-800 py-3 px-4 rounded-lg flex justify-center w-full text-center" onclick="window.location.href='<?= urlpath('detailkonfirmasi') . '?id=' . $item['id'] ?>'"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Detail Konfirmasi</span>
                                            </button>
                                        <?php endif;?>
                                        </div>

                                    </td>

                            <?php endforeach;?>
                        </tbody>
                    </table>
                </div>
                <?php if ($total_pages > 1): ?>
                    <div class="mt-6">
                        <ul class="flex gap-2 justify-center">
                            <?php if ($current_page > 1): ?>
                                <?php if ($current_page > 3): ?>
                                    <li><a href="?page=<?= 1 ?>" class="px-3 py-2 bg-gray-200 rounded-lg">1</a></li>
                                    <li><span class="px-3 py-2 bg-gray-200 rounded-lg">...</span></li>
                                <?php endif; ?>
                                <li><a href="?page=<?= $current_page - 1 ?>" class="px-3 py-2 bg-gray-200 rounded-lg">Previous</a></li>
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
    <?php elseif ($role === 3): ?>
    <main id='peternak-dashboard' class="">
        <section class="bg-[#FFFAE6] w-full min-h-screen">
            <div class="max-w-screen-xl px-4 pt-36 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-36">
                <h1 class="text-center font-bold mb-8 text-3xl lg:text-5xl">Data Pengajuan</h1>
                <?php if(isset($_SESSION['success'])):?>
                    <div class=" mt-4 w-full lg:w-full text-sm lg:text-base lg:flex lg:justify-center mb-4 " id="alert">
                        <div class="p-2 bg-[#008A33] items-center text-indigo-100 leading-none rounded-full flex lg:inline-flex relative" role="alert" >
                            <span class="flex rounded-full bg-green-800 uppercase px-2 py-1 text-xs font-bold mr-3">Berhasil</span>
                            <span class="font-semibold mr-2 text-left flex-auto"><?= $_SESSION['success'] ?></span>
                            <span class="" id="close-btn">
                                <svg class="fill-current h-6 w-6 text-white-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                            </span>
                        </div>
                    </div>
                <?php endif; ?>
                <div class="flex justify-end lg:w-full">
                    <button type="button" class="inline-block rounded rounded-lg text-center py-2 text-xl font-bold uppercase leading-normal text-white shadow-dark-3 transition duration-150 ease-in-out bg-[#FF5F00] hover:bg-[#FFC100] min-w-32 shadow-lg w-full transition ease-out duration-300"
                    onclick="window.location='<?= urlpath('tambahpengajuan') ?>'">
                    Tambah
                    </button>
                </div>
                
                <div class="bg-white shadow-md rounded-lg p-4 mx-auto w-full lg:w-full mt-4">

                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">No Pengajuan</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Status</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center w-full" id="tbody-peternak">
                        <?php foreach ($pengajuan as $item): ?>
                            <tr>
                                <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg"><?= $item['id'] ?></td>
                                <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <?php
                                        if ($item['id_status_validasi'] == 3) {
                                            echo $item['status_validasi'];
                                        } else if ($item['id_status_validasi'] == 1 && $item['id_status_konfirmasi'] == 1) {
                                            echo $item['status_validasi'];
                                            
                                        } else if ($item['id_status_validasi'] == 2 && $item['id_status_konfirmasi'] == 1) {
                                            echo $item['status_validasi'];
                                        } else {
                                            echo $item['status_konfirmasi'];
                                        } 
                                    ?>
                                </td>
                                <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                <div class="flex gap-2">
                                <?php if ($item['id_status_validasi'] == 1 && $item['id_status_konfirmasi'] == 1 ): ?>
                                    <button class="font-semibold items-center gap-2 bg-[#FF0000] text-white hover:bg-red-800 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn" onclick="window.location.href='<?= urlpath('detailpengajuan')?>?id=<?= $item['id'] ?>'">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                        <span class="hidden lg:block">Detail Pengajuan</span>
                                    </button>
                                
                                    
                                <?php elseif ($item['id_status_validasi'] == 2 && $item['id_status_konfirmasi'] == 1): ?>
                                    <button class="font-semibold items-center gap-2 bg-blue-600 text-white hover:bg-blue-800 py-3 px-4 rounded-lg flex justify-center w-full text-center items-center" onclick="window.location.href='<?= urlpath('detailvalidasi') ?>?id=<?= $item['id'] ?>'">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                        <span class="hidden lg:block">Detail Validasi</span>
                                    </button>
                                </div>
                                <?php elseif ($item['id_status_validasi'] == 2 && $item['id_status_konfirmasi'] == 2): ?>
                                    <button class="font-semibold items-center gap-2 bg-[#008A33] text-white hover:bg-green-800 py-3 px-4 rounded-lg flex justify-center w-full text-center" onclick="window.location.href='<?= urlpath('detailkonfirmasi') . '?id=' . $item['id'] ?>'"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                    <span class="hidden lg:block">Detail Konfirmasi</span>
                                    </button>       
                                <?php else: ?>
                                    <!-- <span class="text-red-600">Ditolak</span> -->
                                <?php endif; ?>
                                    
                                </td>
                            </tr>
                        <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
                <?php if ($total_pages > 1): ?>
                    <div class="mt-6">
                        <ul class="flex gap-2 justify-center">
                            <?php if ($current_page > 1): ?>
                                <?php if ($current_page > 3): ?>
                                    <li><a href="?page=<?= 1 ?>" class="px-3 py-2 bg-gray-200 rounded-lg">1</a></li>
                                    <li><span class="px-3 py-2 bg-gray-200 rounded-lg">...</span></li>
                                <?php endif; ?>
                                <li><a href="?page=<?= $current_page - 1 ?>" class="px-3 py-2 bg-gray-200 rounded-lg">Previous</a></li>
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
    <?php endif; ?>
    <?php 
        if(isset($_SESSION['success'])) unset($_SESSION['success']);
        if(isset($_SESSION['alamat'])) unset($_SESSION['alamat']);
        if(isset($_SESSION['id_jumlah_populasi_ayam'])) unset($_SESSION['id_jumlah_populasi_ayam']);
        if(isset($_SESSION['jumlah_populasi_ayam'])) unset($_SESSION['jumlah_populasi-ayam']);
        if(isset($_SESSION['jumlah_pakan'])) unset($_SESSION['jumlah_pakan']);
    ?>
    <!-- Footer -->
    <?php include 'layouts/footer.php'; ?>

    <script>
        $(document).ready(function(){
            loadData();
            setInterval(loadData, 5000);
        });

        function loadData() {
           $.ajax({
                url: '<?= urlpath('ajax') ?>',
                type: 'GET',
                dataType: 'json', // Pastikan data yang diterima adalah JSON
                success: function(response) {
                    console.log(response); // Log untuk memeriksa struktur data yang diterima
                    if (response.role == 3) {
                        $('#tbody-peternak').empty(); // Menghapus isi sebelumnya

                        // Mengelola dan menampilkan data pengajuan
                        response.pengajuan.forEach(function(item) {
                            var statusValidasi = "";
                            if (item.id_status_validasi == 3) {
                                statusValidasi = item.status_validasi;
                            } else if (item.id_status_validasi == 1 && item.id_status_konfirmasi == 1) {
                                statusValidasi = item.status_validasi;
                            } else if (item.id_status_validasi == 2 && item.id_status_konfirmasi == 1) {
                                statusValidasi = item.status_validasi;
                            } else {
                                statusValidasi = item.status_konfirmasi;
                            }

                            var actionButton = "";
                            if (item.id_status_validasi == 1 && item.id_status_konfirmasi == 1) {
                                actionButton = `<button class="font-semibold items-center gap-2 bg-[#FF0000] text-white hover:bg-red-800 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" onclick="window.location.href='<?= urlpath('detailpengajuan')?>?id=${item.id}'">
                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" height="20" width="20">
                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path>
                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path>
                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path>
                                    </svg>
                                    <span class="hidden lg:block">Detail Pengajuan</span>
                                </button>`;
                            } else if (item.id_status_validasi == 2 && item.id_status_konfirmasi == 1) {
                                actionButton = `<button class="font-semibold items-center gap-2 bg-blue-600 text-white hover:bg-blue-800 py-3 px-4 rounded-lg flex justify-center w-full text-center items-center" onclick="window.location.href='<?= urlpath('detailvalidasi')?>?id=${item.id}'">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" height="20" width="20">
                                                    <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path>
                                                    <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path>
                                                    <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path>
                                                </svg>
                                                <span class="hidden lg:block">Detail Validasi</span>
                                            </button>`;
                            } else if (item.id_status_validasi == 2 && item.id_status_konfirmasi == 2) {
                                actionButton = `<button class="font-semibold items-center gap-2 bg-[#008A33] text-white hover:bg-green-800 py-3 px-4 rounded-lg flex justify-center w-full text-center items-center" onclick="window.location.href='<?= urlpath('detailkonfirmasi')?>?id=${item.id}'">
                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" height="20" width="20">
                                                    <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path>
                                                    <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path>
                                                    <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path>
                                                </svg>
                                                <span class="hidden lg:block">Detail Konfirmasi</span>
                                            </button>`;
                            }

                            var row = `<tr>
                                        <td class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">${item.id}</td>
                                        <td class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">${statusValidasi}</td>
                                        <td class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                            <div class="flex gap-2">${actionButton}</div>
                                        </td>
                                    </tr>`;

                            $('#tbody-peternak').append(row); // Menambahkan baris baru ke tabel
                        });
                    } else if (response.role == 2) {
                        $('#tbody-kepala').empty(); // Menghapus isi sebelumnya

                        // Mengelola dan menampilkan data validasi
                        response.validasi.forEach(function(item) {
                            var statusValidasi = "";
                            if (item.pengajuan.id_status_validasi == 3) {
                                statusValidasi = item.status_validasi;
                            } else if (item.pengajuan.id_status_validasi == 1 && item.pengajuan.id_status_konfirmasi == 1) {
                                statusValidasi = item.status_validasi;
                            } else if (item.pengajuan.id_status_validasi == 2 && item.pengajuan.id_status_konfirmasi == 1) {
                                statusValidasi = item.status_validasi;
                            } else {
                                statusValidasi = item.status_konfirmasi;
                            }

                            var actionButton = "";
                            if (item.pengajuan.id_status_validasi == 2 && item.pengajuan.id_status_konfirmasi == 1) {
                                actionButton = `<button class="font-semibold items-center gap-2 bg-blue-600 text-white hover:bg-blue-800 py-3 px-4 rounded-lg flex justify-center w-full text-center items-center" onclick="window.location.href='<?= urlpath('detailvalidasi')?>?id=${item.pengajuan.id}'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" height="20" width="20">
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path>
                                                    </svg>
                                                    <span class="hidden lg:block">Detail Validasi</span>
                                                </button>`;
                            } else {
                                actionButton = `<button class="font-semibold items-center gap-2 bg-[#008A33] text-white hover:bg-green-800 py-3 px-4 rounded-lg flex justify-center w-full text-center items-center" onclick="window.location.href='<?= urlpath('detailkonfirmasi')?>?id=${item.id}'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" height="20" width="20">
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path>
                                                    </svg>
                                                    <span class="hidden lg:block">Detail Konfirmasi</span>
                                                </button>`;
                            }

                            var row = `<tr>
                                            <td class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">${new Date(item.tanggal_pengambilan).toLocaleDateString()}</td>
                                            <td class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">${item.jumlah_pakan} kg</td>
                                            <td class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">${statusValidasi}</td>
                                            <td class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                                <div class="flex gap-2 justify-center">${actionButton}</div>
                                            </td>
                                        </tr>`;

                            $('#tbody-kepala').append(row); // Menambahkan baris baru ke tabel
                        });
                    } else {
                        // Menghapus isi sebelumnya untuk dinas
                        $('#tbody-dinas').empty();

                        response.pengajuan.forEach(function(item) {
                            var statusValidasi = "";
                            if (item.id_status_validasi == 3) {
                                statusValidasi = item.status_validasi;
                            } else if (item.id_status_validasi == 1 && item.id_status_konfirmasi == 1) {
                                statusValidasi = item.status_validasi;
                            } else if (item.id_status_validasi == 2 && item.id_status_konfirmasi == 1) {
                                statusValidasi = item.status_validasi;
                            } else {
                                statusValidasi = item.status_konfirmasi;
                            }

                            var actionButton = "";
                            if (item.id_status_validasi == 1) {
                                actionButton = `<button class="font-semibold items-center gap-2 bg-[#FF0000] text-white hover:bg-red-800 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn" onclick="window.location.href='<?= urlpath('detailpengajuan')?>?id=${item.id}'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20">
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path>
                                                    </svg>
                                                    <span class="hidden lg:block">Detail Pengajuan</span>
                                                </button>`;
                            } else if (item.id_status_validasi == 2 && item.id_status_konfirmasi == 1) {
                                actionButton = `<button class="font-semibold items-center gap-2 bg-blue-600 text-white hover:bg-blue-800 py-3 px-4 rounded-lg flex justify-center w-full text-center items-center" onclick="window.location.href='<?= urlpath('detailvalidasi')?>?id=${item.id}'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20">
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path>
                                                    </svg>
                                                    <span class="hidden lg:block">Detail Validasi</span>
                                                </button>`;
                            } else if (item.id_status_validasi == 2 && item.id_status_konfirmasi == 2) {
                                actionButton = `<button class="font-semibold items-center gap-2 bg-[#008A33] text-white hover:bg-green-800 py-3 px-4 rounded-lg flex justify-center w-full text-center" onclick="window.location.href='<?= urlpath('detailkonfirmasi')?>?id=${item.id}'">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20">
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path>
                                                        <path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path>
                                                    </svg>
                                                    <span class="hidden lg:block">Detail Konfirmasi</span>
                                                </button>`;
                            }

                            var row = `<tr>
                                        <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">${item['peternak']}</td>
                                        <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">${item['jumlah_pakan']} kg</td>
                                        <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">${statusValidasi}</td>
                                        <td class=" p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                            <div class="flex gap-2 justify-center">${actionButton}</div>
                                        </td>
                                    </tr>`;

                            $('#tbody-dinas').append(row); // Menambahkan baris baru ke tabel
                        });

                    }
                    
                },
                error: function(xhr, status, error) {
                    console.error('Error fetching data:', error);
                    // Penanganan error jika diperlukan
                }
            });
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
        <script>
        const closeBtn = document.getElementById('close-btn');
        const alert = document.getElementById('alert');
        closeBtn.addEventListener('click', function() {
            alert.classList.add('hidden');
            alert.classList.add('lg:hidden');
        });
    </script>
    
</body>
</html>
