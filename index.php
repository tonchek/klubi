<?php
include_once "header.php";
include_once "database.php";



if(isset($_SESSION['id_osebe'])){
    $id = $_SESSION['id_osebe'];
    $query = "SELECT * FROM osebe WHERE id_osebe = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $oseba = $stmt->fetch();
    ?>
    <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">Dobrodošel<?php echo getFullName($id);?>!</h1>
                        <p class="fs-4">Izberite katero stran si želite ogledati:</p>
                        <a class="btn btn-primary btn-lg" href="users.php">Uporabniki</a>
                        <a class="btn btn-primary btn-lg" href="clubs.php">Klubi</a>
                    </div>
                </div>
            </div>
    </header>
<?php }
else { ?>
    <header class="py-5">
            <div class="container px-lg-5">
                <div class="p-4 p-lg-5 bg-light rounded-3 text-center">
                    <div class="m-4 m-lg-5">
                        <h1 class="display-5 fw-bold">Pozdravljeni na spletni strani Klubi ISS</h1>
                        <p class="fs-4">Če si želite ogledati našo spletno stran se prijavite ali registrirajte:</p>
                        <a class="btn btn-primary btn-lg" href="login.php">Prijava</a>
                        <a class="btn btn-primary btn-lg" href="registration.php">Registracija</a>
                    </div>
                </div>
            </div>
    </header>
<?php }

?>


<?php
include_once "footer.php";
?>
        
