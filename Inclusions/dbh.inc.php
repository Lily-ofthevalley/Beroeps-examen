<?php
$pdo = dbConnect();

function dbConnect()
{
    $servername = "localhost";
    $username = "root";
    $password = "root";
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

/////////////////
// MEDEWERKERS //
/////////////////

/**
 * Insert a new Medewerker into the database.
 */
function dbAddMedewerker($voornaam, $achternaam, $rol, $telefoonnummer, $email, $wachtwoord)
{
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

/**
 * Remove a Medewerker from the database by ID.
 */
function dbRemoveMedewerker($idMedewerker)
{
    dbDeleteById("Medewerker", "idMedewerker", $idMedewerker);
}

/**
 * Find a Medewerker in the database by their Email address.
 */
function dbGetMedewerkerByEmail($email)
{
    return dbSelectOne("Medewerker", "Email", $email);
}

/**
 * Find a Medewerker in the database by their Phone Number.
 */
function dbGetMedewerkerByTelefoonnummer($telefoonnummer)
{
    return dbSelectOne("Medewerker", "TelefoonNummer", $telefoonnummer);
}

/**
 * Update a Medewerker's password in the database.
 */
function dbMedewerkerUpdateWachtwoord($idMedewerker, $wachtwoord)
{
    $hashed_pw = password_hash($wachtwoord, 0);

    // Commit to database
    dbUpdateById("Medewerker", $idMedewerker, [
        "Wachtwoord" => $hashed_pw
    ]);
}

/**
 * Update a Medewerker's Email address in the database.
 */
function dbMedewerkerUpdateEmail($idMedewerker, $email)
{
    dbUpdateById("Medewerker", $idMedewerker, [
        "Email" => $email
    ]);
}

/**
 * Update a Medewerker's Phone number in the database.
 */
function dbMedewerkerUpdateTelefoonnummer($idMedewerker, $telefoonnummer)
{
    dbUpdateById("Medewerker", $idMedewerker, [
        "TelefoonNummer" => $telefoonnummer
    ]);
}

/**
 * Update a Medewerker's role in the database.
 */
function dbMedewerkerUpdateRol($idMedewerker, $rol)
{
    dbUpdateById("Medewerker", $idMedewerker, [
        "Rol" => $rol
    ]);
}

/////////////
// KLANTEN //
/////////////

/**
 * Insert a new Klant into the database.
 */
function dbAddKlant($gezinsnaam, $telefoonnummer, $email, $adres, $postcode, $aantalVolwassenen, $aantalKinderen, $aantalBabys, $commentaar)
{
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

/**
 * Remove a Klant from the database by ID.
 */
function dbRemoveKlant($idKlant)
{
    dbDeleteById("Klant", "idKlant", $idKlant);
}

/**
 * Find a Klant in the database by their Family Name.
 */
function dbGetKlantByGezinsNaam($gezinsNaam)
{
    return dbSelectOne("Klant", "GezinsNaam", $gezinsNaam);
}

/**
 * Find a Klant in the database by their Telefoon nummer.
 */
function dbGetKlantByTelefoonnummer($telefoonnummer)
{
    return dbSelectOne("Klant", "TelefoonNummer", $telefoonnummer);
}

/**
 * Find a Klant in the database by their Email address.
 */
function dbGetKlantByEmail($email)
{
    return dbSelectOne("Klant", "Email", $email);
}

/**
 * Find a Klant in the database by their Postcode.
 */
function dbGetKlantByPostcode($postcode)
{
    return dbSelectOne("Klant", "Postcode", $postcode);
}

//////////////////
// LEVERANCIERS //
//////////////////

/**
 * Insert a new Leverancier into the database.
 */
function dbAddLeverancier($bedrijfsNaam, $adres, $postcode, $contactPersoonNaam, $email, $telefoonnummer)
{
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

/**
 * Remove a Leverancier from the database by ID.
 */
function dbRemoveLeverancier($idLeverancier)
{
    dbDeleteById("Leverancier", "idLeverancier", $idLeverancier);
}

/**
 * Find a Leverancier in the database by their Company Name.
 */
function dbGetLeverancierByBedrijfsnaam($bedrijfsNaam)
{
    return dbSelectOne("Leverancier", "BedrijfsNaam", $bedrijfsNaam);
}

/**
 * Find a Leverancier in the database by their Postcode.
 */
function dbGetLeverancierByPostcode($postcode)
{
    return dbSelectOne("Leverancier", "Postcode", $postcode);
}

/**
 * Find a Leverancier in the database by their Representative's name.
 * (Representative = Contactspersoon)
 */
function dbGetLeverancierByContactspersoon($contactPersoonNaam)
{
    return dbSelectOne("Leverancier", "Contactspersoon", $contactPersoonNaam);
}

/**
 * Find a Leverancier in the database by their Email address.
 */
function dbGetLeverancierByEmail($email)
{
    return dbSelectOne("Leverancier", "Email", $email);
}

/**
 * Find a Leverancier in the database by their Phone number.
 */
function dbGetLeverancierByTelefoonnummer($telefoonnummer)
{
    return dbSelectOne("Leverancier", "TelefoonNummer", $telefoonnummer);
}

/**
 * Update a Leverancier's email address in the database.
 */
function dbLeverancierUpdateEmail($idLeverancier, $email)
{
    dbUpdateById("Leverancier", $idLeverancier, [
        "Email" => $email
    ]);
}

/**
 * Update a Leverancier's representative name in the database.
 * (Representative = contactspersoon)
 */
function dbLeverancierUpdateContactspersoon($idLeverancier, $contactPersoonNaam)
{
    dbUpdateById("Leverancier", $idLeverancier, [
        "ContactspersoonNaam" => $contactPersoonNaam
    ]);
}

/**
 * Update a Leverancier's phone number in the database.
 */
function dbLeverancierUpdateTelefoonnummer($idLeverancier, $telefoonnummer)
{
    dbUpdateById("Leverancier", $idLeverancier, [
        "TelefoonNummer" => $telefoonnummer
    ]);
}


////////////////
// LEVERINGEN //
////////////////

function dbAddLevering($leverDatum, $leverTijd)
{
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO Levering(LeveringsDatum, LeveringsTijd) VALUES (?, ?)");
    $stmt->bindParam(1, $leverDatum);
    $stmt->bindParam(2, $leverTijd);
    $stmt->execute();
}

function dbRemoveLevering($idLevering)
{
    dbDeleteById("Levering", "idLevering", $idLevering);
}

function dbLeveringAddProduct($idLevering, $idProduct, $aantal)
{
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO Product_has_Levering(Product_idProduct, Levering_idLevering, Aantal) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $idProduct);
    $stmt->bindParam(2, $idLevering);
    $stmt->bindParam(3, $aantal);
    $stmt->execute();
}

function dbLeveringRemoveProduct($idLevering, $idProduct)
{
    global $pdo;

    $stmt = $pdo->prepare("DELETE FROM Product_has_Levering WHERE Product_idProduct = ? AND Levering_idLevering = ?");
    $stmt->bindParam(1, $idProduct);
    $stmt->bindParam(2, $idLevering);
    $stmt->execute();
}

function dbLeveringSetProductAantal($idLevering, $idProduct, $aantal)
{
    global $pdo;

    $stmt = $pdo->prepare("UPDATE Product_has_Levering SET Aantal = ? WHERE Product_idProduct = ? AND Levering_idLevering = ?");
    $stmt->bindParam(1, $aantal);
    $stmt->bindParam(2, $idProduct);
    $stmt->bindParam(3, $idLevering);
    $stmt->execute();
}

//////////////
// VOORRAAD //
//////////////

/**
 * Insert a new Product into the database.
 */
function dbAddProduct($barcode, $naam, $idCategorie, $aantal)
{
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO Product(Barcode, Naam, idCategorie, Aantal) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $barcode);
    $stmt->bindParam(2, $naam);
    $stmt->bindParam(3, $idCategorie);
    $stmt->bindParam(4, $aantal);
    $stmt->execute();
}

/**
 * Remove a Product from the database by ID.
 */
function dbRemoveProduct($idProduct)
{
    dbDeleteById("Product", "idProduct", $idProduct);
}

/**
 * Find a Product in the database by its Barcode.
 */
function dbGetProductByBarcode($barcode)
{
    return dbSelectOne("Product", "Barcode", $barcode);
}

//////////////////////
// VOEDSELPAKKETTEN //
//////////////////////

/**
 * Insert a new Voedselpakket into the database.
 */
function dbAddVoedselPakket($idKlant, $uitgeefDatum)
{
    global $pdo;
    $now = date('Y-m-d');

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO VoedselPakket(AanmaakDatum, UitgeefDatum, idKlant) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $now);
    $stmt->bindParam(2, $uitgeefDatum);
    $stmt->bindParam(3, $idKlant);
    $stmt->execute();
}

/**
 * Remove a Voedselpakket from the database by ID.
 */
function dbRemoveVoedselPakket($idPakket)
{
    dbDeleteById("VoedselPakket", "idVoedselPakket", $idPakket);
}

/**
 * Find a Voedselpakket in the database by its Customer ID.
 */
function dbGetVoedselPakkettenByKlantId($idKlant)
{
    return dbSelect("VoedselPakket", "idKlant", $idKlant);
}

/**
 * Add a Product to a Voedselpakket in the database.
 */
function dbVoedselPakketAddProduct($idPakket, $idProduct)
{
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO VoedselPakket_has_Product(VoedselPakket_idVoedselPakket, Product_idProduct) VALUES (?, ?)");
    $stmt->bindParam(1, $idPakket);
    $stmt->bindParam(2, $idProduct);
    $stmt->execute();
}

/**
 * Remove a Product from a Voedselpakket in the database.
 */
function dbVoedselPakketRemoveProduct($idPakket, $idProduct)
{
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("DELETE FROM voedselpakket_has_product WHERE VoedselPakket_idVoedselPakket = ? AND Product_idProduct = ?");
    $stmt->bindParam(1, $idPakket);
    $stmt->bindParam(2, $idProduct);
    $stmt->execute();
}

/**
 * Find all Producten in a Voedselpakket in the database.
 */
function dbGetProductenByVoedselPakketId($idPakket)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT product.* FROM voedselpakket_has_product INNER JOIN product ON product.idProduct = voedselpakket_has_product.Product_idProduct WHERE VoedselPakket_idVoedselPakket = ?");
    $stmt->bindParam(1, $idPakket);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * Update a Product's stock in the database.
 */
function dbProductUpdateAantal($idProduct, $aantal)
{
    dbUpdateById("Product", $idProduct, [
        "Aantal" => $aantal
    ]);
}

/////////////////////////////////
// GENERIC DATABASE OPERATIONS //
/////////////////////////////////

/**
 * SELECT a single row from the database.
 */
function dbSelectOne($table, $key, $value)
{
    $data = dbSelect($table, $key, $value);
    if (count($data) > 0) {
        return $data[0];
    }

    // Nothing was found, return null rather than error
    return null;
}

/**
 * SELECT multiple rows from the database.
 */
function dbSelect($table, $key, $value)
{
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM " . $table . " WHERE " . $key . "= ?");
    $stmt->bindParam(1, $value);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * DELETE multiple rows from the database.
 */
function dbDeleteById($table, $key, $value)
{
    global $pdo;

    $stmt = $pdo->prepare("DELETE FROM " . $table . " WHERE " . $key . "= ?");
    $stmt->bindParam(1, $value);
    $stmt->execute();
    return $stmt->fetchAll();
}

/**
 * UPDATE a row in the database.
 * 
 * Example usage:
 * dbUpdateById("Medewerkers", 1, [
 *     "Rol" => "Nieuwe rol",
 *     "TelefoonNummer" => 1234567890
 * ]);
 */
function dbUpdateById($table, $id, $update)
{
    global $pdo;

    // Check for null values
    if ($table === null) {
        echo "dbUpdateById ERR: table cannot be null\n";
        return;
    }
    if ($id === null) {
        echo "dbUpdateById ERR: id cannot be null\n";
        return;
    }
    if ($update === null) {
        echo "dbUpdateById ERR: update cannot be null\n";
        return;
    }

    // Begin building SQL query
    $sql = "UPDATE " . $table . " SET ";
    $keys = array_keys($update);

    // Add the keys we'll be updating to the query
    foreach ($keys as $key) {
        // sql += "[KEY] = :[KEY]"
        $sql = $sql . $key . "=:" . $key . ",";
    }

    // Finish SQL query
    // sql += "WHERE id[TABLE] = [ID];
    $sql = rtrim($sql, ",");
    $sql = $sql . " WHERE id" . $table . "=" . $id . ";";

    // Now prepare a statement and map all of the values to the keys
    $stmt = $pdo->prepare($sql);
    foreach ($keys as $key) {
        $param = ":" . $key;
        $value = $update[$key];
        $stmt->bindValue($param, $value);
    }

    // Execute that statement
    $stmt->execute();
}
