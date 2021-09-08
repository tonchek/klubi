<?php
include_once "session.php";
adminOnly();
include_once "database.php";

$id = (int) $_GET['id'];

//izbriše vse njegove komantarje
$query = "DELETE FROM komentarji WHERE id_osebe = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

$query = "DELETE FROM osebe WHERE id_osebe = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

header("Location: users.php");
die();

?>