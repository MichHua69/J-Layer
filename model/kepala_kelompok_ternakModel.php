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

    public static function getUser($email) {
        global $conn;
        $query = "SELECT * FROM `kepala_kelompok_ternak` WHERE `email` =?";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        return $result;
    }
    public static function create($data=[]) {
        global $conn;
        $nama = $data['nama'];
        $email = $data['email'];
        $nik = intval($data['nik']);
        $telepon = intval($data['telepon']);
        $password = password_hash($data['password'], PASSWORD_DEFAULT);
        $noSurat = $data['noSurat'];
        $wilayah = $data['wilayah'];

        $query = "INSERT INTO `kepala_kelompok_ternak` (`nama`, `email`, `nik`, `no_telepon`, `password`, `no_surat`, `wilayah`) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($query);
        $stmt->bind_param("sssssss", $nama, $email, $nik, $telepon, $password, $noSurat, $wilayah);
        $stmt->execute();
        
        return true;
    }
}
?>