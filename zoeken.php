<?php
$pageTitle = 'Zoek student';
include "db.php";
include "header.php";
?>

<h2>Zoek student</h2>

<form method="GET">
    <input type="text" name="zoek" placeholder="Voornaam, achternaam, klas..." required>
    <input type="submit" value="Zoeken">
</form>

<?php
if(isset($_GET['zoek'])){
    $zoek = mysqli_real_escape_string($conn, $_GET['zoek']);

    // build query without stray backslashes
    $sql = "SELECT * FROM studenten WHERE " .
           "voornaam LIKE '%$zoek%' OR " .
           "achternaam LIKE '%$zoek%' OR " .
           "klas LIKE '%$zoek%' OR " .
           "studentnummer LIKE '%$zoek%' OR " .
           "adres LIKE '%$zoek%'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        echo "<table>";
        echo "<tr><th>Voornaam</th><th>Achternaam</th><th>Klas</th><th>Studentnummer</th><th>Email</th><th>Acties</th></tr>";
        while($row = mysqli_fetch_assoc($result)){
            echo "<tr>";
            echo "<td>".htmlspecialchars($row['voornaam'])."</td>";
            echo "<td>".htmlspecialchars($row['achternaam'])."</td>";
            echo "<td>".htmlspecialchars($row['klas'])."</td>";
            echo "<td>".htmlspecialchars($row['studentnummer'])."</td>";
            echo "<td>".htmlspecialchars($row['adres'])."</td>";
            echo "<td><a href='edit.php?id=".$row['id']."'>Edit</a> | <a href='delete.php?id=".$row['id']."'>Delete</a></td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<p>Geen resultaten gevonden.</p>";
    }
}

include "footer.php";
?>