<?php
include_once 'model/dinas_peternakanModel.php';
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
            } elseif ($isKepala) {
                $_SESSION['role'] = 2;
            } elseif ($isPeternak) {
                $_SESSION['role'] = 3;
            }
            header('Location: ' . urlPath('dashboard'));

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
}

    

?>