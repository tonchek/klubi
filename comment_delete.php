<?php
include_once "session.php";
include_once "database.php";

$id = (int) $_GET['id'];
$id_osebe = $_SESSION['id_osebe'];
$id_klub = $_SESSION['id_klubi'];

//pogledam za kateri klub gre
$query = "SELECT * FROM komentarji WHERE id_klubi = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$klub = $stmt->fetch();


$query = "DELETE FROM komentarji WHERE id_komentarji = ? AND id_osebe = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id,$id_osebe]);


header("Location: clubs.php");
die();

?>