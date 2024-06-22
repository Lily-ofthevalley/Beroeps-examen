<?php

require_once "dbh.inc.php";

$idVoedselPakket = $tempIdVoedselPakket;

try {
    $sql = "SELECT VoedselPakket_idVoedselPakket, Product_idProduct, Aantal FROM VoedselPakket_Has_Product WHERE VoedselPakket_idVoedselPakket = :idVoedselpakket";
    $Stmt = $pdo->prepare($sql);
    $Stmt->execute(['idVoedselpakket' => $idVoedselPakket]);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

try {
    $sqlProduct = "SELECT Naam FROM product WHERE idProduct = :idProduct"; //Selects the product data
    $stmtProduct = $pdo->prepare($sqlProduct);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

if ($Stmt->rowCount() > 0) {
    while ($row = $Stmt->fetch(PDO::FETCH_ASSOC)) {
        echo     "<p>" . $row['Aantal'] . "x</p>";
        $stmtProduct->execute([':idProduct' => $row['Product_idProduct']]); // Fetch klant name
        $productRow = $stmtProduct->fetch(PDO::FETCH_ASSOC);
        echo     "<p>" . $productRow['Naam'] . "</p>";
    }
} else {
    echo     "<p></p>";
    echo     "<p>No products found</p>";
}