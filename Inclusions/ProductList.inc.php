<?php
require_once "dbh.inc.php";

try {
    $sqlProduct = "SELECT Barcode, Naam FROM product WHERE Aantal > 0";
    $resultProduct = $pdo->query($sqlProduct);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultProduct->rowCount() > 0) {
    while ($row = $resultProduct->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . ($row["Barcode"]) . '">' . ($row["Naam"]) . '</option>';
    }
} else {
    echo '<option value="">No products found</option>';
}