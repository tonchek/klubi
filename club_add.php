<?php
    include_once "header.php";
?>
<section class="page-section">
    <div class="container px-lg-5">
        <div class="text-center">
            <div class="">
                <h1 class="display-5 fw-bold">Dodaj nov klub</h1>
                <!--<p class="fs-4">Izpolnite podatke spodaj</p>*/-->
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                    <form action="club_insert.php" method="post" enctype="multipart/form-data">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Ime kluba</label>
                                <input class="form-control" type="text" name="klub" placeholder="Vnesite ime kluba"
                                    required="required" text="center" /> </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Opis</label></br>    
                                <textarea name="opis" cols="58" rows="5" class="form-control" id="message" 
                                    placeholder="Vnesi opis kluba"></textarea>
                                </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Grb</label>
                                <input class="form-control" type="file" name="grb"
                                    placeholder="Vnesite elektronsko pošto" required="required" /> </br>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-lg" id="sendMessageButton"
                                type="submit">Dodaj</button></div></br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include_once "footer.php";
?>