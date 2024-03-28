<?php
session_start();
// if(!isset($_SESSION['admin'])) {
//     header("Location: login.php");
//     die();
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vakantiehuizen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">


    <link rel="stylesheet" href="CSS/Adminpanel.css">

    <!-- db-config -->
    <?php include('Config/db_config.php'); ?>
</head>

<body>
<!-- Side menu -->
<div class="side-menu">
    <div class="brand-name">
        <h3>Vakantiehuizen.nl</h3>
    </div>

    <ul>
        <li><img class="dash-img" src="Images/dashboard.png">Dashboard</li>
         <li><img class="dash-img" src="Images/houseIcon.png">Huizen</li>
         <li><img class="dash-img" src="Images/helpButton.png"> Help</li>
         <li><img class="dash-img" src="Images/settings.png">Settings</li>
    </ul>
</div>

<!-- Nav Menu -->
<div class="container">
    <div class="header">
        <div class="nav">
            <div class="search">
                <input type="text" placeholder="Search...">
                <button type="submit"><img class="search-img" src="Images/search.png"></button>
            </div>
            <div class="close-button">
                <a name="submit" href="index.php"><button class="btn butt">></button></a>
            </div>
        </div>
    </div>

    <!-- Titel voor tabel -->
    <div class="row">
        <div class="col">
            <div class="title-box">
                <h2 class="pop">Huizen lijst</h2>
                <a class="btn open-button add-button" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Huis toevoegen</a>
            </div>
        </div>
    </div>


    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">huizen</th>
                    <th scope="col">Edit & Delete</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td scope="col">1</td>
                    <td scope="col">Zandkreek</td>
                    <td scope="col"><a class="btn open-button edit-button" href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-pencil-square"></i></a><a class="btn delete-button"><i class="bi bi-trash3"></i></a></td>
                </tr>

                <tr>
                    <td scope="col">2</td>
                    <td scope="col">Oosterschelde</td>
                    <td scope="col"><a class="btn open-button edit-button" href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-pencil-square"></i></a><a class="btn delete-button"><i class="bi bi-trash3"></i></a></td>
                </tr>

                <tr>
                    <td scope="col">3</td>
                    <td scope="col">Grevelingen</td>
                    <td scope="col"><a class="btn open-button edit-button" href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-pencil-square"></i></a><a class="btn delete-button"><i class="bi bi-trash3"></i></a></td>
                </tr>

                <tr>
                    <td scope="col">4</td>
                    <td scope="col">Westerschelde</td>
                    <td scope="col"><a class="btn open-button edit-button" href="#" data-bs-toggle="modal" data-bs-target="#myModal"><i class="bi bi-pencil-square"></i></a><a class="btn delete-button"><i class="bi bi-trash3"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>

    <!-- De modal huizen aanmaken -->
    <div class="modal" id="myModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Huis aanmaken</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body ">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" class="form mx-auto">
                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input name="foto" id="foto" type="url" class="form-control form-control-lg" style=" font-size: 22px;" placeholder="Foto URL:">
                                <label for="foto" class="col-form-label form-label-group" style=" font-size: 22px;">Foto URL:</label>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input name="naam" id="naam" type="text" class="form-control form-control-lg" style=" font-size: 22px;" placeholder="Naam">
                                <label for="naam" class="col-form-label form-label-group" style=" font-size: 22px;">Naam</label>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input name="personen" id="personen" type="text" class="form-control form-control-lg" style=" font-size: 22px;" placeholder="Personen">
                                <label for="personen" class="col-form-label form-label-group" style=" font-size: 22px;">Personen</label>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input name="prijs" id="prijs" type="text" class="form-control form-control-lg" style=" font-size: 22px;" placeholder="Prijs">
                                <label for="prijs" class="col-form-label form-label-group" style=" font-size: 22px;">Prijs</label>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="form-floating mb-3">
                                <input name="omschrijving" id="omschrijving" type="text" class="form-control form-control-lg" style=" font-size: 22px;" placeholder="Omschrijving">
                                <label for="omschrijving" class="col-form-label form-label-group" style=" font-size: 22px;">Omschrijving</label>
                            </div>
                        </div>

                        <input type="submit" class="btn submit-button " name="voeg-submit" value="Voeg toe">

                    </form>
                </div>

            </div>
        </div>
    </div>
</div>

<?php
if (isset($_POST['voeg-submit'])) {

    $foto = htmlspecialchars($_POST['foto']);
    $huis = htmlspecialchars($_POST['naam']);
    $personen = (int) htmlspecialchars($_POST['personen']);
    $prijs = (float) htmlspecialchars($_POST['prijs']);
    $omschrijving = htmlspecialchars($_POST['omschrijving']);

 
    try {
        $query = 'INSERT INTO huizen (huis, personen, prijs, omschrijving) VALUES (' . "\"$huis\"" . ',' . "$personen" . ',' . "$prijs" . ',' . "\"$omschrijving\"" . ')';
        $stmt = $conn->prepare($query)->execute();

        $query = 'SELECT id FROM huizen ORDER BY id DESC LIMIT 1';
        $stmt = $conn->prepare($query);
        $stmt->execute();
        $row = $stmt->fetch()['id'];

        $query = 'INSERT INTO afbeeldingen (huis_id, afbeelding) VALUES (' . "$row" . ',' . "\"$foto\"" . ')';
        $stmt = $conn->prepare($query)->execute();
    } catch(Exception $e) {
        echo '<script>Console.log(' . "$e" . ')</script>';
    }
}
?>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>