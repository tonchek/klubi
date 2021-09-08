<?php
include_once "session.php";
include_once "database.php";

$id = (int) $_POST['id'];
$vsebina = $_POST['vsebina'];
$id_osebe = $_SESSION['id_osebe'];

//pogledam za kateri klub gre
$query = "SELECT * FROM komentarji WHERE id_klubi = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$klub = $stmt->fetch();
$id_kluba = $klub['id_kluba'];


$query = "UPDATE komentarji SET vsebina = ? WHERE  id_komentarji = ? AND id_osebe = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$vsebina,$id,$id_osebe]);


header("Location: clubs.php");
die();

?>