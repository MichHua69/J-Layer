<nav class="bg-[#FFC100] px-4 py-2 fixed w-full z-40">
    <div class="container mx-auto grid grid-cols-3 gap-4 relative items-center">
        <img src="assets/images/logo.png" class="h-16" alt="">
        <div class="flex items-center lg:hidden">
        </div>
        <div class="flex items-center justify-end lg:hidden">
            <button class="text-white focus:outline-none" onclick="toggleSidebar('sidebar-menu')">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        <?php if ($role === 1): ?>
        <div class="hidden lg:flex lg:gap-4 space-x-4 lg:justify-center" id="navbar-menu">
            <a href="<?= urlpath('dashboard')?>" class="button-navbar text-white text-lg hover:text-white">Pengajuan</a>
            <a href="<?= urlpath('berita')?>" class="button-navbar text-white text-lg hover:text-white">Berita</a>
        </div>
        <?php elseif ($role === 2): ?>
        <div class="hidden lg:flex lg:gap-4 space-x-4 lg:justify-center" id="navbar-menu">
            <a href="<?= urlpath('dashboard')?>" class="button-navbar text-white text-lg hover:text-white">Dashboard</a>
            <!-- <a href="#Berita" class="button-navbar text-white text-lg hover:text-white" onclick="smoothScrollTo('#Berita')">Berita</a> -->
            <a href="<?= urlpath('pengajuan')?>" class="button-navbar text-white text-lg hover:text-white">Pengajuan</a>
        </div>
        <?php elseif ($role === 3): ?>
        <div class="hidden lg:flex lg:gap-4 space-x-4 lg:justify-center" id="navbar-menu">
            <a href="<?= urlpath('dashboard')?>" class="button-navbar text-white text-lg hover:text-white">Dashboard</a>
            <!-- <a href="#Berita" class="button-navbar text-white text-lg hover:text-white" onclick="smoothScrollTo('#Berita')">Berita</a> -->
            <a href="<?= urlpath('pengajuan')?>" class="button-navbar text-white text-lg hover:text-white">Pengajuan</a>
        </div>
        <?php endif; ?>

        <div class="hidden lg:flex lg:justify-end">
            <button id='logout-btn' class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded" onclick="window.location.href='<?= urlpath('logout')?>'">Logout</button>
        </div>
    </div>
</nav>

<!-- Sidebar -->
<div id="sidebar-menu" class="fixed top-0 left-0 w-64 h-full bg-[#FFC100] transform -translate-x-full transition-transform lg:hidden z-50">
    <div class="p-4">
        <button class="text-white focus:outline-none mb-4" onclick="toggleSidebar('sidebar-menu')">
            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
            </svg>
        </button>
        <a href="<?= urlpath('dashboard')?>" class="block text-white text-lg hover:text-white">Dashboard</a>
            <a href="#" class="block text-white text-lg hover:text-white">Berita</a>
            <a href="<?= urlpath('pengajuan')?>" class="block text-white text-lg hover:text-white">Pengajuan</a>
    </div>
</div>