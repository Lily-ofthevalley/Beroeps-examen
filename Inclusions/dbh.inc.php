<?php 
$pdo = connect();

function connect() {
    $servername = "localhost";
    $username = "root";
    $password = "password";
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

function addMedewerker($voornaam, $tussenvoegsels, $achternaam, $rol, $telefoonnummer, $email, $wachtwoord) {
    global $pdo;

    $hashed_pw = password_hash($wachtwoord, 0);

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO Medewerker(Voornaam, Tussenvoegsels, Achternaam, Rol, TelefoonNummer, Email, Wachtwoord) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bindParam(1, $voornaam);
    $stmt->bindParam(2, $tussenvoegsels);
    $stmt->bindParam(3, $achternaam);
    $stmt->bindParam(4, $rol);
    $stmt->bindParam(5, $telefoonnummer);
    $stmt->bindParam(6, $email);
    $stmt->bindParam(7, $hashed_pw);
    $stmt->execute();
}

function addKlant($gezinsnaam, $telefoonnummer, $email, $adres, $postcode, $aantalVolwassenen, $aantalKinderen, $aantalBabys, $commentaar) {
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

function addProduct($barcode, $naam, $idCategorie, $aantal) {
    global $pdo;

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO Product(Barcode, Naam, idCategorie, Aantal) VALUES (?, ?, ?, ?)");
    $stmt->bindParam(1, $barcode);
    $stmt->bindParam(2, $naam);
    $stmt->bindParam(3, $idCategorie);
    $stmt->bindParam(4, $aantal);
    $stmt->execute();
}

function addVoedselPakket($idKlant, $uitgeefDatum) {
    global $pdo;
    $now = date('Y-m-d');

    // Commit to database
    $stmt = $pdo->prepare("INSERT INTO VoedselPakket(AanmaakDatum, UitgeefDatum, idKlant) VALUES (?, ?, ?)");
    $stmt->bindParam(1, $now);
    $stmt->bindParam(2, $uitgeefDatum);
    $stmt->bindParam(3, $idKlant);
    $stmt->execute();
}
