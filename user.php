<?php
include_once "header.php";
include_once "database.php";

$id = (int) $_GET['id'];
$query = "SELECT * FROM osebe WHERE id_osebe = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);



$oseba = $stmt->fetch();


    //prikaže povezavo samo administratorjem
    
?>


<section class="pt-4">
    <div class="container px-lg-5">
        <div class="row gx-lg-5">
            <div class="card bg-light border-0 h-100">
                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0"><a
                        href="club.php?id=<?php echo $oseba['id_osebe']?>">
                        <?php if(!empty($oseba['slika'])){ ?>
                        </br><i><img class="masthead-avatar mb-5" width="200px" height="220px"
                                src="<?php echo $oseba['slika'];?>" alt="" /></i> <?php
                            } else { ?>
                        </br><i><img class="masthead-avatar mb-5" width="150px" height="170px" src="./assets/oldman.png"
                                alt="" /></i> <?php
                            } ?>
                    </a>
                    <h1 class="fs-4 fw-bold"><?php echo getFullName($id);?></h1>
                    <p class="mb-0"><?php echo 'EMŠO: '.$oseba['emso']?>
                    <p class="mb-0"><?php echo 'Datum rojstva: '.$oseba['datum_rojstva']?>
                    <p class="mb-0"><?php echo 'E-mail: '.$oseba['email']?>
                    <p class="mb-0">Opis: </br><?php echo $oseba['opis']?> </br> </br>
                        <a href="user_delete.php?id=<?php echo $oseba['id_osebe'];?>" class="btn btn-primary btn-xl"
                            onclick="return confirm('Prepričani?')">Izbriši</a>
                        <a href="user_edit.php?id=<?php echo $oseba['id_osebe'];?>"
                            class="btn btn-primary btn-xl">Uredi</a>
                </div>
            </div>
        </div>
    </div>
</section>


<?php
include_once "footer.php";
?>