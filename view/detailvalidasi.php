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
            <h1 class="text-center font-bold mb-8 text-3xl lg:text-5xl">Detail Validasi</h1>
            <div class="bg-white shadow-md rounded-lg p-8 mx-auto w-full lg:w-full">
                <div class="rounded-md">
                    <div class="mt-4">
                        <label class="font-semibold" for="tempat_pengambilan">Tempat Pengambilan</label>
                        <p class="mt-4"><?= $validasi['tempat_pengambilan'] ?></p>
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold" for="tanngal_pengambilan">Tanggal Pengambilan</label>
                        <p class="mt-4"><?= date('d/m/Y', strtotime($validasi['tanggal_pengambilan'])) ?></p>
                    </div>
                    <div class="mt-4">
                        <label class="font-semibold" for="foto_peternakan">Jumlah Pakan Yang Divalidasi</label>
                        <p class="mt-4"><?= $validasi['jumlah_pakan'] ?> Kg</p>
                    </div>
                </div>
                    
                <div class="flex justify-center items-center gap-2 mt-4">
                    <?php if($role === 2):?>
                        <button class="font-semibold items-center gap-2 bg-green-500 text-white hover:bg-green-600 py-3 px-4 rounded-lg flex justify-center w-full text-center" onclick="window.location.href='<?= urlpath('konfirmasi') . '?id=' . $_GET['id'] ?>'"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16" fill="currentColor" id="Upload-Simple--Streamline-Phosphor" height="20" width="20"><desc>Upload Simple Streamline Icon: https://streamlinehq.com</desc><path d="M15.83974375 9.96019375v5.22649375c0 0.3608125 -0.2925 0.6533125 -0.6533125 0.6533125H0.81356875c-0.3608125 0 -0.6533125 -0.2925 -0.6533125 -0.6533125v-5.22649375c0 -0.50291875 0.544425 -0.81724375 0.97996875 -0.5657875 0.2021375 0.11670625 0.32665625 0.33238125 0.32665625 0.5657875v4.57318125h13.0662375v-4.57318125c0 -0.50291875 0.544425 -0.81724375 0.97996875 -0.5657875 0.20213125 0.11670625 0.32665625 0.33238125 0.32665625 0.5657875ZM5.19565625 4.54260625l2.15103125 -2.15185v7.5694375c0 0.50291875 0.544425 0.81724375 0.97996875 0.56578125 0.2021375 -0.1167 0.32665625 -0.332375 0.32665625 -0.56578125V2.39075625l2.15103125 2.15185c0.3558125 0.3558125 0.96338125 0.19301875 1.09361875 -0.2930375 0.06044375 -0.225575 -0.00405 -0.46626875 -0.1691875 -0.6314l-3.26655625 -3.2665625c-0.25519375 -0.255475 -0.66924375 -0.255475 -0.9244375 0l-3.26655625 3.2665625c-0.35581875 0.3558125 -0.19301875 0.96338125 0.29303125 1.09361875 0.22558125 0.06044375 0.46626875 -0.00405 0.6314 -0.16918125Z" stroke-width="2"></path></svg>
                        <span class="hidden lg:block">Upload Konfirmasi</span>
                    <?php elseif($role === 3):?>
                        <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center w-full text-center" onclick="window.open('<?= urlpath('validasi') . '?id=' . intval($_GET['id']) ?>', '_blank')">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" id="Download-File--Streamline-Core" height="16" width="16">
                                <desc>Download File Streamline Icon: https://streamlinehq.com</desc>
                                <g id="download-file">
                                    <path id="Vector" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M12.5 12.5c0 0.2652 -0.1054 0.5196 -0.2929 0.7071s-0.4419 0.2929 -0.7071 0.2929h-9c-0.26522 0 -0.51957 -0.1054 -0.70711 -0.2929C1.60536 13.0196 1.5 12.7652 1.5 12.5v-11c0 -0.26522 0.10536 -0.51957 0.29289 -0.707107C1.98043 0.605357 2.23478 0.5 2.5 0.5H9L12.5 4v8.5Z" stroke-width="1"></path>
                                    <path id="vector 377" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="m9 8 -2 2 -2 -2" stroke-width="1"></path>
                                    <path id="vector 378" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="m7 10 0 -5.5" stroke-width="1"></path>
                                </g>
                            </svg>
                            <span class="hidden lg:block">Unduh Surat</span>
                        </button>
                    <?php endif;?>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'layouts/footer.php'; ?>

    
</body>
</html>
