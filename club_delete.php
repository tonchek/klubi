<?php
include_once "session.php";
include_once "database.php";

$id = (int) $_GET['id'];

$query = "DELETE FROM klubi WHERE id_klubi = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

header("Location: clubs.php");
die();

?>