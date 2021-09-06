<?php
include_once "session.php";
include_once "database.php";
 
$klub = $_POST['klub'];
$opis = $_POST['opis'];

$target_dir = "grbi/";

$random = date('Ymdhisu');

$grb = $target_dir . $random . basename($_FILES["grb"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($grb,PATHINFO_EXTENSION));

//preveri ali datoteka ima dejansko velikost
$check = getimagesize($_FILES["grb"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }


// check file size max 5 MB
if ($_FILES["grb"]["size"] > 5000000) {
    $uploadOk = 0;
  }

// allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $uploadOk = 0;
  }

if(!empty($klub) && ($uploadOk == 1)){

    if (move_uploaded_file($_FILES["grb"]["tmp_name"], $grb)) {
    $query = "INSERT INTO klubi(klub,opis,grb) VALUES (?,?,?)";

    $stmt = $pdo->prepare($query);
    $stmt->execute([$klub,$opis,$grb]);

    header("Location: clubs.php");
    die();
} else{
    header("Location: club_add.php");
    die();
}
}
else {
    header("Location: club_add.php");
    die();
}


?>