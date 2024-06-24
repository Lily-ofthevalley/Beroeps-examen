<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $address = $_POST["address"];
    $postalCode = $_POST["postalCode"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $adults = $_POST["adults"];
    $children = $_POST["children"];
    $babies = $_POST["babies"];
    $wishes = $_POST["wishes"];
    $allergies = $_POST["allergies"];

    try {
        require_once "../../Inclusions/dbh.inc.php"; // Connects to the database

        // Prepare the SQL statement
        $sqlEditKlant = "UPDATE klant SET GezinsNaam = :naam, TelefoonNummer = :phone, Email = :mail, Adres = :adres, Postcode = :postcode, AantalVolwassenen = :volwassen, AantalKinderen = :kind, AantalBabys = :baby, Wensen = :wens, Allergiën = :allergie WHERE Adres = :adres OR TelefoonNummer = :phone";

        $editStmt = $pdo->prepare($sqlEditKlant);

        // Execute the statement with bound parameters
        $editStmt->execute(['naam' => $name,'phone' => $phone,'mail' => $email,'adres' => $address,'postcode' => $postalCode,'volwassen' => $adults,'kind' => $children,'baby' => $babies,'wens' => $wishes,'allergie' => $allergies]);

        // Redirect user back to Klanten.php
        header("Location: ../../Klanten.php");
        exit();
    } catch (Exception $e) {
        die("Query failed: " . $e->getMessage());
    }
} else {
    // Redirect user back to Klanten.php if not a POST request
    header("Location: ../../Klanten.php");
    exit();
}
?>
