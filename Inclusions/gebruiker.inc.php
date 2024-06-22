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
        echo "<form action='Responses/editGebruikerResponse.php' method='POST'>";
        echo   "<div class='item-list__item-row item-list__row--users'>";
        echo     "<p class='field user-field--firstName'>" . $row["Voornaam"] . "</p>";
        echo     "<p class='field user-field--lastName'>" . $row["Achternaam"] . "</p>";
        echo     "<p class='field user-field--role'>" . $row["Rol"] . "</p>";
        echo     "<p class='field user-field--phone'>" . $row["TelefoonNummer"] . "</p>";
        echo     "<p class='field user-field--email'>" . $row["Email"] . "</p>";
        echo     "<div class='item-list__buttons-cell'>";
        echo       "<div class='item-list__buttons-cell--edit'>";
        echo         "<button class='item-list__button item-list__button--edit' type='button'>Bewerken</button>";
        echo         "<button class='item-list__button item-list__button--save hidden' type='submit'>Opslaan</button>";
        echo         "<button class='item-list__button item-list__button--delete' type='button'>Verwijderen</button>";
        echo       "</div>";
        echo       "<div class='item-list__buttons-cell--delete hidden'>";
        echo         "<p>Verwijderen?</p>";
        echo         "<button class='item-list__button item-list__button--cancel' type='button'>Nee</button>";
        echo         '<button class="item-list__button item-list__button--confirm" type="button" onclick="location.href=\'Responses/deleteUserResponse.php?id=' . $row['idMedewerker'] . '\'">Ja</button>';
        echo       "</div>";
        echo     "</div>";
        echo   "</div>";
        echo "</form>";
    }
}
