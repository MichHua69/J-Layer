<?php

class kepala_kelompok_ternalkModel{
    public static function getAll()
    {
        global $conn;
        $query = "SELECT * FROM `kepala_kelompok_ternak`";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}
?>