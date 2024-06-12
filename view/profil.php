<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/flowbite@1.4.1/dist/flowbite.js"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/main.css">
    <link rel="stylesheet" href="assets/css/dashboard.css">
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <title>Profil</title>
</head>
<body>
<?php if (isset($_SESSION['action']) && $_SESSION['action'] == 'update'): ?>
                <script>
                window.onload = function() {
                    ubah();
                };
                </script>
            <?php endif; ?>
    <?php include 'layouts/navbar.php' ?>
    <section class="bg-[#FFFAE6] min-h-screen">
        <div class="max-w-screen-xl px-4 pt-36 pb-8 mx-auto lg:gap-8 xl:gap-0 lg:py-16 lg:pt-36">
            <h1 class="text-center font-bold mb-8 text-3xl lg:text-5xl">Profil</h1>
            <div class="bg-white shadow-md rounded-lg p-8 mx-auto w-full lg:w-full">
            <?php if(isset($_SESSION['success'])):?>
                <div class="mx-auto mt-4 w-2/3 text-sm lg:text-base lg:flex lg:justify-center " id="alert">
                    <div class="p-2 bg-green-500 items-center text-indigo-100 leading-none rounded-full flex lg:inline-flex relative" role="alert" >
                        <span class="flex rounded-full bg-green-800 uppercase px-2 py-1 text-xs font-bold mr-3">Berhasil</span>
                        <span class="font-semibold mr-2 text-left flex-auto"><?= $_SESSION['success'] ?></span>
                        <span class="" id="close-btn">
                            <svg class="fill-current h-6 w-6 text-white-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
                        </span>
                    </div>
                </div>
            <?php endif; ?>
                <form action="<?= urlpath('profil')?>" method="post">
                    <div class="grid grid-cols-1 gap-8  mt-4 lg:grid-cols-2">
                        <input type="hidden" name="action" value="update">
                        <div class="">
                            <label class="font-semibold">Nama</label>
                            <p class="text-gray-600" id="nama"><?php echo htmlspecialchars($user['nama']); ?></p>
                            <input type="text" class="hidden appearance-none relative block w-full px-3 py-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:ring-[#FF5F00] focus:border-gray-500 focus:z-10 sm:text-sm" name="nama" id="nama" value="<?= htmlspecialchars($user['nama'])?>" required>
                            <?php if (isset($_SESSION['error']['nama'])) :?>
                                <p class="text-red-500 text-sm italic" id="error"><?= $_SESSION['error']['nama']?></p>
                            <?php endif?>
                        </div>
                        <?php if ($role !== 1) : ?>
                        <div class="">
                            <label class="font-semibold">NIK</label>
                            <p class="text-gray-600"><?php echo htmlspecialchars($user['NIK']); ?></p>
                        </div>
                        <?php endif ?>
                        <?php if($role == 2) :?>
                        <div class="">
                            <label class="font-semibold">Wilayah</label>
                            <p class="text-gray-600"><?php echo htmlspecialchars($user['wilayah']); ?></p>
                        </div>
                        <?php endif ?>
                        <div>
                            <label class="font-semibold">Nomor Telepon</label>
                            <p class="text-gray-600" id="no_telepon">
                                <?php 
                                    if($role == 1) {
                                        echo '0';
                                    }
                                    echo htmlspecialchars($user['no_telepon']); 
                                ?>
                            </p>
                            <input type="text" class="hidden appearance-none relative block w-full px-3 py-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:ring-[#FF5F00] focus:border-gray-500 focus:z-10 sm:text-sm" name="no_telepon" id="no_telepon" value="<?= htmlspecialchars($user['no_telepon'])?>" required>
                            <?php if (isset($_SESSION['error']['no_telepon'])) :?>
                                <p class="text-red-500 text-sm italic" id="error"><?= $_SESSION['error']['no_telepon']?></p>
                            <?php endif?>
                            
                        </div>
                        <div>
                            <label class="font-semibold">Email</label>
                            <p class="text-gray-600" id="email"><?php echo htmlspecialchars($user['email']); ?></p>
                            <input type="text" class="hidden appearance-none relative block w-full px-3 py-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:ring-[#FF5F00] focus:border-gray-500 focus:z-10 sm:text-sm" name="email" id="email"  value="<?= htmlspecialchars($user['email'])?>" required>
                            <?php if (isset($_SESSION['error']['email'])) :?>
                                <p class="text-red-500 text-sm italic" id="error"><?= $_SESSION['error']['email']?></p>
                            <?php endif?>

                        </div>
                        <div>
                            <label class="font-semibold">Password</label>
                            <p class="text-gray-600" id="password">********</p>
                            <div class="relative">
                                <input type="password" class="hidden appearance-none relative block w-full px-3 py-3 border border-gray-300 bg-gray-100 rounded-md focus:outline-none focus:ring-[#FF5F00] focus:border-gray-500 focus:z-10 sm:text-sm" name="password" id="passwords" value="" placeholder="Masukkan Password" required>
                                <div class="absolute right-0 mr-4 top-1/2 transform -translate-y-1/2">
                                    <input type="checkbox" id="toggle-password" class="hidden" />
                                    <label for="toggle-password" class="cursor-pointer hidden" id="eye">
                                        <svg viewBox="0 0 576 512" height="1em" xmlns="http://www.w3.org/2000/svg"><path d="M288 32c-80.8 0-145.5 36.8-192.6 80.6C48.6 156 17.3 208 2.5 243.7c-3.3 7.9-3.3 16.7 0 24.6C17.3 304 48.6 356 95.4 399.4C142.5 443.2 207.2 480 288 480s145.5-36.8 192.6-80.6c46.8-43.5 78.1-95.4 93-131.1c3.3-7.9 3.3-16.7 0-24.6c-14.9-35.7-46.2-87.7-93-131.1C433.5 68.8 368.8 32 288 32zM144 256a144 144 0 1 1 288 0 144 144 0 1 1 -288 0zm144-64c0 35.3-28.7 64-64 64c-7.1 0-13.9-1.2-20.3-3.3c-5.5-1.8-11.9 1.6-11.7 7.4c.3 6.9 1.3 13.8 3.2 20.7c13.7 51.2 66.4 81.6 117.6 67.9s81.6-66.4 67.9-117.6c-11.1-41.5-47.8-69.4-88.6-71.1c-5.8-.2-9.2 6.1-7.4 11.7c2.1 6.4 3.3 13.2 3.3 20.3z"></path></svg>
                                    </label>
                                </div>
                            </div>
                            <?php if (isset($_SESSION['error']['password'])) :?>
                                <p class="text-red-500 text-sm italic" id="error"><?= $_SESSION['error']['password']?></p>
                            <?php endif?>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-end gap-4">
                        <button id="edit-btn" type="button" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-8 rounded-full min-w-28" onclick="ubah()">Ubah</button>
                        <button id="cancel-btn" type="button" class="hidden bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-8 rounded-full min-w-28" onclick="cancel()" >Batal</button>
                        <button id="save-btn" type="submit" class="hidden bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-8 rounded-full min-w-28" onclick="">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <?php 
        if(isset($_SESSION['action'])) unset($_SESSION['action']);
        if(isset($_SESSION['error']['nama'])) unset($_SESSION['error']['nama']);
        if(isset($_SESSION['error']['no_telepon'])) unset($_SESSION['error']['no_telepon']);
        if(isset($_SESSION['error']['email'])) unset($_SESSION['error']['email']);
        if(isset($_SESSION['error']['password'])) unset($_SESSION['error']['password']);
        if(isset($_SESSION['error'])) unset($_SESSION['error']);
        if(isset($_SESSION['success'])) unset($_SESSION['success']);
        
    ?>
    <?php if(isset($_SESSION['action']) )?>
    <!-- Footer -->
    <?php include 'layouts/footer.php'; ?>

    <script>
        const editBtn = document.getElementById('edit-btn');
        const cancelBtn = document.getElementById('cancel-btn');
        const saveBtn = document.getElementById('save-btn');

        
        const nama = document.getElementById('nama');
        const telepon = document.getElementById('no_telepon');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const inputFields = document.getElementsByTagName('input');
        const error = document.getElementById('error');
        const togglePassword = document.querySelector('#toggle-password');
        const passwords = document.getElementById('passwords');
        const eye = document.getElementById('eye');
        

        function ubah() {
            Array.from(inputFields).forEach(function(inputField) {
                    inputField.classList.remove('hidden');
                });
            
            nama.classList.add('hidden');
            telepon.classList.add('hidden');
            email.classList.add('hidden');
            password.classList.add('hidden');
            editBtn.classList.add('hidden');
            cancelBtn.classList.remove('hidden');
            saveBtn.classList.remove('hidden');
            togglePassword.classList.add('hidden');
            eye.classList.remove('hidden');
        }

        editBtn.addEventListener('click', function() {
            ubah();
        });
        cancelBtn.addEventListener('click', function() {
            Array.from(inputFields).forEach(function(inputField) {
                inputField.classList.add('hidden');
            });
            nama.classList.remove('hidden');
            telepon.classList.remove('hidden');
            email.classList.remove('hidden');
            password.classList.remove('hidden');
            editBtn.classList.remove('hidden');
            cancelBtn.classList.add('hidden');
            saveBtn.classList.add('hidden');
            eye.classList.add('hidden');

            if(error) {
                error.classList.add('hidden');
            } else {
                error.classList.remove('hidden');
            }
        });


        togglePassword.addEventListener('change', function() {
            passwords.type = this.checked ? 'text' : 'password';
        });
    </script>

    <script>
        function previewImage(input) {
            const file = input.files[0];
            const Usahapreview = document.getElementById('gambar-preview');
            const Usahacontainer = document.getElementById('gambar-container');
            const reader = new FileReader();
            reader.onload = function () {
                Usahapreview.classList.remove('hidden');
                Usahacontainer.classList.remove('hidden');
                Usahapreview.src = reader.result;
            };
            if (file) {
                reader.readAsDataURL(file);
            } else {
                Usahapreview.classList.add('hidden');
                Usahacontainer.classList.add('hidden');
                Usahapreview.src = "";
            }
        }
    </script>
    
</body>
</html>
