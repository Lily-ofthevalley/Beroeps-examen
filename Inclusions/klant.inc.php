<?php

require_once "dbh.inc.php"; //connects to the database

if(isset($_SESSION["sortingKlant"]["sort"])){
  $sort = $_SESSION["sortingKlant"]["sort"];
} else {
  $sort = "idKlant ASC";
}

if (isset($_SESSION['sortingKlant']['filter']) && $_SESSION['sortingKlant']['filter'] != "") {
  $filter = "WHERE Wensen = '" . $_SESSION['sortingKlant']['filter'] . "'";
} else {
  $filter = "";
}

try {
    $sqlKlant = "SELECT idKlant, GezinsNaam, TelefoonNummer, Email, Adres, Postcode, AantalVolwassenen, AantalKinderen, Aantalbabys, Wensen, Allergiën FROM klant $filter ORDER BY $sort"; //Selects the customers data
    $resultKlant = $pdo->query($sqlKlant);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultKlant->rowCount() > 0) { //goes through the data and place it in the right place
    while ($row = $resultKlant->fetch(PDO::FETCH_ASSOC)) {
    echo "<form action='Responses/editResponses/editKlantResponse.php' method='POST'>
         <div class='item-list__item-row item-list__row--customers'>
           <p class='field customer-field--name'>" . $row["GezinsNaam"] . "</p>
           <p class='field customer-field--phone'>" . $row["TelefoonNummer"] . "</p>
           <p class='field customer-field--email'>" . $row["Email"] . "</p>
           <p class='field customer-field--address'>" . $row["Adres"] . "</p>
           <p class='field customer-field--postalCode'>" . $row["Postcode"] . "</p>
           <div class='field customer-field--members'>
             <p>" . $row["AantalVolwassenen"] . "</p>
             <p>" . " Volwassenen, " . "</p>
             <p>" . $row["AantalKinderen"] . "</p>
             <p>" . " Kinderen, " . "</p>
             <p>" . $row["Aantalbabys"] . "</p>
             <p>" . " Baby's" . "</p>
           </div>
           <p class='field customer-field--wishes'>" . $row["Wensen"] . "</p>
           <p class='field customer-field--allergies'>" . $row["Allergiën"] . "</p>
           <div class='item-list__buttons-cell'>
             <div class='item-list__buttons-cell--edit'>
               <button class='item-list__button item-list__button--edit' type='button'>Bewerken</button>
               <button class='item-list__button item-list__button--save hidden' type='submit'>Opslaan</button>
               <button class='item-list__button item-list__button--delete' type='button'>Verwijderen</button>
             </div>
             <div class='item-list__buttons-cell--delete hidden'>
               <p>Verwijderen?</p>
               <button class='item-list__button item-list__button--cancel' type='button'>Nee</button>
               <button class='item-list__button item-list__button--confirm' type='button' onclick='location.href=\"Responses/deleteResponses/deleteKlantResponse.php?id=" . $row["idKlant"] . "\"'>Ja</button>
             </div>
           </div>
         </div>
         </form>";
    }
}
