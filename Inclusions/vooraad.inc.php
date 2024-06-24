<?php

require_once "dbh.inc.php"; //connects to the database

try {
    $sqlProduct = "SELECT idProduct, Barcode, Naam, idCategorie, Aantal FROM product"; //Selects the product data
    $resultProduct = $pdo->query($sqlProduct);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

try {
    $sqlCategorie = "SELECT Naam FROM categorie WHERE idCategorie = :idCategorie"; //Selects the Categorie data
    $stmtCategorie = $pdo->prepare($sqlCategorie);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultProduct->rowCount() > 0) { //goes through the data and place it in the right place
    while ($row = $resultProduct->fetch(PDO::FETCH_ASSOC)) {

    echo "<form action='Responses/editResponses/editVooraadResponse.php' method='POST'>
           <div class='item-list__item-row item-list__row--products'>
             <p class='field product-field--barcode'>" . $row["Barcode"] . "</p>
             <p class='field product-field--name'>" . $row["Naam"] . "</p>";
        $stmtCategorie->execute([':idCategorie' => $row['idCategorie']]); // Fetch category name based on product's category ID
        $categorieRow = $stmtCategorie->fetch(PDO::FETCH_ASSOC);
    echo     "<p class='field product-field--category'>" . $categorieRow["Naam"] . "</p>
             <p class='field product-field--quantity'>" . $row["Aantal"] . "</p>
             <div class='item-list__buttons-cell'>
               <div class='item-list__buttons-cell--edit'>
                 <button class='item-list__button item-list__button--edit' type='button'>Bewerken</button>
                 <button class='item-list__button item-list__button--save hidden' type='submit'>Opslaan</button>
                 <button class='item-list__button item-list__button--delete' type='button'>Verwijderen</button>
               </div>
               <div class='item-list__buttons-cell--delete hidden'>
                 <p>Verwijderen?</p>
                 <button class='item-list__button item-list__button--cancel' type='button'>Nee</button>
                 <button class='item-list__button item-list__button--confirm' type='button' onclick='location.href=\"Responses/deleteResponses/deleteProductResponse.php?id=" . $row["idProduct"] . "\"'>Ja</button>
               </div>
             </div>
           </div>
         </form>";
    }
}
