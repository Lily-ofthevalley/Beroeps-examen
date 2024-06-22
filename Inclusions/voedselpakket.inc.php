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
        echo "<div class='item-list__item-row item-list__row--packages'>";
        echo   "<p class='field'>" . $row["idVoedselPakket"] . "</p>";
        $stmtKlant->execute([':idKlant' => $row['idKlant']]); // Fetch klant name
        $klantRow = $stmtKlant->fetch(PDO::FETCH_ASSOC);
        echo   "<p class='field'>" . $klantRow["GezinsNaam"] . "</p>";
        echo   "<p class='field'>" . $row["AanmaakDatum"] . "</p>";
        echo   "<p class='field'>" . $row["UitgeefDatum"] . "</p>";
        echo   "<div class='item-list__grid'>"; //WORDT VERANDERT MET PRODUCTEN
        echo     "<p>4x</p>";
        echo     "<p>Tomaat</p>";
        echo     "<p>2x</p>";
        echo     "<p>Grote tomaat</p>";
        echo     "<p>1x</p>";
        echo     "<p>Nog grotere tomaat</p>";
        echo   "</div>";
        echo   "<div class='item-list__buttons-cell'>";
        echo     "<div class='item-list__buttons-cell--edit'>";
        echo       "<button class='item-list__button' type='button'>Afgeven</button>";
        echo       "<a href='AddVoedselpakket.php'><button class='item-list__button item-list__button--edit' type='button'>Bewerken</button></a>";
        echo       "<button class='item-list__button item-list__button--save hidden' type='submit'>Opslaan</button>";
        echo       "<button class='item-list__button item-list__button--delete' type='button'>Verwijderen</button>";
        echo     "</div>";
        echo     "<div class='item-list__buttons-cell--delete hidden'>";
        echo     "<p>Verwijderen?</p>";
        echo       "<button class='item-list__button item-list__button--cancel' type='button'>Nee</button>";
        echo         '<button class="item-list__button item-list__button--confirm" type="button" onclick="location.href=\'Responses/deleteVoedselpakketResponse.php?id=' . $row['idVoedselPakket'] . '\'">Ja</button>';
        echo     "</div>";
        echo   "</div>";
        echo "</div>";
    }
}
