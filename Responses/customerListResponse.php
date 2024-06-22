<?php
require_once "Inclusions/dbh.inc.php";

try {
    $sqlKlant = "SELECT idKlant, GezinsNaam FROM klant";
    $resultKlant = $pdo->query($sqlKlant);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultKlant->rowCount() > 0) {
    while ($row = $resultKlant->fetch(PDO::FETCH_ASSOC)) {
        echo '<option value="' . ($row["idKlant"]) . '">' . ($row["GezinsNaam"]) . '</option>';
    }
} else {
    echo '<option value="">No customers found</option>';
}
