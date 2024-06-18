<?php

require_once "dbh.inc.php"; //connects to the database

try {
    $sqlLeverancier = "SELECT BedrijfsNaam, Adres, Postcode, ContactspersoonNaam, Email, Telefoonnummer FROM leverancier"; //Selects the product data
    $resultLeverancier = $pdo->query($sqlLeverancier);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultLeverancier->rowCount() > 0) { //goes through the data and place it in the right place
    while ($row = $resultLeverancier->fetch(PDO::FETCH_ASSOC))
    {
       echo  "<div class='item-list__item-row item-list__row--suppliers'>";
       echo    "<p>30 jan 2024</p>"; //MOET NOG AANGEPAST WORDEN
       echo    "<p>".$row["BedrijfsNaam"]."</p>";
       echo    "<p>".$row["Adres"]."</p>";
       echo    "<p>".$row["ContactspersoonNaam"]."</p>";
       echo    "<p>".$row["Email"]."</p>";
       echo    "<p>".$row["Telefoonnummer"]."</p>";
       echo    "<div class='item-list__edit-buttons-cell'>";
       echo      "<button class='item-list__edit-button'>Bewerken</button>";
       echo      "<button class='item-list__edit-button >Verwijderen</button>";
       echo    "</div>";
       echo  "</div>";
    }
}