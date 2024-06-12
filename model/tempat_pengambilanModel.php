<?php 
class tempat_pengambilanModel {
    public static function getAll() {
        global $conn;
        $query = "SELECT * FROM `tempat_pengambilan` WHERE `id_kepala_kelompok_ternak` IS NOT NULL";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

    public static function getById($id) {
        global $conn;
        $query = "SELECT * FROM `tempat_pengambilan` WHERE `id` =?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }
    public static function getByIdKepala($id) { 
        global $conn;
        $query = "SELECT * FROM `tempat_pengambilan` WHERE `id_kepala_kelompok_ternak` = ?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }

    public static function update($data=[]) {
        global $conn;
        extract($data);
        if(isset($data['id_kepala_kelompok_ternak'])) {
            $query = "UPDATE `tempat_pengambilan` SET `id_kepala_kelompok_ternak` = ? WHERE `id` = ?";
            $stmt = $conn->prepare($query);
            $stmt->bind_param("ii", $id_kepala_kelompok_ternak, $id);
            $stmt->execute();
            // $result = $stmt->get_result()->fetch_assoc();
            // return $result;
        }
    }
}
?>