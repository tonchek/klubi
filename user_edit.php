<?php
    include_once "header.php";
    include_once "database.php";

$id = (int) $_GET['id'];

$query = "SELECT * FROM osebe WHERE id_osebe = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);

if ($stmt->rowCount() != 1) {
    header("Location: index.php");
    die();
}
$oseba = $stmt->fetch();
?>
<section class="page-section">
    <div class="container px-lg-5">
        <div class="text-center">
            <div class="">
                <h1 class="display-5 fw-bold">Uredi svoj profil</h1>
                <!--<p class="fs-4">Izpolnite podatke spodaj</p>*/-->
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                    <form action="user_update.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $oseba['id_osebe'];?>"/>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Ime</label>
                                <input class="form-control" type="text" name="ime" placeholder="Vnesite ime"
                                    required="required" text="center" value="<?php echo $oseba['ime']?>"/> </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Priimek</label>
                                <input class="form-control" type="text" name="priimek" placeholder="Vnesite priimek"
                                    required="required" text="center" value="<?php echo $oseba['priimek']?>"/> </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>EMŠO</label>
                                <input class="form-control" type="text" name="emso" placeholder="Vnesite emšo"
                                    text="center" value="<?php echo $oseba['emso']?>"/> </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Datum rojstva</label>
                                <input class="form-control" type="date" name="datum_rojstva" placeholder="Vnesite ime"
                                    required="required" text="center" value="<?php echo $oseba['datum_rojstva']?>"/> </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Opis</label></br>    
                                <textarea name="opis" cols="58" rows="5" class="form-control" id="message" 
                                    placeholder=    "Vnesite opis"><?php echo $oseba['opis']?></textarea>
                                </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Slika</label>
                                <input class="form-control" type="file" name="slika"/> </br>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-lg" id="sendMessageButton"
                                type="submit">Spremeni</button></div></br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include_once "footer.php";
?>