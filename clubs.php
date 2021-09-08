<?php
include_once "header.php";
?>

<h1 align="center">Klubi <a href="club_add.php" class="btn btn-secondary btn-sm">Dodaj nov klub</a></h1>
<br />

<?php
include_once "database.php";
$query = "SELECT * FROM klubi";

$stmt = $pdo->prepare($query);
$stmt->execute();
?>
<section class="pt-4">
    <div class="container px-lg-5">
    <div class="row gx-lg-5">
<?php
while($row = $stmt->fetch()){
    ?>


        
            <div class="col-lg-6 col-xxl-4 mb-5">
                <div class="card bg-light border-0 h-100">
                    <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0"><a
                            href="club.php?id=<?php echo $row['id_klubi']?>">
                                </br><i><img class="masthead-avatar mb-5" width="70px" height="85px" 
                                    src="<?php echo $row['grb'];?>" alt="" /></i>
                        </a>
                        <h2 class="fs-4 fw-bold"><?php echo $row['klub']?></h2>
                        <!--<p class="mb-0"><?php echo $row['opis']?></p>-->
                    </div>
                </div>
            </div>

        
    
<?php
}
?>
</div>

</div>
</section>
<?php
include_once "footer.php";
?>