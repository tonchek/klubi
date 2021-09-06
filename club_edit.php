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
<section class="page-section">
    <div class="container px-lg-5">
        <div class="text-center">
            <div class="">
                <h1 class="display-5 fw-bold">Uredi klub</h1>
                <!--<p class="fs-4">Izpolnite podatke spodaj</p>*/-->
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                    <form action="club_update.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?php echo $klub['id_klubi'];?>"/>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Ime kluba</label>
                                <input class="form-control" type="text" name="klub" placeholder="Vnesite ime kluba"
                                    required="required" text="center" value="<?php echo $klub['klub']?>"/> </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Opis</label></br>    
                                <textarea name="opis" cols="58" rows="5" class="form-control" id="message" 
                                    placeholder=    "Vnesite opis kluba"><?php echo $klub['opis']?></textarea>
                                </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Grb</label>
                                <input class="form-control" type="file" name="grb"/> </br>
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