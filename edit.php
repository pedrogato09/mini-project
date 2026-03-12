<?php
$pageTitle = 'Student aanpassen';

include "db.php";
include "header.php";

$id = $_GET['id'];

$sql = "SELECT * FROM studenten WHERE id=$id";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);

?>

<h2>Student aanpassen</h2>

<form action="update.php" method="POST">

<input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

<label>Voornaam:<br>
    <input type="text" name="voornaam" value="<?php echo htmlspecialchars($row['voornaam']); ?>">
</label><br><br>

<label>Achternaam:<br>
    <input type="text" name="achternaam" value="<?php echo htmlspecialchars($row['achternaam']); ?>">
</label><br><br>

<label>Klas:<br>
    <input type="text" name="klas" value="<?php echo htmlspecialchars($row['klas']); ?>">
</label><br><br>

<label>Studentnummer:<br>
    <input type="text" name="studentnummer" value="<?php echo htmlspecialchars($row['studentnummer']); ?>">
</label><br><br>

<label>Email:<br>
    <input type="email" name="adres" value="<?php echo htmlspecialchars($row['adres']); ?>">
</label><br><br>

<input type="submit" value="Update">

</form>

<?php include "footer.php"; ?>