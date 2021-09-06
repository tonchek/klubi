<?php
session_start();
include_once "database.php";
 
$ime = $_POST['ime'];
$priimek = $_POST['priimek'];
$email = $_POST['email'];
$emso = $_POST['emso'];
$datum_rojstva = $_POST['datum_rojstva'];
$geslo = $_POST['geslo'];
$geslo2 = $_POST['geslo2'];

if(!empty($ime) && !empty($priimek) && !empty($email) && !empty($datum_rojstva) && !empty($geslo) && ($geslo==$geslo2)){

    $geslo = password_hash($geslo,PASSWORD_DEFAULT);

    $query = "INSERT INTO osebe(ime,priimek,email,emso,datum_rojstva,geslo) VALUES (?,?,?,?,?,?)";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$ime,$priimek,$email,$emso,$datum_rojstva,$geslo]);

    header("Location: login.php");
}
else {
    header("Location: register.php");
}


?>