<?php

class peternakModel {
    public static function getAll()
    {
        global $conn;
        $query = "SELECT * FROM `dinas_peternakan`";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }
}
?>