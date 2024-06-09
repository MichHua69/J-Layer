<?php
include_once 'model/beritaModel.php';
class dashboardController
{
    public static function showDashboard()
    {
        $role = $_SESSION['role'];
        $user = $_SESSION['user'];

        $totalrow = beritaModel::getTotal();
        $total_pages = ceil($totalrow / 6);

        $current_page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $berita = beritaModel::getBerita($current_page);
        // var_dump($berita);
        view('dashboard', [
            'role' => $role,
            'user' => $user,
            'berita' => $berita,
            'total_pages' => $total_pages,
            'current_page' => $current_page
        ]);
    }

    public static function showBerita() {
        $role = $_SESSION['role'];
        $user = $_SESSION['user'];
        $berita = beritaModel::getById(intval($_GET['id']));
        // var_dump($berita);
        view('berita', [
            'role' => $role,
            'user' => $user,
            'berita' => $berita,
        ]);
    }
    public static function showTambahBerita() {
        $role = $_SESSION['role'];
        $user = $_SESSION['user'];
        view('tambahberita', [
            'role' => $role,
            'user' => $user
        ]);
    }

    public static function storeTambahBerita() {
        $role = $_SESSION['role'];
        $user = $_SESSION['user'];
        $judul = $_POST['judul'];
        $deskripsi = $_POST['deskripsi'];
        var_dump($_FILES);
        $data = [
            'judul' => $judul,
            'deskripsi' => $deskripsi,
            'tanggal' => date('Y-m-d', time())
        ];
        
        $berita_id = beritaModel::create($data);

        var_dump($berita_id);
        $file = $_FILES['gambar'];
        $filename = 'thumbnail' . $berita_id . '.' . pathinfo($file['name'], PATHINFO_EXTENSION);
        $tmp_name = $file['tmp_name'];
        $error = $file['error'];
        $folder = 'assets/berita/';

        move_uploaded_file($tmp_name, $folder . $filename);
        $data = [
            'id' => $berita_id,
            'thumbnail' => $filename
        ];
        $create = beritaModel::update($data);
        header('Location: '.urlpath('dashboard'));
    }
}
?>