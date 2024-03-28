<?php
class Huis
{
    public $afbeelding;
    public $id;
    public $huis;
    public $personen;
    public $prijs;
    public $omschrijving;
    function __construct($id, $huis, $personen, $prijs, $omschrijving, $afbeelding)
    {
        $this->id = $id;
        $this->afbeelding = $afbeelding;
        $this->huis = $huis;
        $this->personen = $personen;
        $this->prijs = $prijs;
        $this->omschrijving = $omschrijving;
    }


    function printOsso()
    {
        echo '
        <div class="col-3 col-sm-6 box">
            <div class="img1-box">
                <img class="Zandkreek1" src="' . $this->afbeelding . '">
            </div>
            <div class="title-div mt-3">
                <h3 class="title">' . $this->huis . '</h3>
            </div>
            <div class="pers-div">
                <p class="paragraaf">' . $this->personen . ' personen </p>
            </div>
            <div class="Prijs-div">
                <p class="paragraaf">' . $this->prijs . ' prijs</p>
            </div>
            <div class="Omschrijving-div">
                <p class="paragraaf">Omschrijving: ' . $this->omschrijving . '</p>
            </div>
            <div class="but-div mx-4">
                <div class="btn">Boeken</div>
            </div>
        </div>
';
    }

    function printRij() {
        echo '<tr>';
        echo '<td scope="col">' . $this->id . '</td>';
        echo '<td scope="col">' . $this->huis . '</td>';
        echo '<td scope="col"><button class="btn edit-button" data-bs-toggle="modal" data-bs-target="#bewerken" data-bs-huisid="' . $this->id . '" data-bs-afbeelding="' . $this->afbeelding . '" data-bs-naam="' . $this->huis . '" data-bs-personen="' . $this->personen . '" data-bs-prijs="' . $this->prijs . '" data-bs-omschrijving="' . $this->omschrijving . '"><i class="bi bi-pencil-square"></i></button>
        <button class="btn delete-button" data-bs-toggle="modal" data-bs-target="#verwijderen" data-bs-huisid="' . $this->id . '"><i class="bi bi-trash3"></i></button></td>';
        echo '</tr>';
    }
}
?>