<?php
class beritaModel {
    public static function getAll() {
        global $conn;
        $query = "SELECT * FROM `berita`";
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        return $result;
    }

    public static function getTotal() {
        global $conn;
        $stmt = $conn->prepare("SELECT COUNT(*) AS total_rows FROM `berita`");
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $total_rows = $row['total_rows'];
        return $total_rows;
    }

    public static function getBerita($page) {
        global $conn;
        $limit = 6;
        $offset = ($page - 1) * $limit;
        $stmt = $conn->prepare("SELECT * FROM `berita` LIMIT ? OFFSET ?");
        $stmt->bind_param("ii", $limit, $offset);
        $stmt->execute();
        $result = $stmt->get_result();
        
        // Mengambil setiap baris sebagai objek
        $berita_objects = [];
        while ($row = $result->fetch_assoc()) {
            $berita_objects[] = $row;
        }
        
        return $berita_objects;
        
    }
}
?>