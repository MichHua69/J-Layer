<?php

class authModel  {
    public static function isDinas($email, $password)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM `dinas_peternakan` WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if ($result) {
            // Log the password check
            error_log("Password hash from database: " . $result['password']);
            error_log("Password verification result: " . (password_verify($password, $result['password']) ? 'true' : 'false'));
        }
        return $result && password_verify($password, $result['password']) ? $result : null;
    }
    public static function IsKepala($email, $password)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM `kepala_kelompok_ternak` WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if ($result) {
            // Log the password check
            error_log("Password hash from database: " . $result['password']);
            error_log("Password verification result: " . (password_verify($password, $result['password']) ? 'true' : 'false'));
        }
        return $result && password_verify($password, $result['password']) ? $result : null;
    }
    public static function isPeternak($email, $password)
    {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM `peternak` WHERE `email` = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        if ($result) {
            // Log the password check
            error_log("Password hash from database: " . $result['password']);
            error_log("Password verification result: " . (password_verify($password, $result['password']) ? 'true' : 'false'));
        }
        return $result && password_verify($password, $result['password']) ? $result : null;
    }

    public static function register() {

    } 

    public static function checkEmailUnique($email, $user_id = null) {
        global $conn;
    
        // Prepare the SQL statements for each table
        $query1 = "SELECT * FROM `peternak` WHERE `email` = ?";
        $query2 = "SELECT * FROM `dinas_peternakan` WHERE `email` = ?";
        $query3 = "SELECT * FROM `kepala_kelompok_ternak` WHERE `email` = ?";
    
        if ($user_id !== null) {
            $query1 .= " AND `id` != ?";
            $query2 .= " AND `id` != ?";
            $query3 .= " AND `id` != ?";
        }
    
        // Prepare the statements
        $stmt1 = $conn->prepare($query1);
        $stmt2 = $conn->prepare($query2);
        $stmt3 = $conn->prepare($query3);
    
        // Bind the email (and user_id if provided) parameter to each statement
        if ($user_id !== null) {
            $stmt1->bind_param("si", $email, $user_id);
            $stmt2->bind_param("si", $email, $user_id);
            $stmt3->bind_param("si", $email, $user_id);
        } else {
            $stmt1->bind_param("s", $email);
            $stmt2->bind_param("s", $email);
            $stmt3->bind_param("s", $email);
        }
    
        // Execute each statement
        $stmt1->execute();
        $result1 = $stmt1->get_result()->fetch_assoc();
        $stmt1->close();
        
        $stmt2->execute();
        $result2 = $stmt2->get_result()->fetch_assoc();
        $stmt2->close();
        
        $stmt3->execute();
        $result3 = $stmt3->get_result()->fetch_assoc();
        $stmt3->close();
    
        // Check if any result is not null
        if ($result1 !== null || $result2 !== null || $result3 !== null) {
            return false; // Email is already registered in one of the tables
        } else {
            return true; // Email is unique
        }
    }
    

    public static function checkNIKUnique($NIK) {
        global $conn;
        // Prepare the SQL statements for each table
        $stmt1 = $conn->prepare("SELECT * FROM `peternak` WHERE `NIK` = ?");
        $stmt2 = $conn->prepare("SELECT * FROM `kepala_kelompok_ternak` WHERE `NIK` = ?");

        // Bind the NIK parameter to each statement
        $stmt1->bind_param("s", $NIK);
        $stmt2->bind_param("s", $NIK);

        // Execute each statement
        $stmt1->execute();
        $result1 = $stmt1->get_result()->fetch_assoc();
        $stmt1->close();
    
        $stmt2->execute();
        $result2 = $stmt2->get_result()->fetch_assoc();
        $stmt2->close();
    


        // Check if any result is not null
        if ($result1 !== null || $result2 !== null) {
            return false; // NIK is already registered in one of the tables
        } else {
            return true; // NIK is unique
        }
    }

    public static function checkTeleponUnique($no_telepon, $user_id = null) {
        global $conn;
    
        // Prepare the SQL statements for each table
        $query1 = "SELECT * FROM `peternak` WHERE `no_telepon` = ?";
        $query2 = "SELECT * FROM `dinas_peternakan` WHERE `no_telepon` = ?";
        $query3 = "SELECT * FROM `kepala_kelompok_ternak` WHERE `no_telepon` = ?";
    
        // Append condition to exclude the current user if user_id is provided
        if ($user_id !== null) {
            $query1 .= " AND `id` != ?";
            $query2 .= " AND `id` != ?";
            $query3 .= " AND `id` != ?";
        }
    
        // Prepare the statements
        $stmt1 = $conn->prepare($query1);
        $stmt2 = $conn->prepare($query2);
        $stmt3 = $conn->prepare($query3);
    
        // Bind the no_telepon (and user_id if provided) parameter to each statement
        if ($user_id !== null) {
            $stmt1->bind_param("si", $no_telepon, $user_id);
            $stmt2->bind_param("si", $no_telepon, $user_id);
            $stmt3->bind_param("si", $no_telepon, $user_id);
        } else {
            $stmt1->bind_param("s", $no_telepon);
            $stmt2->bind_param("s", $no_telepon);
            $stmt3->bind_param("s", $no_telepon);
        }
    
        // Execute each statement
        $stmt1->execute();
        $result1 = $stmt1->get_result()->fetch_assoc();
        $stmt1->close();
        
        $stmt2->execute();
        $result2 = $stmt2->get_result()->fetch_assoc();
        $stmt2->close();
        
        $stmt3->execute();
        $result3 = $stmt3->get_result()->fetch_assoc();
        $stmt3->close();
    
        // Check if any result is not null
        if ($result1 !== null || $result2 !== null || $result3 !== null) {
            return false; // no_telepon is already registered in one of the tables
        } else {
            return true; // no_telepon is unique
        }
    }
    
    

    public static function checkNoSuratUnique($noSurat) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM `kepala_kelompok_ternak` WHERE `no_surat` = ?");
        $stmt->bind_param("s", $noSurat);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();
        // return $result;
        if ($result !== null)  {
            return false;
        } else {
            return true;
        }
    }

    public static function checkWilayahUnique($wilayah) {
        global $conn;
        $stmt = $conn->prepare("SELECT * FROM `kepala_kelompok_ternak` WHERE `wilayah` = ?");
        $stmt->bind_param("s", $wilayah);
        $stmt->execute();
        $result = $stmt->get_result()->fetch_assoc();
        $stmt->close();

        if ($result !== null)  {
            return false;
        } else {
            return true;
        }
    }
}

?>