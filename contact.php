<?php
session_start();
if(isset($_SESSION['gebruikersnaam'])) {
    session_unset();
    session_destroy();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vakantiehuizen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" 
    crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/contact.css">

    <!-- Navbar link -->
    <?php $activePage = 'index.php'; include('navbar.php'); ?>

    <!-- db-config -->
    <?php include('Config/db_config.php'); ?>
    </head>
    <body>

    <div class="container-fluid mt-5 text-center">
    <div class="row row-form">

      <div class="col-xl-6 div-contact mx-auto">

        <header>
          <h3 class="form-header mb-4">Contact</h3>
        </header>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form mx-auto">

          <div class="row">

            <div class="col-lg-6">
              <div class="form-floating mb-3">
                <input name="voornaam" id="Voor_naam" type="text" class="form-control form-control-lg" style=" font-size: 22px;" placeholder="Voornaam">
                <label for="voornaam" class="col-form-label form-label-group" style=" font-size: 22px;">Voornaam</label>
              </div>
            </div>

            <div class="col-lg-6">
              <div class="form-floating mb-3">
                <input name="achternaam" id="Achter_naam" type="text" class="form-control form-control-lg" style=" font-size: 22px;" placeholder="Achternaam">
                <label for="achternaam" class="col-form-label form-label-group" style=" font-size: 22px;">Achternaam</label>
              </div>
            </div>

          </div>

          <div class="form-floating mb-3">
            <input name="email" type="email" class="form-control form-control-lg" id="Email_adres" style=" font-size: 22px;" placeholder="Emailadres">
            <label for="email" class="col-form-label form-label-group" style=" font-size: 22px;">Emailaddres</label>
          </div>

          <div class="form-floating mb-3">
            <input name="telefoon" id="telefoon" type="phone" class="form-control form-control-lg" style=" font-size: 22px;" placeholder="Telefoonnummer">
            <label for="telefoon" class="col-form-label form-label-group" style=" font-size: 22px;">Telefoonnummer</label>
          </div>

          <div class="form-floating mb-3">
            <textarea name="beschrijving" class="form-control form-control-lg" style=" font-size: 22px; height: 9rem;" placeholder="Beschrijving" id="Textarea"></textarea>
            <label for="beschrijving" class="col-form-label form-label-group" style=" font-size: 22px;">Beschrijving</label>
          </div>

          <input name="submit" class="btn" type="submit" value="Verzenden">
        </form>
      </div>
    </div>
  </div>

  <?php


if(isset($_POST["submit"])) {
  $voornaam = $_POST['voornaam'];
  $achternaam = $_POST['achternaam'];
  $email = $_POST['email'];
  $telefoon = $_POST['telefoon'];
  $beschrijving = $_POST['beschrijving'];


  //De email valideren
  if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    die("ongeldige Emailadress");
  }

  //De voorbereiding van de query

  $datum_verzonden = date("Y-m-d H:i:s");
  $sql = "INSERT INTO contact (voornaam, achternaam, email, telefoon, beschrijving, datum_verzonden) VALUES (:voornaam, :achternaam, :email, :telefoon, :beschrijving, :datum_verzonden)";
  $stmt = $conn->prepare($sql);

  $stmt->bindParam(':voornaam', $voornaam);
  $stmt->bindParam(':achternaam', $achternaam);
  $stmt->bindParam(':email', $email);
  $stmt->bindParam(':telefoon', $telefoon);
  $stmt->bindParam(':beschrijving', $beschrijving);
  $stmt->bindParam(':datum_verzonden', $datum_verzonden);

  try {
    $stmt->execute();
    echo '<script>alert("Bedankt voor het invullen van het contact formulier!");</script>';
  } catch(PDOException $e) {
    echo "Fout bij het verzenden van het bericht: " . $e->getMessage();
  }
}
 ?> 


<script 
src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" 
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" 
crossorigin="anonymous">
</script>
</body>
</html>