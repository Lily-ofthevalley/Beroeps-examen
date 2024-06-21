<?php

require_once "dbh.inc.php"; //connects to the database

try {
    $sqlGebruiker = "SELECT idMedewerker, Voornaam, Achternaam, Rol, TelefoonNummer, Email FROM medewerker"; //Selects the employee data
    $resultGebruiker = $pdo->query($sqlGebruiker);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultGebruiker->rowCount() > 0) { //goes through the data and place it in the right place
    while ($row = $resultGebruiker->fetch(PDO::FETCH_ASSOC)) {
        echo  "<div class='item-list__item-row item-list__row--users'>";
        echo    "<p class='field user-field--firstName'>" . $row["Voornaam"] . "</p>";
        echo    "<p class='field user-field--lastName'>" . $row["Achternaam"] . "</p>";
        echo    "<p class='field user-field--role'>" . $row["Rol"] . "</p>";
        echo    "<p class='field user-field--phone'>" . $row["TelefoonNummer"] . "</p>";
        echo    "<p class='field user-field--email'>" . $row["Email"] . "</p>";
        echo    "<div class='item-list__edit-buttons-cell'>";
        echo         "<button class='item-list__edit-button item-list__edit-button--edit'>Bewerken</button>";
        echo         "<button class='item-list__edit-button item-list__edit-button--save hidden'>Opslaan</button>";
        echo         "<button class='item-list__edit-button item-list__edit-button--delete'>Verwijderen</button>";
        echo     "</div>";
        echo  "</div>";
    }
}
