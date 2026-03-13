<?php
$pageTitle = 'Alle studenten';
include "db.php";
include "header.php";
?>


<h2>Alle studenten</h2>

<table>

<tr>
    <th>Voornaam</th>
    <th>Achternaam</th>
    <th>Klas</th>
    <th>Studentnummer</th>
    <th>Adres</th>
    <th>Acties</th>
</tr>

<?php

$sql = "SELECT * FROM studenten";
$result = mysqli_query($conn,$sql);

while($row = mysqli_fetch_assoc($result)){
    echo "<tr>";
    echo "<td>" . htmlspecialchars($row['voornaam']) . "</td>";
    echo "<td>" . htmlspecialchars($row['achternaam']) . "</td>";
    echo "<td>" . htmlspecialchars($row['klas']) . "</td>";
    echo "<td>" . htmlspecialchars($row['studentnummer']) . "</td>";
    echo "<td>" . htmlspecialchars($row['adres']) . "</td>";
    echo "<td>" .
         "<a href='edit.php?id=" . urlencode($row['id']) . "'>Edit</a> | " .
         "<a href='delete.php?id=" . urlencode($row['id']) . "'>Delete</a>" .
         "</td>";
    echo "</tr>";
}

?>

</table>

<?php include "footer.php"; ?>