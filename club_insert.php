<?php
include_once "session.php";
include_once "database.php";
 
$klub = $_POST['klub'];
$opis = $_POST['opis'];
//$grb = $_POST['grb'];
$grb = 'grb';

if(!empty($klub) && !empty($grb)){

    $query = "INSERT INTO klubi(klub,opis,grb) VALUES (?,?,?)";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$klub,$opis,$grb]);

    header("Location: clubs.php");
    die();
}
else {
    header("Location: club_add.php");
    die();
}


?>