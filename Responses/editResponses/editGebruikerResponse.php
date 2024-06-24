<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $voornaam = $_POST["Voornaam"]; //conferts form data to variables
    $achternaam = $_POST["Achternaam"];
    $phone = $_POST["TelefoonNummer"];
    $email = $_POST["Email"];
    $rol = $_POST["Rol"];

    try{
        require_once "../../Inclusions/dbh.inc.php"; //connects to database

        $sqlEditGebruiker = "UPDATE medewerker SET Voornaam = :voornaam, Achternaam = :achternaam, Rol = :rol, TelefoonNummer = :telefoonnummer, Email = :email WHERE Voornaam = :voornaam AND Achternaam = :achternaam OR Achternaam = :achternaam AND Rol = :rol";
        $editStmt = $pdo->prepare($sqlEditGebruiker);
        $editStmt->execute(['voornaam' => $voornaam, 'achternaam' => $achternaam, 'telefoonnummer' => $phone, 'email' => $email, 'rol' => $rol]);

        header("Location: ../../Gebruikers.php"); //sends user back
        exit();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../../Gebruikers.php"); //sends user back
}