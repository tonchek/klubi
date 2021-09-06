<?php
include_once "header.php";
?>

<h1 align="center">Klubi <a href="club_add.php" class="btn btn-secondary btn-lg" align="right">Dodaj nov klub</a></h1>
<br />

<?php
include_once "database.php";
$query = "SELECT * FROM klubi";

$stmt = $pdo->prepare($query);
$stmt->execute();

while($row = $stmt->fetch()){
    ?>
<div class="row gx-lg-5">
    <div class="col-lg-6 col-xxl-4 mb-5">
        <div class="card bg-light border-0 h-100">
            <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0">
                <div class="feature bg-primary bg-gradient text-white rounded-3 mb-4 mt-n4"><i
                        class="bi bi-collection"></i></div>
                <h2 class="fs-4 fw-bold"><?php echo $row['klub']?></h2>
                <p class="mb-0"><?php echo $row['opis']?></p>
            </div>
        </div>
    </div>
    <?php
}
?>

    <?php
include_once "footer.php";
?>