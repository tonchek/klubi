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
?>



<section class="pt-4">
    <div class="container px-lg-5">
        <div class="row gx-lg-5">

            <div class="card bg-light border-0 h-100">
                <div class="card-body text-center p-4 p-lg-5 pt-0 pt-lg-0"><a
                        href="club.php?id=<?php echo $klub['id_klubi']?>">
                        </br><i><img class="masthead-avatar mb-5" width="350px" height="375px"
                                src="<?php echo $klub['grb'];?>" alt="" /></i>
                    </a>
                    <h1 class="fs-4 fw-bold"><?php echo $klub['klub'];?></h1>
                    <p class="mb-0"><?php echo $klub['opis'];?> </br> </br>
                        <a href="club_delete.php?id=<?php echo $klub['id_klubi'];?>" class="btn btn-primary btn-xl"
                            onclick="return confirm('Prepričani?')">Izbriši</a>
                        <a href="club_edit.php?id=<?php echo $klub['id_klubi'];?>"
                            class="btn btn-primary btn-xl">Uredi</a>
                </div>
            </div>

        </div>

    </div>
</section>
<div class="komentarji">
    <div class="obrazec" align="center">
        <form action="comment_insert.php" method="post">
            <input type="hidden" name="id" value="<?php echo $klub['id_klubi']?>" />
            <textarea name="content" rows="3" cols="50"></textarea></br>
            <input type="submit" value="Komentiraj" class="btn-primary" />
        </form>
    </div>
    <div class="seznam">
        <?php
            $query = "SELECT * FROM komentarji WHERE id_klubi = ?";
            $stmt = $pdo->prepare($query);
            $stmt->execute([$id]);

            while($row = $stmt->fetch()){
                echo '<div class="komentar">';
                if($_SESSION['id_osebe'] == $row['id_osebe']){
                echo '<a href="comment_delete.php?id='.$row['id_komentarji'].'" onclick="return confirm(\'Prepričani?\')">X</a>'; ?>
        <a href="comment_edit.php?id=<?php echo $row['id_komentarji'] ?>">U</a>
        <!--target="popup"  onclick="window.open('comment_edit.php','popup','width=600,height=600,scrollbars=no,resizable=no');"-->
        <form action="comment_edit.php" method="post">
            <input type="hidden" name="id" value="<?php echo $row['id_komentarji'] ?>" />
            <input type="hidden" name="vsebina" rows="3" cols="50" value="<?php echo $row['vsebina'] ?>" />
            </from>

            <?php
                
                }
                echo '<div class="oseba">'.getFullName($row['id_osebe']).'('.date("j. n. Y H:i",strtotime($row['datum_spremembe'])).')</div>';
                echo '<div class="vsebina">'.$row['vsebina'].'</div>'; 
                echo '</div>';
            }
        ?>
    </div>
</div>

<?php
include_once "footer.php";
?>