<?php 
$pdo = dbConnect();

function dbConnect() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "VoedselbankMaaskantje";

    try {
        // create connection
        $dsn = "mysql:host=$servername;dbname=$dbname;port=3306";
        $pdo = new PDO($dsn, $username, $password);
        
        // set the PDO error mode to exception
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage() . "\n";
        return null;
    }
}

////////////////
// GEBRUIKERS //
////////////////
function dbAddMedewerker($voornaam, $achternaam, $rol, $telefoonnummer, $email, $wachtwoord) {
    global $pdo;

    $hashed_pw = password_hash($wachtwoord, 0);

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO Medewerker(Voornaam, Achternaam, Rol, TelefoonNummer, Email, Wachtwoord) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $voornaam);
    $stmt->bindParam(2, $achternaam);
    $stmt->bindParam(3, $rol);
    $stmt->bindParam(4, $telefoonnummer);
    $stmt->bindParam(5, $email);
    $stmt->bindParam(6, $hashed_pw);
    $stmt->execute();
}

function dbRemoveMedewerker($idMedewerker) {
    dbDelete("Medewerker", "idMedewerker", $idMedewerker);
}

function dbGetEmailMedewerker($email) {
    return dbSelectOne("Medewerker", "Email", $email);
}

function dbGetTelefoonNummerMedewerker($telefoonnummer) {
    return dbSelectOne("Medewerker", "TelefoonNummer", $telefoonnummer);
}

/////////////
// KLANTEN //
/////////////
function dbAddKlant($gezinsnaam, $telefoonnummer, $email, $adres, $postcode, $aantalVolwassenen, $aantalKinderen, $aantalBabys, $commentaar) {
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO Klant(GezinsNaam, TelefoonNummer, Email, Adres, Postcode, AantalVolwassenen, AantalKinderen, AantalBabys, Comentaar) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $gezinsnaam);
    $stmt->bindParam(2, $telefoonnummer);
    $stmt->bindParam(3, $email);
    $stmt->bindParam(4, $adres);
    $stmt->bindParam(5, $postcode);
    $stmt->bindParam(6, $aantalVolwassenen);
    $stmt->bindParam(7, $aantalKinderen);
    $stmt->bindParam(8, $aantalBabys);
    $stmt->bindParam(9, $commentaar);
    $stmt->execute();
}

function dbRemoveKlant($idKlant) {
    dbDelete("Klant", "idKlant", $idKlant);
}

function dbGetGezinsNaamKlant($gezinsNaam) {
    return dbSelectOne("Klant", "GezinsNaam", $gezinsNaam);
}

function dbGetTelefoonNummerKlant($telefoonnummer) {
    return dbSelectOne("Klant", "TelefoonNummer", $telefoonnummer);
}

function dbGetEmailKlant($email) {
    return dbSelectOne("Klant", "Email", $email);
}

function dbGetPostcodeKlant($postcode) {
    return dbSelectOne("Klant", "Postcode", $postcode);
}

//////////////////
// LEVERANCIERS //
//////////////////
function dbAddLeverancier($bedrijfsNaam, $adres, $postcode, $contactPersoonNaam, $email, $telefoonnummer) {
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO Leverancier(BedrijfsNaam, Adres, Postcode, ContactspersoonNaam, Email, TelefoonNummer) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $bedrijfsNaam);
    $stmt->bindParam(2, $adres);
    $stmt->bindParam(3, $postcode);
    $stmt->bindParam(4, $contactPersoonNaam);
    $stmt->bindParam(5, $email);
    $stmt->bindParam(6, $telefoonnummer);
    $stmt->execute();
}

function dbRemoveLeverancier($idLeverancier) {
    dbDelete("Leverancier", "idLeverancier", $idLeverancier);
}

function dbGetBedrijfsNaamLeverancier($bedrijfsNaam) {
    dbSelectOne("Leverancier", "BedrijfsNaam", $bedrijfsNaam);
}

function dbGetPostcodeLeverancier($postcode) {
    dbSelectOne("Leverancier", "Postcode", $postcode);
}

function dbGetContactsPersoonLeverancier($contactPersoonNaam) {
    dbSelectOne("Leverancier", "Contactspersoon", $contactPersoonNaam);
}

function dbGetEmailLeverancier($email) {
    dbSelectOne("Leverancier", "Email", $email);
}

