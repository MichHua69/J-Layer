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
            // var_dump($isPeternak);
            error_log("Login attempt: Email=$email, isDinas=" . json_encode($isDinas) . ", isKepala=" . json_encode($isKepala) . ", isPeternak=" . json_encode($isPeternak));

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
                $_SESSION['error'] = 'Email atau Password salah!';
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
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $register = $_POST['register'];
            $_SESSION['register'] = $register;
            $nama = $_POST['name'];
            $email = $_POST['email'];
            $nik = $_POST['nik'];
            $telepon = $_POST['telepon'];
            $password = $_POST['password'];
            $password_confirmation = $_POST['password_confirmation'];
            $_SESSION['name'] = $nama;
            $_SESSION['email'] = $email;
            $_SESSION['nik'] = $nik;
            $_SESSION['telepon'] = $telepon;
    
            $checkEmailUnique = authModel::checkEmailUnique($email);
            if ($checkEmailUnique == false) {
                $_SESSION['error']['email'] = 'Email sudah terdaftar';
            }
    
            $checkNIKUnique = authModel::checkNIKUnique($nik);
            if ($checkNIKUnique == false) {
                $_SESSION['error']['nik'] = 'NIK sudah terdaftar';
            }
    
            $checkTeleponUnique = authModel::checkTeleponUnique($telepon);
            if ($checkTeleponUnique == false) {
                $_SESSION['error']['telepon'] = 'Telepon sudah terdaftar';
            }
    

            
            if (substr($telepon, 0, 2) !== '62') {
                $_SESSION['error']['telepon'] = 'Nomor telepon harus diawali dengan 62';
            }
            
            if (strlen($password) < 8 || strlen($password) > 10) {
                $_SESSION['error']['password'] = 'Password harus 8-10 karakter';
            } 
            
            if ($password != $password_confirmation) {
                $_SESSION['error']['password_confirmation'] = 'Pastikan password anda sesuai';
            }

            if($register == 'kepala') {
                $noSurat = $_POST['noSurat'];
                $wilayah = $_POST['wilayah'];

                $_SESSION['noSurat'] = $noSurat;
                $_SESSION['wilayah'] = $wilayah;
                
                $checkNoSuratUnique = authModel::checkNoSuratUnique($noSurat);
                if ($checkNoSuratUnique == false) {
                    $_SESSION['error']['noSurat'] = 'No. Surat sudah terdaftar';
                } else {
                    $ListNoSurat = ['1111129876', '1111256789', '1111456789', '1111678910', '1111678999', '1111678666', '111167888'];
                    if (!in_array($noSurat, $ListNoSurat)) {
                        $_SESSION['error']['noSurat'] = 'No. Surat tidak valid';
                    } else if($ListNoSurat[$wilayah - 1] !== $noSurat){
                        $_SESSION['error']['wilayah'] = 'Tempat Pengambilan tidak sesuai dengan No. Surat';
                    }
                }
                $ListWilayah = [
                    '1' => '1 (Balung, Wuluhan, Jombang, Kencong, Rambipuji)',
                    '2' => '2 (Mumbulsari, Ambulu, Tempurejo, Jenggawah Ajung)',
                    '3' => '3 (Tanggul, Bangsalsari, Sumberbaru)',
                    '4' => '4 (Sukowono, Jelbuk, Kalisat, Ledokombo, Sumberjambe, Arjasa, Silo)',
                    '5' => '5 (Puger)',
                    '6' => '6 (Patrang, Sukorambi, Mangli, Kaliwates, Arjasa)',
                    '7' => '7 (Sumbersari, Mayang, Pakusari, Tempurejo, Mumbulsari)',
                ];
                $no_wilayah = $wilayah;
                $wilayah = $ListWilayah[$wilayah];
                $checkWilayahUnique = authModel::checkWilayahUnique($wilayah);
                // var_dump($checkWilayahUnique, $wilayah);
                if ($checkWilayahUnique == false) {
                    $_SESSION['error']['wilayah'] = 'Wilayah sudah terdaftar';
                }
            }

            if (isset($_SESSION['error'])) {
                header("Location: " . urlpath('register'));
                exit();
            } 
            else {
                // Register logic based on the type of user
                if ($register == 'kepala') {
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
                    $user = kepala_kelompok_ternakModel::getUser($email);
                    // Additional logic for kepala registration
                    $data = [
                        'id' => $no_wilayah,
                        'id_kepala_kelompok_ternak' => $user['id'],
                    ];
                    tempat_pengambilanModel::update($data);
                } else {
                    $data = [
                        'nama' => $nama,
                        'email' => $email,
                        'nik' => $nik,
                        'telepon' => $telepon,
                        'password' => $password, 
                    ];
                    peternakModel::create($data);
                    // var_dump('cek');
                }
                error_log("User registered: " . print_r($data, true));
                // Redirect to login after successful registration
                
                $_SESSION['success'] = 'Akun anda berhasil dibuat! Silahkan login';
                header("Location: " . urlpath('login'));
                exit();
            }
        } else if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            view('register');
        }
    }
    
    
}

    

?>