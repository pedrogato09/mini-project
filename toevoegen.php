<?php
$pageTitle = 'Student toevoegen';
include "header.php";
?>

<h2>Student toevoegen</h2>

<form action="opslaan.php" method="POST" onsubmit="return checkForm()">
    <label>Voornaam:<br>
        <input type="text" name="voornaam" required>
    </label><br><br>

    <label>Achternaam:<br>
        <input type="text" name="achternaam" required>
    </label><br><br>

    <label>Klas:<br>
        <input type="text" name="klas" required>
    </label><br><br>

    <label>Studentnummer:<br>
        <input type="text" name="studentnummer" required>
    </label><br><br>

    <label>Adres:<br>
        <input type="text" name="adres" required>
    </label><br><br>

    <input type="submit" value="Opslaan">
</form>

<script>
function checkForm(){
    var naam = document.forms[0]["voornaam"].value;
    if(naam.length < 2){
        alert("Naam is te kort");
        return false;
    }
    return true;
}
</script>

<?php include "footer.php"; ?>