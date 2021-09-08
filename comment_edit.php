<?php
    include_once "header.php";
    include_once "database.php";

$id = (int) $_GET['id'];

$query = "SELECT * FROM komentarji WHERE id_komentarji = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

$komentar = $stmt->fetch();
?>
<div class="komentarji">
    <div class="obrazec" align="center">
        <form action="comment_update.php" method="post" onSubmit= "window.close();">
            <input type="hidden" name="id" value="<?php echo $komentar['id_komentarji']?>" />
            <textarea name="vsebina" rows="3" cols="50"><?php echo $komentar['vsebina']?></textarea></br>
            <input type="submit" value="Komentiraj" class="btn-primary" />
        </form>
    </div>
</div>

<?php
    include_once "footer.php";
?>