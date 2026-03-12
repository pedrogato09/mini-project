<?php

include "db.php";

$id = intval($_POST['id']);
$voornaam = mysqli_real_escape_string($conn, $_POST['voornaam']);
$achternaam = mysqli_real_escape_string($conn, $_POST['achternaam']);

$klas = mysqli_real_escape_string($conn, $_POST['klas']);
$studentnummer = mysqli_real_escape_string($conn, $_POST['studentnummer']);
$adres = mysqli_real_escape_string($conn, $_POST['adres']);

$sql = "UPDATE studenten 
        SET voornaam='$voornaam', achternaam='$achternaam', klas='$klas', studentnummer='$studentnummer', adres='$adres' 
        WHERE id=$id";

mysqli_query($conn,$sql);

header("Location: index.php");

?>