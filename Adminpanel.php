<?php
session_start();
if (!isset($_SESSION['gebruikersnaam'])) {
    header("Location: login.php");
    die();
}
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

    <?php include('Content/huis.php'); ?>
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
                    <a class="btn open-button add-button" href="#" data-bs-toggle="modal" data-bs-target="#myModal">Huis
                        toevoegen</a>
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
                    <?php
                    $sql = 'SELECT huizen.id, huizen.huis, huizen.prijs, huizen.personen, huizen.omschrijving, afbeeldingen.afbeelding FROM huizen INNER JOIN afbeeldingen ON huizen.id = afbeeldingen.huis_id;';
                    $result = $conn->query($sql);
                    if ($result->rowCount() > 0) {
                        while ($row = $result->fetch()) {
                            $huis = new Huis($row['id'], $row['huis'], $row['prijs'], $row['personen'], $row['omschrijving'], $row['afbeelding'], );
                            $huis->printRij();

                        }

                    } else {
                        echo '
            <tr>
                <th class="py-3 right-col left-col" colspan="3">Er zijn geen huizen om ingeladen te worden.</th>
            </tr>
        ';
                    }
                    ?>
                </tbody>
            </table>
        </div>

        <!-- De modal huizen aanmaken -->
        <div class="modal" id="myModal" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Huis aanmaken</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>

                    </div>
                    <div class="modal-body ">
                        <form method="POST" class="form mx-auto">
                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input name="foto" id="foto" type="url" class="form-control form-control-lg"
                                        style=" font-size: 22px;" placeholder="Foto URL:">
                                    <label for="foto" class="col-form-label form-label-group"
                                        style=" font-size: 22px;">Foto URL:</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input name="naam" id="naam" type="text" class="form-control form-control-lg"
                                        style=" font-size: 22px;" placeholder="Naam">
                                    <label for="naam" class="col-form-label form-label-group"
                                        style=" font-size: 22px;">Naam</label>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input name="personen" id="personen" type="text"
                                        class="form-control form-control-lg" style=" font-size: 22px;"
                                        placeholder="Personen">
                                    <label for="personen" class="col-form-label form-label-group"
                                        style=" font-size: 22px;">Personen</label>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input name="prijs" id="prijs" type="text" class="form-control form-control-lg"
                                        style=" font-size: 22px;" placeholder="Prijs">
                                    <label for="prijs" class="col-form-label form-label-group"
                                        style=" font-size: 22px;">Prijs</label>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input name="omschrijving" id="omschrijving" type="text"
                                        class="form-control form-control-lg" style=" font-size: 22px;"
                                        placeholder="Omschrijving">
                                    <label for="omschrijving" class="col-form-label form-label-group"
                                        style=" font-size: 22px;">Omschrijving</label>
                                </div>
                            </div>

                            <input type="submit" class="btn submit-button " name="voeg-submit" value="Voeg toe">

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Huizen updaten/aanpassen -->
        <div class="modal" id="bewerken" tabindex="-1" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h3 class="modal-title">Huis aanpassen</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <div class="modal-body ">
                        <form method="POST" class="form mx-auto">
                            <div class="col-lg-12">
                                <input class="d-none" type="text" name="id" id="hid" readonly>
                                <div class="form-floating mb-3">
                                    <input name="foto" id="hfoto" type="url" class="form-control form-control-lg"
                                        style=" font-size: 22px;" placeholder="Foto URL:" required>
                                    <label for="foto" class="col-form-label form-label-group"
                                        style=" font-size: 22px;">Foto URL:</label>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input name="naam" id="hnaam" type="text" class="form-control form-control-lg"
                                        style=" font-size: 22px;" placeholder="Naam" required>
                                    <label for="naam" class="col-form-label form-label-group"
                                        style=" font-size: 22px;">Naam</label>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input name="personen" id="hpersonen" type="text"
                                        class="form-control form-control-lg" style=" font-size: 22px;"
                                        placeholder="Personen" required>
                                    <label for="personen" class="col-form-label form-label-group"
                                        style=" font-size: 22px;">Personen</label>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input name="prijs" id="hprijs" type="text" class="form-control form-control-lg"
                                        style=" font-size: 22px;" placeholder="Prijs" required>
                                    <label for="prijs" class="col-form-label form-label-group"
                                        style=" font-size: 22px;">Prijs</label>
                                </div>
                            </div>


                            <div class="col-lg-12">
                                <div class="form-floating mb-3">
                                    <input name="omschrijving" id="homschrijving" type="text"
                                        class="form-control form-control-lg" style=" font-size: 22px;"
                                        placeholder="Omschrijving" required>
                                    <label for="omschrijving" class="col-form-label form-label-group"
                                        style=" font-size: 22px;">Omschrijving</label>
                                </div>
                            </div>
                            <script>
                                const bewerken = document.getElementById('bewerken');
                                if (bewerken) {
                                    bewerken.addEventListener('show.bs.modal', event => {
                                        const button = event.relatedTarget;

                                        const id = button.getAttribute('data-bs-huisid');
                                        const afbeelding = button.getAttribute('data-bs-afbeelding');
                                        const naam = button.getAttribute('data-bs-naam');
                                        const personen = button.getAttribute('data-bs-personen');
                                        const prijs = button.getAttribute('data-bs-prijs');
                                        const omschrijving = button.getAttribute('data-bs-omschrijving');

                                        const huisid = document.getElementById('hid');
                                        const huisafbeelding = document.getElementById('hfoto');
                                        const huisnaam = document.getElementById('hnaam');
                                        const huispersonen = document.getElementById('hpersonen');
                                        const huisprijs = document.getElementById('hprijs');
                                        const huisomschrijving = document.getElementById('homschrijving');

                                        huisid.value = id;
                                        huisafbeelding.value = afbeelding;
                                        huisnaam.value = naam;
                                        huisprijs.value = prijs;
                                        huispersonen.value = personen;
                                        huisomschrijving.value = omschrijving;

                                    });
                                }
                            </script>

                            <input type="submit" class="btn submit-button " name="bewerken-submit" value="Aanpassen">

                            <?php

                            if (isset($_POST['bewerken-submit'])) {

                            
                                $foto = htmlspecialchars($_POST['foto']);
                                $id = htmlspecialchars($_POST['id']);
                                $naam = htmlspecialchars($_POST['naam']);
                                $prijs = htmlspecialchars($_POST['prijs']);
                                $personen = htmlspecialchars($_POST['personen']);
                                $omschrijving = htmlspecialchars($_POST['omschrijving']);
                        
                                $query1 = 'UPDATE afbeeldingen SET afbeelding = :afbeelding WHERE huis_id = :id';
                                $stmt1 = $conn->prepare($query1);
                                $stmt1->bindParam(':afbeelding', $foto);
                                $stmt1->bindParam(':id', $id);
                        
                                $query2 = 'UPDATE huizen SET huis = :naam, prijs = :prijs, personen = :personen, omschrijving = :omschrijving WHERE id = :id';
                                $stmt2 = $conn->prepare($query2);
                                $stmt2->bindParam(':naam', $naam);
                                $stmt2->bindParam(':prijs', $prijs);
                                $stmt2->bindParam(':personen', $personen);
                                $stmt2->bindParam(':omschrijving', $omschrijving);
                                $stmt2->bindParam(':id', $id);
                        
                                try {
                                    $stmt1->execute();
                                    $stmt2->execute();
                                    echo "<meta http-equiv='refresh' content='0'>";
                                } catch (PDOException $e) {
                                }

                            }

                            ?>

                        </form>
                    </div>
                </div>
            </div>
        </div>



        <!-- Huizen verwijderen -->
        <div class="modal fade" id="verwijderen" tabindex="-1" data-bs-backdrop="static"
            aria-labelledby="Huizen verwijderen" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <form method="post">

                        <div class="modal-body text-center">

                            <header class="sub-header mb-4">Weet je het zeker?</header>

                            <input class="d-none" type="text" name="id" id="command" readonly>

                            <script>
                                const verwijderen = document.getElementById('verwijderen');
                                if (verwijderen) {
                                    verwijderen.addEventListener('show.bs.modal', event => {
                                        const button = event.relatedTarget;
                                        const id = button.getAttribute('data-bs-huisid');
                                        const modalBodyInput = verwijderen.querySelector('.modal-body input');
                                        modalBodyInput.value = id;
                                    });
                                }
                            </script>

                        </div>

                        <div class="modal-footer text-center">
                            <button type="button" class="btn modal-btn px-5 py-3 mx-auto"
                                data-bs-dismiss="modal">Nee</button>
                            <input name="verwijderen-submit" type="submit" class="btn modal-btn px-5 py-3 me-auto"
                                value="Ja">

                            <?php

                            if (isset($_POST['verwijderen-submit'])) {

                                $id = (int) htmlspecialchars($_POST['id']);

                                $query = 'DELETE FROM huizen WHERE id = :id';
                                $stmt = $conn->prepare($query);
                                $stmt->bindParam(':id', $id);

                                try {
                                    $stmt->execute();
                                    echo "<meta http-equiv='refresh' content='0'>";
                                } catch (PDOException $e) {
                                }
                            }

                            ?>

                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>

    <!-- Huizen aanmaken/toevoegen php code -->
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
        } catch (Exception $e) {
            echo '<script>Console.log(' . "$e" . ')</script>';
        }
    }
    ?>

    <!-- Huizen verwijderen phpcode -->
    <?php

    ?>


    <!-- huizen aanpassen/updaten php code -->
    <?php
    if (isset($_POST['delete-submit'])) {
        $id = $_GET['id'];

        $query = "DELETE FROM huizen WHERE id = $id";

        $stmt = $conn->prepare($query);
        $stmt->bindParam(':id', $id);

        if ($stmt->execute()) {
            echo "Huis met id $id is succevol verwijderd";
        } else {
            echo "Fout bij het verwijderen van het huis";
        }
    }
    ?>

    <?php

    if (isset($_POST['bewerken-submit'])) {



    }

    ?>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>
</body>

</html>