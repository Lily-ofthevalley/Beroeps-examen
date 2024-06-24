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
    echo "<form action='Responses/editGebruikerResponse.php' method='POST'>
           <div class='item-list__item-row item-list__row--users'>
             <p class='field user-field--firstName'>" . $row["Voornaam"] . "</p>
             <p class='field user-field--lastName'>" . $row["Achternaam"] . "</p>
             <p class='field user-field--role'>" . $row["Rol"] . "</p>
             <p class='field user-field--phone'>" . $row["TelefoonNummer"] . "</p>
             <p class='field user-field--email'>" . $row["Email"] . "</p>
             <div class='item-list__buttons-cell'>
               <div class='item-list__buttons-cell--edit'>
                 <button class='item-list__button item-list__button--edit' type='button'>Bewerken</button>
                 <button class='item-list__button item-list__button--save hidden' type='submit'>Opslaan</button>
                 <button class='item-list__button item-list__button--delete' type='button'>Verwijderen</button>
               </div>
               <div class='item-list__buttons-cell--delete hidden'>
                 <p>Verwijderen?</p>
                 <button class='item-list__button item-list__button--cancel' type='button'>Nee</button>
                 <button class='item-list__button item-list__button--confirm' type='button' onclick='location.href=\'Responses/deleteResponses/deleteUserResponse.php?id=" . $row["idMedewerker"] . "\'>Ja</button>
               </div>
             </div>
           </div>
         </form>";
    }
}
