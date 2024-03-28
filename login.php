<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Vakantiehuizen</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

  <link rel="stylesheet" href="CSS/login.css">

</head>

<body>
  <div class="container-fluid mt-5 text-center">
    <div class="row row-form">

      <div class="col-xl-6 div-contact mx-auto">

        <header>
          <h3 class="form-header mb-4"> Admin Login</h3>
        </header>

        <form method="post" class="form mx-auto">


          <div class="form-floating mb-3">
            <input name="username" type="text" class="form-control form-control-lg" id="gebruiker" style=" font-size: 22px;"
              placeholder="Gebruikersnaam">
            <label name="username" for="username" class="col-form-label form-label-group" style=" font-size: 22px;">Gebruikersnaam</label>
          </div>

          <div class="form-floating mb-3">
            <input name="password" id="pass" type="password" class="form-control form-control-lg"
              style=" font-size: 22px;" placeholder="Wachtwoord">
            <label name="password" for="password" class="col-form-label form-label-group" style=" font-size: 22px;">Wachtwoord</label>
          </div>

          <input name="submit" class="btn" type="submit" value="Inloggen">

          <div class="alert error-box" role="alert">
            <!-- hier moet de error message komen -->
            <div class="alert error-box" role="alert">
  <img class="Alert-img" src="Images/AlertImg.png">
  <?php
    if (isset($_GET['error'])) {
      $error = $_GET['error'];
      if ($error == 1) {
        echo "Gebruikersnaam niet gevonden.";
      } elseif ($error == 2) {
        echo "Er is een fout opgetreden tijdens het verwerken van de inloggegevens.";
      } elseif ($error == 3) {
        echo "Ongeldig wachtwoord.";
      }
    }
  ?>
</div>

          </div>
        </form>
      </div>
    </div>
  </div>

    <!-- db-config -->
    <?php include('Config/db_config.php'); ?>
<?php
if (isset($_POST['cancel'])) {

  header("Location: index.php");

}

if (isset($_POST['submit'])) {

$username = htmlspecialchars($_POST['username']);
$password = htmlspecialchars($_POST['password']);

  $sql = 'SELECT * FROM users WHERE gebruikersnaam = :username';
  $statement = $conn->prepare($sql);
  $statement->bindParam(':username', $username);

  try {
  $statement->execute();

  if ($statement->rowCount() == 1) {
      $row = $statement->fetch();
      $hash = $row['wachtwoord'];

      if (password_verify($password, $row['wachtwoord']) == true) {
          session_start();
          $_SESSION['gebruikersnaam'] = $username;

          header('Location: Adminpanel.php');
          die();
      } else {
          header('Location: login.php?error=3');
          die();
      }
  } else {
      header('Location: login.php?error=1');
      die();
  }
} catch (Exception $e) {
  header('Location: login.php?error=2');
  die();
}
}
// $pass = password_hash("grow", PASSWORD_DEFAULT);
// echo $pass;

?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
</body>

</html>