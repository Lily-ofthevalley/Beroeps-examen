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
        echo    "<p>" . $row["Voornaam"] . " " . $row["Achternaam"] . "</p>";
        echo    "<p>" . $row["Rol"] . "</p>";
        echo    "<p>" . $row["TelefoonNummer"] . "</p>";
        echo    "<p>" . $row["Email"] . "</p>";
        echo    "<div class='item-list__edit-buttons-cell'>";
        echo        "<button class='item-list__edit-button'>Bewerken</button>";
        echo        '<button class="item-list__edit-button" onclick="location.href=\'Responses/deleteUserResponse.php?id=' . $row['idMedewerker'] . '\'">Verwijderen</button>';
        echo    "</div>";
        echo  "</div>";
    }
}