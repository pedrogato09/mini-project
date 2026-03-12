<?php

include "db.php";

$id = isset($_GET['id']) ? intval($_GET['id']) : 0;

$sql = "DELETE FROM studenten WHERE id=$id";

mysqli_query($conn,$sql);

header("Location: index.php");

?>