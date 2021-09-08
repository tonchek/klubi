<?php
include_once "session.php";
include_once "database.php";

$id = (int) $_POST['id'];
$ime = $_POST['ime'];
$priimek = $_POST['priimek'];
$emso = $_POST['emso'];
$datumr = $_POST['datum_rojstva'];
$opis = $_POST['opis'];
$slika = $_POST['slika'];




$target_dir = "slike/";

$random = date('Ymdhisu');

$slika = $target_dir . $random . basename($_FILES["slika"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($slika,PATHINFO_EXTENSION));

//preveri ali datoteka ima dejansko velikost
$check = getimagesize($_FILES["slika"]["tmp_name"]);
if($check !== false) {
    $uploadOk = 1;
  } else {
    $uploadOk = 0;
  }


// check file size max 5 MB
if ($_FILES["slika"]["size"] > 5000000) {
    $uploadOk = 0;
  }

// allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
    $uploadOk = 0;
  }

if(!empty($ime) && !empty($priimek)){

    if($uploadOk == 1) {
        // uporabnik je naložil sliko
        if (move_uploaded_file($_FILES["slika"]["tmp_name"], $slika)) {
        $query = "UPDATE osebe SET ime=?, priimek=?, emso=?, datum_rojstva=?, opis=?,slika=? WHERE id_osebe=?";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$ime,$priimek,$emso,$datumr,$opis,$slika,$id]);

        header("Location: user.php?id=$id");
        die();
    } else{
        header("Location: user_edit.php?id=$id");
        die();
    }
    }
    else{
        //uorabnik ni naložil slike
        $query = "UPDATE osebe SET ime=?, priimek=?, emso=?, datum_rojstva=?, opis=? WHERE id_osebe=?";

        $stmt = $pdo->prepare($query);
        $stmt->execute([$ime,$priimek,$emso,$datumr,$opis,$id]);

        header("Location: user.php?id=$id");
        die();
    }
}
else {
    header("Location: user_edit.php?id=$id");
    die();
}

?>