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

function dbVoedselPakketAddProduct($idKlant, $idProduct) {
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO VoedselPakket_has_Product(VoedselPakket_idVoedselPakket, Product_idProduct) VALUES (?, ?)");
    $stmt->bindParam(1, $idKlant);
    $stmt->bindParam(2, $idProduct);
    $stmt->execute();
}

dbAddKlant("Smit", 123456, "smit@gmail.com", "Smitstraat 3", "3232SM", 2, 1, 0, null);
dbAddProduct(6969, "Test Product", 1, 3);
dbAddVoedselPakket(1, date('Y-m-d'));
dbVoedselPakketAddProduct(1, 1);

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