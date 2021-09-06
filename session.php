<?php
session_start();

// pravice dostopa za neprijavljenega uporabnika
$allow = ['/klubi/index.php','/klubi/login.php','/klubi/register.php','/klubi/login_check.php'];

// preverim, če je uporabnik prijavljen
if(!isset($_SESSION['id_osebe']) && (!in_array($_SERVER['REQUEST_URI'],$allow))) {


    header("Location: login.php");
    die();
}


?>