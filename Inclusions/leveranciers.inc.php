<?php

require_once "dbh.inc.php"; //connects to the database

if(isset($_SESSION["sortingLeverancier"]["sort"])){
  $sort = $_SESSION["sortingLeverancier"]["sort"];
} else {
  $sort = "levering ASC";
}

try {
    $sqlLeverancier = "SELECT idLeverancier, Levering, BedrijfsNaam, Adres, Postcode, ContactspersoonNaam, Email, Telefoonnummer FROM leverancier ORDER BY $sort"; //Selects the product data
    $resultLeverancier = $pdo->query($sqlLeverancier);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultLeverancier->rowCount() > 0) { //goes through the data and place it in the right place
    while ($row = $resultLeverancier->fetch(PDO::FETCH_ASSOC)) {
        echo "<form action='Responses/editResponses/editLeverancierResponse.php' method='POST'>
           <div class='item-list__item-row item-list__row--suppliers'>
             <p class='field supplier-field--next'>" . $row["Levering"] . "</p>
             <p class='field supplier-field--company'>" . $row["BedrijfsNaam"] . "</p>
             <p class='field supplier-field--address'>" . $row["Adres"] . "</p>
             <p class='field supplier-field--postalCode'>" . $row["Postcode"] . "</p>
             <p class='field supplier-field--contact'>" . $row["ContactspersoonNaam"] . "</p>
             <p class='field supplier-field--email'>" . $row["Email"] . "</p>
             <p class='field supplier-field--phone'>" . $row["Telefoonnummer"] . "</p>
             <div class='item-list__buttons-cell'>
               <div class='item-list__buttons-cell--edit'>
                 <button class='item-list__button item-list__button--edit' type='button'>Bewerken</button>
                 <button class='item-list__button item-list__button--save hidden' type='submit'>Opslaan</button>
                 <button class='item-list__button item-list__button--delete' type='button'>Verwijderen</button>
               </div>
               <div class='item-list__buttons-cell--delete hidden'>
                 <p>Verwijderen?</p>
                 <button class='item-list__button item-list__button--cancel' type='button'>Nee</button>
                 <button class='item-list__button item-list__button--confirm' type='button' onclick='location.href=\"Responses/deleteResponses/deleteLeverancierResponse.php?id=" . $row["idLeverancier"] . "\"'>Ja</button>
               </div>
             </div>
           </div>
         </form>";
    }
}
