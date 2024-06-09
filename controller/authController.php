<?php
include_once 'model/dinas_peternakanModel.php';
include_once 'model/kepala_kelompok_ternakModel.php';
include_once 'model/peternakModel.php';
include_once 'model/authModel.php';
class authController{

    public static function login()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $email = $_POST['email'];
            $password = $_POST['password'];

            $isDinas = authModel::isDinas($email, $password);
            $isKepala = authModel::isKepala($email, $password);
            $isPeternak = authModel::isPeternak($email, $password);
            if ($isDinas) {
                $_SESSION['role'] = 1;
                $user = dinas_peternakanModel::getUser($email);
                $_SESSION['user'] = $user;
            } elseif ($isKepala) {
                $_SESSION['role'] = 2;
                $user = kepala_kelompok_ternakModel::getUser($email);
                $_SESSION['user'] = $user;
            } elseif ($isPeternak) {
                $_SESSION['role'] = 3;
                $user = peternakModel::getUser($email);
                $_SESSION['user'] = $user;
            }
            if ($isDinas || $isKepala || $isPeternak) {

                header('Location: ' . urlPath('dashboard'));
            } else {
                header('Location: '. urlPath('login'));
            }

        } else if($_SERVER['REQUEST_METHOD'] == 'GET'){
            
        view('login');
        }
    }
    public static function logout() {
        // session_start();
        $_SESSION['role'] = array();
        session_destroy();
        header("Location: ".urlpath('login'));
        exit();
    }
    
    public static function register() {
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $nama = $_POST['name'];
            $email = $_POST['email'];
            $nik = $_POST['nik'];
            $telepon = $_POST['telepon'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['password_confirmation'];
            // var_dump($_POST);
            if (isset($_POST['noSurat']) && isset($_POST['wilayah'])) {
                $noSurat = $_POST['noSurat']; //
                $wilayah = $_POST['wilayah']; //
    
                $data = [
                    'nama' => $nama,
                    'email' => $email,
                    'nik' => $nik,
                    'telepon' => $telepon,
                    'password' => $password,
                    'noSurat' => $noSurat,
                    'wilayah' => $wilayah,
                ];
                kepala_kelompok_ternakModel::create($data);
            } else {
                $data = [
                    'nama' => $nama,
                    'email' => $email,
                    'nik' => $nik,
                    'telepon' => $telepon,
                    'password' => $password,
                ];
                peternakModel::create($data);
            }
            header("Location: ".urlpath('login'));
            exit();
        } else if($_SERVER['REQUEST_METHOD'] == 'GET'){
            view('register');
        }
    }
}

    

?>