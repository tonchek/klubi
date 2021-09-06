<?php
    include_once "header.php";
?>
<section class="page-section" id="contact">
    <div class="container px-lg-5">
        <div class="text-center">
            <div class="">
                <h1 class="display-5 fw-bold">Registracja</h1>
                <!--<p class="fs-4">Izpolnite podatke spodaj</p>*/-->
            </div>
            <div class="row">
                <div class="col-lg-6 mx-auto">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19.-->
                    <form action="user_insert.php" method="post">
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Ime</label>
                                <input class="form-control" type="text" name="ime" placeholder="Vnesite ime"
                                    required="required" text="center" /> </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Priimek</label>
                                <input class="form-control" type="text" name="priimek" placeholder="Vnesite priimek"
                                    required="required" />
                                </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>E-pošta</label>
                                <input class="form-control" type="email" name="email"
                                    placeholder="Vnesite elektronsko pošto" required="required" /> </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Emšo</label>
                                <input class="form-control" type="text" name="emso" placeholder="Vnesite emšo" />
                                </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Datum rojstva</label>
                                <input class="form-control" type="date" name="datum_rojstva"
                                    placeholder="Vnesite datum rojstva" required="required" />
                                </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Geslo</label>
                                <input class="form-control" type="password" name="geslo" placeholder="Vnesite geslo"
                                    required="required" /> </br>
                            </div>
                        </div>
                        <div class="control-group">
                            <div class="form-group floating-label-form-group controls mb-0 pb-2">
                                <label>Ponovi geslo</label>
                                <input class="form-control" type="password" name="geslo2" placeholder="Ponovite geslo"
                                    required="required" />
                                </br>
                            </div>
                        </div>
                        <div class="form-group"><button class="btn btn-primary btn-lg" id="sendMessageButton"
                                type="submit">Pošlji</button></div></br>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
    include_once "footer.php";
?>