function dbGetTelefoonNummerLeverancier($telefoonnummer) {
    dbSelectOne("Leverancier", "TelefoonNummer", $telefoonnummer);
}

//////////////
// VOORRAAD //
//////////////
function dbAddProduct($barcode, $naam, $idCategorie, $aantal) {
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO Product(Barcode, Naam, idCategorie, Aantal) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $barcode);
    $stmt->bindParam(2, $naam);
    $stmt->bindParam(3, $idCategorie);
    $stmt->bindParam(4, $aantal);
    $stmt->execute();
}

function dbRemoveProduct($idProduct) {
    dbDelete("Product", "idProduct", $idProduct);
}

function dbGetBarcodeProduct($barcode) {
    return dbSelectOne("Product", "Barcode", $barcode);
}

//////////////////////
// VOEDSELPAKKETTEN //
//////////////////////
function dbGetKlantVoedselPakketten($idKlant) {
    return dbSelect("VoedselPakket", "idKlant", $idKlant);
}

function dbAddVoedselPakket($idKlant, $uitgeefDatum) {
    global $pdo;
    $now = date('Y-m-d');

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO VoedselPakket(AanmaakDatum, UitgeefDatum, idKlant) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $now);
    $stmt->bindParam(2, $uitgeefDatum);
    $stmt->bindParam(3, $idKlant);
    $stmt->execute();
}

function dbRemoveVoedselPakket($idPakket) {
    dbDelete("VoedselPakket", "idVoedselPakket", $idPakket);
}

function dbVoedselPakketAddProduct($idPakket, $idProduct) {
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO VoedselPakket_has_Product(VoedselPakket_idVoedselPakket, Product_idProduct) VALUES (?, ?)");
    $stmt->bindParam(1, $idPakket);
    $stmt->bindParam(2, $idProduct);
    $stmt->execute();
}

function dbVoedselPakketRemoveProduct($idPakket, $idProduct) {
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("DELETE FROM voedselpakket_has_product WHERE VoedselPakket_idVoedselPakket = ? AND Product_idProduct = ?");
    $stmt->bindParam(1, $idPakket);
    $stmt->bindParam(2, $idProduct);
    $stmt->execute();
}

function dbGetVoedselPakketProducten($idPakket) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT product.* FROM voedselpakket_has_product INNER JOIN product ON product.idProduct = voedselpakket_has_product.Product_idProduct WHERE VoedselPakket_idVoedselPakket = ?");
    $stmt->bindParam(1, $idPakket);
    $stmt->execute();
    return $stmt->fetchAll();
}

/////////////////////////////////
// GENERIC DATABASE OPERATIONS //
/////////////////////////////////
function dbSelectOne($table, $key, $value) {
    $data = dbSelect($table, $key, $value);
    if(count($data) > 0) {
        return $data[0];
    }

    // Nothing was found, return null rather than error
    return null;
}

function dbSelect($table, $key, $value) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM " . $table . " WHERE " . $key . "= ?");
    $stmt->bindParam(1, $value);
    $stmt->execute();
    return $stmt->fetchAll();
}

function dbDelete($table, $key, $value) {
    global $pdo;

    $stmt = $pdo->prepare("DELETE FROM " . $table . " WHERE " . $key . "= ?");
    $stmt->bindParam(1, $value);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * This method generates a valid SQL UPDATE statement based on a simpler data structure, and executes it.
 * 
 * Example usage:
 * dbUpdate("Medewerkers", 1, [
 *     "Rol" => "Nieuwe rol",
 *     "TelefoonNummer" => 1234567890
 * ]);
 */
function dbUpdate($table, $id, $update) {
    global $pdo;

    // Begin SQL query
    // sql = "UPDATE [TABLE] SET"
    $sql = "UPDATE " . $table . " SET ";
    $keys = array_keys($update);
    
    // Add the keys we'll be updating to the query
    foreach($keys as $key) {
        // sql += "[KEY] = :[KEY]"
        $sql = $sql . $key . "=:" . $key . ",";
    }

    // Finish SQL query
    // sql += "WHERE id[TABLE] = [ID];
    $sql = rtrim($sql, ",");
    $sql = $sql . " WHERE id" . $table . "=" . $id . ";";

    // Now prepare the statement
    $stmt = $pdo->prepare($sql);
    foreach($keys as $key) {
        $param = ":" . $key;
        $value = $update[$key];
        $stmt->bindValue($param, $value);
    }

    // Execute the statement
    $stmt->execute();
}