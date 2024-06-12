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
            <div class="bg-white shadow-md rounded-lg p-8 mx-auto w-full lg:w-full">
                    <div class="rounded-md">
                        <div class="mt-4">
                            <label class="font-semibold" for="alamat">Alamat</label>
                            <p class="mt-4"><?= $pengajuan['alamat'] ?></p>
                        </div>
                        <div class="mt-4">
                            <label class="font-semibold" for="jumlah_pakan">Jumlah Populasi Ayam</label>
                            <p class="mt-4"><?= $pengajuan['id_jumlah_populasi_ayam'] ?></p>
                        </div>
                        <div class="mt-4">
                            <label class="font-semibold" for="foto_peternakan">Foto Peternakan</label>
                            <div class="h-full w-full lg:w-2/3 lg:h-72 overflow-y-scroll rounded-md preview mb-2" id="foto_peternakan-container" style="scrollbar-width: none;">
                                <img id="foto_peternakan-preview" src="<?= 'assets/pengajuan/foto_peternakan/'.$pengajuan['foto_peternakan'] ?>" alt="Foto Peternakan" class="w-full object-cover object-top" />
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="font-semibold" for="foto_usaha">Foto Surat Usaha</label>
                            <div class=" h-full w-full lg:w-2/3 lg:h-72 overflow-y-scroll rounded-md preview mb-2" id="foto_usaha-container" style="scrollbar-width: none;">
                                <img id="foto_usaha-preview" src="<?= 'assets/pengajuan/foto_usaha/'.$pengajuan['foto_surat_usaha'] ?>" alt="Foto Surat Usaha" class=" w-full object-cover object-top" />
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="font-semibold" for="jumlah_pakan">Jumlah Pakan Yang Diajukan (Kg)</label>
                            <p class="mt-4"><?= $pengajuan['jumlah_pakan'] ?></p>
                        </div>                             
                    </div>
                
                    <form method="POST" action="<?= urlpath('detailpengajuan') ?>?id=<?= $pengajuan['id'] ?>" class=" space-y-6">
                    <div class="hidden" id="hiddenform">
                        <div class="mt-4">
                            <label class="font-semibold" for="jumlah_pakan">Jumlah Pakan Yang Divalidasi (Kg)</label>
                            <input
                                placeholder="Masukkan Jumlah Pakan (Kg)"
                                class="appearance-none relative block w-full px-3 py-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:ring-[#FF5F00] focus:border-gray-500 focus:z-10 sm:text-sm"
                                autocomplete="jumlah_pakan"
                                type="number"
                                name="jumlah_pakan"
                                id="jumlah_pakan"
                                min="1"
                            />
                        </div>
                        <div class="mt-4">
                            <label class="font-semibold" for="tempat_pengambilan">Tempat Pengambilan</label>
                            <select name="tempat_pengambilan" id="tempat_pengambilan" class="block w-full px-3 py-2 rounded-md border border-gray-300 bg-gray-100 focus:outline-none focus:ring-[#FF5F00] focus:border-gray-500 focus:z-10 sm:text-sm">
                                <option value="" hidden>Pilih Tempat Pengambilan</option>
                                <?php foreach ($tempat_pengambilan as $item) : ?>
                                    <option value="<?= $item['id'] ?>"><?= $item['nama'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="mt-4">
                            <label class="font-semibold" for="tanggal_pengambilan">Tanggal Pengambilan</label>
                            <input
                                placeholder="Masukkan Tanggal Pengambilan"
                                class="appearance-none relative block w-full px-3 py-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:ring-[#FF5F00] focus:border-gray-500 focus:z-10 sm:text-sm"
                                autocomplete="tanggal_pengambilan"
                                type="date"
                                name="tanggal_pengambilan"
                                id="tanggal_pengambilan"
                            />
                        </div>
                    </div>                             
                    <input type="hidden" name="action" id="action">
                    <div class="flex justify-center items-center gap-2">
                        <?php if($role == 1) :?>
                        <button
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-medium rounded-md text-white bg-[#FF5F00] hover:bg-[#FFFAE6] hover:text-[#FF5F00] hidden"
                            type="submit" id="submit-btn"
                        >
                            Validasi
                        </button>
                        <button
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-medium rounded-md text-white bg-[#FF5F00] hover:bg-[#FFFAE6] hover:text-[#FF5F00]"
                            type="button" onclick="validasi()" id="validasi-btn"
                        >
                            Validasi
                        </button>
                        <button
                            class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-lg font-medium rounded-md text-white bg-red-500 hover:bg-red-700 hover:text-white"
                            type="submit" onclick="" id="tolak-btn"
                        >
                            Tolak
                        </button>
                        <?php else :?>
                            <button class="font-semibold items-center gap-2 bg-green-500 text-white hover:bg-green-600 py-3 px-4 rounded-lg flex justify-center w-full text-center" type="button" onclick="window.location.href='<?= urlpath('editpengajuan') . '?id=' . ($_GET['id']) ?>'">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" id="Hand-Held-Tablet-Writing--Streamline-Core" height="16" width="14"><desc>Hand Held Tablet Writing Streamline Icon: https://streamlinehq.com</desc><g id="hand-held-tablet-writing--tablet-kindle-device-electronics-ipad-writing-digital-paper-notepad"><path id="Vector" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M8 0.5H1.5c-0.552285 0 -1 0.447715 -1 1v11c0 0.5523 0.447715 1 1 1h9c0.5523 0 1 -0.4477 1 -1V8" stroke-width="1"></path><path id="Vector_2" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M0.5 10.5h11" stroke-width="1"></path><path id="Vector_3" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M3.5 3h2" stroke-width="1"></path><path id="Vector_4" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M3.5 5.5h1" stroke-width="1"></path><path id="Vector_5" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="m8.99414 7.5058 -3 0.54 0.5 -3.04L10.7241 0.795798c0.093 -0.093728 0.2036 -0.168122 0.3255 -0.218891C11.1714 0.526138 11.3021 0.5 11.4341 0.5c0.1321 0 0.2628 0.026138 0.3846 0.076907 0.1219 0.050769 0.2325 0.125163 0.3254 0.218891l1.06 1.060002c0.0938 0.09296 0.1682 0.20356 0.2189 0.32542 0.0508 0.12186 0.0769 0.25257 0.0769 0.38458 0 0.13201 -0.0261 0.26272 -0.0769 0.38457 -0.0507 0.12186 -0.1251 0.23247 -0.2189 0.32543l-4.20996 4.23Z" stroke-width="1"></path></g></svg>
                                <span class="hidden lg:block">Ubah Pengajuan</span>
                            </button>
                            <button type="button" class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center w-full text-center items-center" data-id="<?php echo $_GET['id']; ?>" onclick="deleteModal(this)">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" id="Recycle-Bin-2--Streamline-Core" height="16" width="16">
                                    <desc>Recycle Bin 2 Streamline Icon: https://streamlinehq.com</desc>
                                    <g id="recycle-bin-2--remove-delete-empty-bin-trash-garbage">
                                        <path id="Vector" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M1 3.5h12" stroke-width="1"></path>
                                        <path id="Vector_2" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M2.5 3.5h9v9c0 0.2652 -0.1054 0.5196 -0.2929 0.7071s-0.4419 0.2929 -0.7071 0.2929h-7c-0.26522 0 -0.51957 -0.1054 -0.70711 -0.2929C2.60536 13.0196 2.5 12.7652 2.5 12.5v-9Z" stroke-width="1"></path>
                                        <path id="Vector_3" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M4.5 3.5V3c0 -0.66304 0.26339 -1.29893 0.73223 -1.76777C5.70107 0.763392 6.33696 0.5 7 0.5c0.66304 0 1.29893 0.263392 1.76777 0.73223C9.23661 1.70107 9.5 2.33696 9.5 3v0.5" stroke-width="1"></path>
                                        <path id="Vector_4" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5.5 6.50146V10.503" stroke-width="1"></path>
                                        <path id="Vector_5" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M8.5 6.50146V10.503" stroke-width="1"></path>
                                    </g>
                                </svg>
                                <span class="hidden lg:block">Hapus Pengajuan</span>
                            </button>
                        <?php endif;?>
                    </div>
                </form>
                
            </div>
        </div>
        <form action="<?= urlpath('deletepengajuan') ?>" method="post">
            <div id="modalDelete" class="hidden fixed inset-0 bg-gray-500 bg-opacity-75 flex items-center justify-center z-50">
                <div class="bg-white p-8 rounded shadow-lg w-1/3">
                    <h3 class="text-lg mb-4 font-bold text-center">Hapus Pengajuan</h3>
                    <p class="text-center">Apakah anda yakin menghapus pengajuan?</p>
                    <div class="flex gap-4 items-center justify-center mt-4">
                        <button type="button" class="bg-red-500 text-white py-2 px-4 rounded hover:bg-red-700 mr-4 w-1/3" onclick="closeModal()">Tidak</button>
                        <input type="hidden" id="PengajuanId" name="pengajuan_id">
                        <button type="submit" class="bg-green-500 text-white py-2 px-4 rounded hover:bg-green-700 w-1/3">Ya</button>
                    </div>
                </div>
            </div>
        </form> 
    </section>
    <?php 
        if(isset($_SESSION['success'])) unset($_SESSION['success']);
    ?>
    <!-- Footer -->
    <?php include 'layouts/footer.php'; ?>


    <script>
        function deleteModal(button) {
            var id = button.getAttribute('data-id');
            document.getElementById('PengajuanId').value = id;
            document.getElementById('modalDelete').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('modalDelete').classList.add('hidden');
        }
    </script>
    <script>
        function validasi() {
            document.getElementById('hiddenform').classList.remove('hidden');
            document.getElementById('validasi-btn').classList.add('hidden');
            document.getElementById('tolak-btn').classList.add('hidden');
            document.getElementById('submit-btn').classList.remove('hidden');
            document.getElementById('action').value = 'validasi';
        }
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
