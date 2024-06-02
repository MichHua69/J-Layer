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
    <title>J-Layer</title>
</head>
<body>
    <?php $role = $_SESSION['role'];?>
    <?php include 'layouts/navbar.php' ?>
    <?php if ($role === 1): ?>
    <main id='peternak-dashboard' class="">
        <section class="bg-[#FFFAE6] w-full">
            <div class="max-w-screen-xl px-4 pt-36 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-36">
                <h1 class="text-center font-bold mb-8 text-3xl lg:text-5xl">Data Pengajuan</h1>
                <div class="bg-white shadow-md rounded-lg p-4 mx-auto w-full lg:w-full">
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Nama Peternak</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Pengajuan Pakan</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Status Validasi</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center w-full">
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Hasan</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">40 kg</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sedang Diproses</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <div class="flex gap-2 justify-center">
                                        <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn" onclick="window.location.href='<?= urlpath('detalpengajuan')?>'">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Lihat Detail</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Hasim</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">23kg</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sedang Diproses</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <div class="flex gap-2 justify-center">
                                        <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Lihat Detail</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Hasim</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">23kg</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sedang Diproses</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <div class="flex gap-2 justify-center">
                                        <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Lihat Detail</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Hasim</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">23kg</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sedang Diproses</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <div class="flex gap-2 justify-center">
                                        <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Lihat Detail</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Hasim</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">23kg</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sedang Diproses</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <div class="flex gap-2 justify-center">
                                        <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Lihat Detail</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Hasim</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">23kg</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sedang Diproses</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <div class="flex gap-2 justify-center">
                                        <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Lihat Detail</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Hasim</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">23kg</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sedang Diproses</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <div class="flex gap-2 justify-center">
                                        <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Lihat Detail</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Hasim</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">23kg</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sedang Diproses</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <div class="flex gap-2 justify-center">
                                        <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Lihat Detail</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Hasim</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">23kg</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sedang Diproses</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <div class="flex gap-2 justify-center">
                                        <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Lihat Detail</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Hasim</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">23kg</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sedang Diproses</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <div class="flex gap-2 justify-center">
                                        <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center items-center w-full text-center" id="detail-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 10" id="Information-Circle--Streamline-Micro" height="20" width="20"><desc>Information Circle Streamline Icon: https://streamlinehq.com</desc><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 9.5a4.5 4.5 0 1 0 0 -9 4.5 4.5 0 0 0 0 9Z" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 7.5v-2" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 1 0 -0.5" stroke-width="1"></path><path stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M5 3.53a0.25 0.25 0 0 0 0 -0.5" stroke-width="1"></path></svg>
                                            <span class="hidden lg:block">Lihat Detail</span>
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </main>
    <?php elseif ($role === 2): ?>
        <div class="text-center">
            <h2>Anda adalah peternak</h2>
            <p>Anda dapat melihat data pengajuan yang telah anda ajukan</p>
        </div>
    <?php elseif ($role === 3): ?>
    <main id='peternak-dashboard' class="">
        <section class="bg-[#FFFAE6] w-full">
            <div class="max-w-screen-xl px-4 pt-36 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-36">
                <h1 class="text-center font-bold mb-8 text-3xl lg:text-5xl">Data Pengajuan</h1>
                <div class="bg-white shadow-md rounded-lg p-4 mx-auto w-full lg:w-full">
                    <table class="w-full table-auto">
                        <thead>
                            <tr>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">ID Pengajuan</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Status Validasi</th>
                                <th class="p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center w-full">
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">1</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sudah Divalidasi</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <button class="font-semibold items-center gap-2 bg-red-500 text-white hover:bg-red-600 py-3 px-4 rounded-lg flex justify-center w-full text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" id="Download-File--Streamline-Core" height="16" width="16"><desc>Download File Streamline Icon: https://streamlinehq.com</desc><g id="download-file"><path id="Vector" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M12.5 12.5c0 0.2652 -0.1054 0.5196 -0.2929 0.7071s-0.4419 0.2929 -0.7071 0.2929h-9c-0.26522 0 -0.51957 -0.1054 -0.70711 -0.2929C1.60536 13.0196 1.5 12.7652 1.5 12.5v-11c0 -0.26522 0.10536 -0.51957 0.29289 -0.707107C1.98043 0.605357 2.23478 0.5 2.5 0.5H9L12.5 4v8.5Z" stroke-width="1"></path><path id="vector 377" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="m9 8 -2 2 -2 -2" stroke-width="1"></path><path id="vector 378" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="m7 10 0 -5.5" stroke-width="1"></path></g></svg>
                                        <span class="hidden lg:block">Unduh Surat</span>
                                    </button>
                                </td>
                            </tr>
                            <tr>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">2</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">Sedang Diproses</td>
                                <td class="border p-1 lg:px-4 lg:py-3 text-sm lg:text-lg">
                                    <button class="font-semibold items-center gap-2 bg-green-500 text-white hover:bg-green-600 py-3 px-4 rounded-lg flex justify-center w-full text-center"><svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14" id="Hand-Held-Tablet-Writing--Streamline-Core" height="16" width="14"><desc>Hand Held Tablet Writing Streamline Icon: https://streamlinehq.com</desc><g id="hand-held-tablet-writing--tablet-kindle-device-electronics-ipad-writing-digital-paper-notepad"><path id="Vector" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M8 0.5H1.5c-0.552285 0 -1 0.447715 -1 1v11c0 0.5523 0.447715 1 1 1h9c0.5523 0 1 -0.4477 1 -1V8" stroke-width="1"></path><path id="Vector_2" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M0.5 10.5h11" stroke-width="1"></path><path id="Vector_3" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M3.5 3h2" stroke-width="1"></path><path id="Vector_4" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="M3.5 5.5h1" stroke-width="1"></path><path id="Vector_5" stroke="#ffffff" stroke-linecap="round" stroke-linejoin="round" d="m8.99414 7.5058 -3 0.54 0.5 -3.04L10.7241 0.795798c0.093 -0.093728 0.2036 -0.168122 0.3255 -0.218891C11.1714 0.526138 11.3021 0.5 11.4341 0.5c0.1321 0 0.2628 0.026138 0.3846 0.076907 0.1219 0.050769 0.2325 0.125163 0.3254 0.218891l1.06 1.060002c0.0938 0.09296 0.1682 0.20356 0.2189 0.32542 0.0508 0.12186 0.0769 0.25257 0.0769 0.38458 0 0.13201 -0.0261 0.26272 -0.0769 0.38457 -0.0507 0.12186 -0.1251 0.23247 -0.2189 0.32543l-4.20996 4.23Z" stroke-width="1"></path></g></svg>
                                    <span class="hidden lg:block">Ubah Pengajuan</span>
                                    </button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>

        <!-- Blog/News Section -->
        <section id="Berita" class="bg-white py-30">
            <div class="container mx-auto px-6">
                <h2 class="text-3xl font-bold text-center mb-12">Berita</h2>
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
    </main>
    <?php endif; ?>

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
