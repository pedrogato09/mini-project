<?php

$host = "localhost";
$user = "root";
$pass = "";
$db = "klassen";

// connect without selecting a database so we can create it if it doesn't exist
$conn = mysqli_connect($host, $user, $pass);
if(!$conn){
    die("Database verbinding mislukt: " . mysqli_connect_error());
}

// attempt to select the database; if mysqli is configured to throw exceptions we catch them
try {
    mysqli_select_db($conn, $db);
} catch (mysqli_sql_exception $e) {
    // database may not exist, try to create it
    $create = "CREATE DATABASE IF NOT EXISTS `$db` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci";
    if(!mysqli_query($conn, $create)){
        die("Kon database '$db' niet selecteren of aanmaken: " . mysqli_error($conn));
    }
    // try selecting again (catch any further exceptions quietly)
    try {
        mysqli_select_db($conn, $db);
    } catch (mysqli_sql_exception $e2) {
        die("Kon database '$db' niet selecteren: " . $e2->getMessage());
    }
}

// ensure table exists
$tableSql = "CREATE TABLE IF NOT EXISTS studenten (
    id INT AUTO_INCREMENT PRIMARY KEY,
    voornaam VARCHAR(100) NOT NULL,
    achternaam VARCHAR(100),
    klas VARCHAR(50),
    studentnummer VARCHAR(50),
    adres VARCHAR(255)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
mysqli_query($conn, $tableSql);

// Alter table to ensure columns are present (in case table existed with different structure)
$alterSql = "ALTER TABLE studenten 
    ADD COLUMN IF NOT EXISTS id INT AUTO_INCREMENT PRIMARY KEY FIRST,
    ADD COLUMN IF NOT EXISTS studentnummer VARCHAR(50),
    ADD COLUMN IF NOT EXISTS adres VARCHAR(255);";
mysqli_query($conn, $alterSql);

?>