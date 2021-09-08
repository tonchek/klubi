<?php
include_once "session.php";
include_once "database.php";

$id = (int) $_POST['id'];
$user_id = $_SESSION['id_osebe'];
$content = $_POST['content'];
$date = date('j.n.Y H:i:s');

if(!empty($id) && !empty($content)){
    $query = "INSERT INTO komentarji(vsebina,id_osebe,id_klubi,datum_vnosa,datum_spremembe) VALUES (?,?,?,now(),now())";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$content,$user_id,$id]);
}

header("Location: club.php?id=$id");

?>