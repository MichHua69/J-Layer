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
            <h1 class="text-center font-bold mb-8 text-3xl lg:text-5xl">Detail Konfirmasi</h1>
            <div class="bg-white shadow-md rounded-lg p-8 mx-auto w-full lg:w-full">
                    <div class="rounded-md">
                        <div class="mt-4">
                            <label class="font-semibold" for="tanngal_pengambilan">Tanggal Pengambilan</label>
                            <p class="mt-4"><?= $konfirmasi['tanggal_pengambilan'] ?></p>
                        </div>
                        <div class="mt-4">
                            <label class="font-semibold" for="foto_peternakan">Foto Bukti Konfirmasi</label>
                            <div class="grid place-items-center">
                                <img src="assets/konfirmasi/foto_bukti/<?= $konfirmasi['foto_bukti'] ?>" alt="" class="w-1/2">
                            </div>
                        </div>

                        
                    </div>
                    

            </div>
        </div>
    </section>

    <!-- Footer -->
    <?php include 'layouts/footer.php'; ?>
    
</body>
</html>
