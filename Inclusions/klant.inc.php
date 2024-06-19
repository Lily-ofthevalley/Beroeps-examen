<?php

require_once "dbh.inc.php"; //connects to the database

try {
    $sqlKlant = "SELECT GezinsNaam, TelefoonNummer, Email, Adres, AantalVolwassenen, AantalKinderen, Aantalbabys, Wensen, Allergiën FROM klant"; //Selects the customers data
    $resultKlant = $pdo->query($sqlKlant);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultKlant->rowCount() > 0) { //goes through the data and place it in the right place
    while ($row = $resultKlant->fetch(PDO::FETCH_ASSOC)) {
        echo "<div class='item-list__item-row item-list__row--customers'>";
        echo   "<p>" . $row["GezinsNaam"] . "</p>";
        echo   "<p>" . $row["TelefoonNummer"] . "</p>";
        echo   "<p>" . $row["Email"] . "</p>";
        echo   "<p>" . $row["Adres"] . "</p>";
        echo   "<p>" . $row["AantalVolwassenen"] . "Volwassenen, " . $row["AantalKinderen"] . "Kinderen, " . $row["Aantalbabys"] . "Babies <p>";
        echo   "<p>" . $row["Wensen"] . "</p>";
        echo   "<p>" . $row["Allergiën"] . "</p>";
        echo   "<div class='item-list__edit-buttons-cell'>";
        echo     "<button class='item-list__edit-button'>Bewerken</button>";
        echo     "<button class='item-list__edit-button'>Verwijderen</button>";
        echo   "</div>";
        echo "</div>";
    }
}