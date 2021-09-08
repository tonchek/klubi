<?php
session_start();

// pravice dostopa za neprijavljenega uporabnika
$allow = ['/klubi/index.php','/klubi/login.php','/klubi/register.php','/klubi/login_check.php'];

// preverim, če je uporabnik prijavljen
if(!isset($_SESSION['id_osebe']) && (!in_array($_SERVER['REQUEST_URI'],$allow))) {


    header("Location: login.php");
    die();
}

function getFullName($id_osebe){
    require "database.php";

    $query = "SELECT * FROM osebe WHERE id_osebe = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id_osebe]);

    $user = $stmt->fetch();

    return $user['ime'].' '.$user['priimek'];
}

function admin() {
    return $_SESSION['admin'];
}

//če trenutno prijavljeni ni admin, ga preusmeri na index
function adminOnly() {
    if (!isset($_SESSION['admin']) || ($_SESSION['admin'] != 1)){
    header("Location: index.php");
    die();
    }
}


?>