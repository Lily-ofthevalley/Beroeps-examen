<?php

require_once "dbh.inc.php"; //connects to the database

try {
    $sqlVoedselpakket = "SELECT idVoedselPakket, AanmaakDatum, UitgeefDatum, idKlant FROM voedselpakket"; //Selects the voedselpakket data
    $resultVoedselpakket = $pdo->query($sqlVoedselpakket);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

try {
    $sqlKlant = "SELECT GezinsNaam FROM klant WHERE idKlant = :idKlant"; //Selects the kalnt data
    $stmtKlant = $pdo->prepare($sqlKlant);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultVoedselpakket->rowCount() > 0) { //goes through the data and place it in the right place
    while ($row = $resultVoedselpakket->fetch(PDO::FETCH_ASSOC)) {
        $tempIdVoedselPakket = $row["idVoedselPakket"];

    echo "<div class='item-list__item-row item-list__row--packages'>
           <p class='field'>" . $tempIdVoedselPakket . "</p>";
        $stmtKlant->execute([':idKlant' => $row['idKlant']]); // Fetch klant name
        $klantRow = $stmtKlant->fetch(PDO::FETCH_ASSOC);
        $uitgeefdatumt = $row["UitgeefDatum"];
    echo   "<p class='field'>" . $klantRow["GezinsNaam"] . "</p>
           <p class='field'>" . $row["AanmaakDatum"] . "</p>
           <p class='field'>$uitgeefdatumt</p>
           <div class='item-list__grid-container'>
             <div class='item-list__grid item-list__grid--max-height'>"; //WORDT VERANDERT MET PRODUCTEN
                 $tempIdVoedselPakket = $row["idVoedselPakket"]; 
        include "Inclusions/productInVoedselpakket.inc.php"; 
    echo     "</div>
             <button class='item-list__button item-list__button--show-more' type='button' onclick='showMore(this)'>\/</button>
             <button class='item-list__button item-list__button--show-less hidden' type='button' onclick='showLess(this)'>/\</button>
           </div>
           <div class='item-list__buttons-cell'>
             <div class='item-list__buttons-cell--edit'>";
        if (empty($uitgeefdatumt)){
    echo       '<button class="item-list__button item-list__button--issue" type="button" onclick="location.href=\'Responses/afgevenResponse.php?id=' . $tempIdVoedselPakket . '\'">Afgeven</button>
               <button class="item-list__button item-list__button--edit" type="button" onclick="location.href=\'addProductToVoedselpakket.php?id=' . $tempIdVoedselPakket . '\'">Add Product</button>
               <button class="item-list__button item-list__button--edit" type="button" onclick="location.href=\'deleteProductFromVoedselpakket.php?id=' . $tempIdVoedselPakket . '\'">Delete product</button>';
        } else {
        }
    echo       "<button class='item-list__button item-list__button--save hidden' type='submit'>Opslaan</button>
               <button class='item-list__button item-list__button--delete' type='button'>Verwijderen</button>
             </div>
             <div class='item-list__buttons-cell--delete hidden'>
             <p>Verwijderen?</p>
               <button class='item-list__button item-list__button--cancel' type='button'>Nee</button>
                 <button class='item-list__button item-list__button--confirm' type='button' onclick='location.href=\"Responses/deleteResponses/deleteVoedselpakketResponse.php?id=" . $tempIdVoedselPakket . "\"'>Ja</button>
             </div>
           </div>
         </div>";
    }
}
