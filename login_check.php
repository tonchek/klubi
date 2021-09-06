<?php
session_start();
include_once "database.php";

$email = $_POST['email'];
$pass = $_POST['geslo'];

if(!empty($email) && !empty($pass)){
    $query = "SELECT * FROM osebe WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    
    if($stmt->rowCount() == 1){
        $user = $stmt->fetch(); //v obliki arraya shrani vse spremenljivke za določenega uporabnikaS
        if(password_verify($pass,$user['geslo'])){ 
            $_SESSION['id_osebe'] = $user['id_osebe']; //v sejo si shrani id od userja
            $_SESSION['admin'] = $user['admin'];
            $_SESSION['ime'] = $user['ime'];
            $_SESSION['priimek'] = $user['priimek'];
            header("Location: index.php");
            die();
        }
    }

}
header("Location: register.php");
die();
?>