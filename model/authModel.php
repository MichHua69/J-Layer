<?php

class authModel  {
    public static function isDinas($email, $password)
    {
        global $conn;
        $query = "SELECT * FROM `dinas_peternakan` WHERE `email` = ? AND `password` = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result ? $result : null;
    }
    public static function IsKepala($email, $password)
    {
        global $conn;
        $query = "SELECT * FROM `kepala_kelompok_ternak` WHERE `email` = ? AND `password` = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result ? $result : null;
    }
    public static function isPeternak($email, $password)
    {
        global $conn;
        $query = "SELECT * FROM `peternak` WHERE `email` = ? AND `password` = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("ss", $email, $password);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result ? $result : null;
    }
}

?>