<?php

include "db.php";

$voornaam = mysqli_real_escape_string($conn, $_POST['voornaam']);
$achternaam = mysqli_real_escape_string($conn, $_POST['achternaam']);

$klas = mysqli_real_escape_string($conn, $_POST['klas']);
$studentnummer = mysqli_real_escape_string($conn, $_POST['studentnummer']);
$adres = mysqli_real_escape_string($conn, $_POST['adres']);

if(empty($voornaam) || empty($klas)){
    die("Niet alle velden zijn ingevuld");
}

$sql = "INSERT INTO studenten (voornaam, achternaam, klas, studentnummer, adres) VALUES ('$voornaam', '$achternaam', '$klas', '$studentnummer', '$adres')";

mysqli_query($conn, $sql);

header("Location: index.php");

?>