<?php
include_once "header.php";

if(isset($_SESSION['id_osebe'])){
    echo 'PRIJAVLJEN';
}
else {
    echo 'NEPRIJAVLJEN';
}

?>

<a href="users.php">Uporabniki</a>

<?php
include_once "footer.php";
?>
        
