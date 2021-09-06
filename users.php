<?php
include_once 'header.php';
?>

<a href="index.php">Domov</a><br />
<?php
    echo $_GET['username'];
    echo $_GET['visina'];
    echo $_GET['teza'];
    echo $_GET['oci'];

?>

<?php
include_once "footer.php";
?>