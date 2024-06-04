<?php

class dinas_peternakanModel {
    public static function getAll()
    {
        global $conn;
        $query = "SELECT * FROM `dinas_peternakan`";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public static function getUser($email)
    {
        global $conn;
        $query = "SELECT * FROM `dinas_peternakan` WHERE email = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }
}
?>