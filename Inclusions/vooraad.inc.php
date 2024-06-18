<?php

require_once "dbh.inc.php"; //connects to the database

try {
    $sqlProduct = "SELECT Barcode, Naam, idCategorie, Aantal FROM product"; //Selects the product data
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
    while ($row = $resultProduct->fetch(PDO::FETCH_ASSOC))
    {

    echo "<div class='item-list__item-row item-list__row--products'>";
    echo     "<p>".$row["Barcode"]."</p>";
    echo     "<p>".$row["Naam"]."</p>";
    $stmtCategorie->execute([':idCategorie' => $row['idCategorie']]); // Fetch category name based on product's category ID
    $categorieRow = $stmtCategorie->fetch(PDO::FETCH_ASSOC);
    echo     "<p>".$categorieRow["Naam"]."</p>";
    echo     "<p>".$row["Aantal"]."</p>";
    echo     "<div class='item-list__edit-buttons-cell'>";
    echo         "<button class='item-list__edit-button'>Bewerken</button>";
    echo         "<button class='item-list__edit-button'>Verwijderen</button>";
    echo     "</div>";
    echo "</div>";
    }
}