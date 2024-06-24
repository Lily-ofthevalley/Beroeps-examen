<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $voornaam = $_POST["Voornaam"]; //conferts form data to variables
    $achternaam = $_POST["Achternaam"];
    $rol = $_POST["Rol"];
    $telefoonnummer = $_POST["TelefoonNummer"];
    $email = $_POST["Email"];
    $wachtwoord = $_POST["Wachtwoord"];

    try{
        require_once "../../Inclusions/dbh.inc.php"; //connects to database

        dbAddMedewerker($voornaam, $achternaam, $rol, $telefoonnummer, $email, $wachtwoord); // Call the function

        header("Location: ../../Gebruikers.php"); //sends user back
        exit();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../../Gebruikers.php"); //sends user back
}