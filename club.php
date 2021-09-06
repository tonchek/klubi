<?php
include_once "header.php";
include_once "database.php";

$id = (int) $_GET['id'];
$query = "SELECT * FROM klubi WHERE id_klubi = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

if ($stmt->rowCount() != 1) {
    header("Location: index.php");
    die();
}

$klub = $stmt->fetch();




    //prikaže povezavo samo administratorjem
    
?>
<a href="club_delete.php?id=<?php echo $klub['id_klubi'];?>" class="btn btn-primary btn-xl"
    onclick="return confirm('Prepričani?')">Izbriši</a>
<a href="club_edit.php?id=<?php echo $klub['id_klubi'];?>" class="btn btn-primary btn-xl">Uredi</a>

<section class="masthead bg-primary text-white text-center">
    <div class="container d-flex align-items-center flex-column">
        <!-- Masthead Avatar Image-->
        <img class="masthead-avatar mb-5" src="<?php echo $klub['grb'];?>" alt="" />
        <!-- Masthead Heading-->
        <h1 class="masthead-heading text-uppercase mb-0"><?php echo $klub['klub'];?></h1>
        <!-- Icon Divider-->
        <div class="divider-custom divider-light">
            <div class="divider-custom-line"></div>
            <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
            <div class="divider-custom-line"></div>
        </div>
        <!-- Masthead Subheading-->
        <p class="masthead-subheading font-weight-light mb-0"><?php echo $klub['opis'];?></p>
    </div>
</section>

<?php
include_once "footer.php";
?>