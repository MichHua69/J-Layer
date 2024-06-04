<?php

class authModel  {
    public static function isDinas($email, $password)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM `dinas_peternakan` WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result && password_verify($password, $result['password']) ? $result : null;
    }
    public static function IsKepala($email, $password)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM `kepala_kelompok_ternak` WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result && password_verify($password, $result['password']) ? $result : null;
    }
    public static function isPeternak($email, $password)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM `peternak` WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result && password_verify($password, $result['password']) ? $result : null;
    }

    public static function register() {

    } 
}

?>