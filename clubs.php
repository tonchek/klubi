<?php
include_once "header.php";
?>

<h1>Klubi</h1>

<a href="club_add.php" class="btn btn-secondary btn-lg">Dodaj nov klub</a>
<br />

<?php
include_once "database.php";
$query = "SELECT * FROM klubi";

$stmt = $pdo->prepare($query);
$stmt->execute();

while($row = $stmt->fetch()){
    echo $row['klub'];
}
?>

<?php
include_once "footer.php";
?>