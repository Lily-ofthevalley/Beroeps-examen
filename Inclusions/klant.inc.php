<?php

require_once "dbh.inc.php"; //connects to the database

try {
    $sqlKlant = "SELECT idKlant, GezinsNaam, TelefoonNummer, Email, Adres, Postcode, AantalVolwassenen, AantalKinderen, Aantalbabys, Wensen, Allergiën FROM klant"; //Selects the customers data
    $resultKlant = $pdo->query($sqlKlant);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultKlant->rowCount() > 0) { //goes through the data and place it in the right place
    while ($row = $resultKlant->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='item-list__item-row item-list__row--customers'>";
        echo   "<p class='field customer-field--name'>" . $row["GezinsNaam"] . "</p>";
        echo   "<p class='field customer-field--phone'>" . $row["TelefoonNummer"] . "</p>";
        echo   "<p class='field customer-field--email'>" . $row["Email"] . "</p>";
        echo   "<p class='field customer-field--address'>" . $row["Adres"] . "</p>";
        echo   "<p class='field customer-field--postalCode'>" . $row["Postcode"] . "</p>";
        echo   "<div class='field customer-field--members'>";
        echo     "<p>" . $row["AantalVolwassenen"] . "</p>";
        echo     "<p>" . " Volwassenen, " . "</p>";
        echo     "<p>" . $row["AantalKinderen"] . "</p>";
        echo     "<p>" . " Kinderen, " . "</p>";
        echo     "<p>" . $row["Aantalbabys"] . "</p>";
        echo     "<p>" . " Baby's" . "</p>";
        echo   "</div>";
        echo   "<p class='field customer-field--wishes'>" . $row["Wensen"] . "</p>";
        echo   "<p class='field customer-field--allergies'>" . $row["Allergiën"] . "</p>";
        echo   "<div class='item-list__buttons-cell'>";
        echo     "<div class='item-list__buttons-cell--edit'>";
        echo       "<button class='item-list__button item-list__button--edit' type='button'>Bewerken</button>";
        echo       "<button class='item-list__button item-list__button--save hidden' type='submit'>Opslaan</button>";
        echo       "<button class='item-list__button item-list__button--delete' type='button'>Verwijderen</button>";
        echo     "</div>";
        echo     "<div class='item-list__buttons-cell--delete hidden'>";
        echo       "<p>Verwijderen?</p>";
        echo       "<button class='item-list__button item-list__button--cancel' type='button'>Nee</button>";
        echo       "<button class='item-list__button item-list__button--confirm' type='button'>Ja</button>";
        echo     "</div>";
        echo   "</div>";
        echo "</div>";
    }
}
