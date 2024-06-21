<?php

require_once "dbh.inc.php"; //connects to the database

try {
    $sqlLeverancier = "SELECT idLeverancier, Levering, BedrijfsNaam, Adres, Postcode, ContactspersoonNaam, Email, Telefoonnummer FROM leverancier"; //Selects the product data
    $resultLeverancier = $pdo->query($sqlLeverancier);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultLeverancier->rowCount() > 0) { //goes through the data and place it in the right place
    while ($row = $resultLeverancier->fetch(PDO::FETCH_ASSOC)) {
        echo "<form action='Responses/editLeverancierResponse.php' method='POST'>";
        echo  "<div class='item-list__item-row item-list__row--suppliers'>";
        echo    "<p class='field supplier-field--next'>" . $row["Levering"] . "</p>"; //MOET NOG AANGEPAST WORDEN
        echo    "<p class='field supplier-field--company'>" . $row["BedrijfsNaam"] . "</p>";
        echo    "<p class='field supplier-field--address'>" . $row["Adres"] . "</p>";
        echo    "<p class='field supplier-field--postalCode'>" . $row["Postcode"] . "</p>";
        echo    "<p class='field supplier-field--contact'>" . $row["ContactspersoonNaam"] . "</p>";
        echo    "<p class='field supplier-field--email'>" . $row["Email"] . "</p>";
        echo    "<p class='field supplier-field--phone'>" . $row["Telefoonnummer"] . "</p>";
        echo    "<div class='item-list__edit-buttons-cell'>";
        echo         "<button class='item-list__edit-button item-list__edit-button--edit' type='button'>Bewerken</button>";
        echo         "<button class='item-list__edit-button item-list__edit-button--save hidden' type='submit'>Opslaan</button>";
        echo         "<button class='item-list__edit-button item-list__edit-button--delete' type='button'>Verwijderen</button>";
        echo    "</div>";
        echo  "</div>";
        echo "</form>";
    }
}
