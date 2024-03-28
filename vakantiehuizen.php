<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vakantiehuizen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="CSS/vakantiehuizen.css">

    <!-- Navbar link -->
    <?php $activePage = 'vakantiehuizen.php';
    include('navbar.php'); ?>

    <!-- db-config -->
    <?php include('Config/db_config.php'); ?>

    <?php include('Content/huis.php'); ?>


</head>

<body>

<!-- De huizen -->
<div class="container mx-auto mt-4">
    <div class="row">

<?php
    $query = 'SELECT huizen.id, huis, personen, prijs, omschrijving, afbeelding FROM afbeeldingen  INNER JOIN huizen  ON afbeeldingen.huis_id = huizen.id';
    $stmt = $conn->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch()) {
        $huis = new Huis($row['id'], $row['huis'], $row['personen'], $row['prijs'], $row['omschrijving'], $row['afbeelding']);
    $huis->printOsso();
    }
?>
    </div>
</div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>
</body>

</html>