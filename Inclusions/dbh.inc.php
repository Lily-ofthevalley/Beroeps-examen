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
