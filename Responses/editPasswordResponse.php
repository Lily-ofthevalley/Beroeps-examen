<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $wachtwoord = $_POST["name"]; //conferts form data to variables
    $idMedewerker = $_SESSION["user"]["id"];

    try{
        require_once "../Inclusions/dbh.inc.php"; //connects to database

        dbMedewerkerUpdateWachtwoord($idMedewerker, $wachtwoord); // Call the function

        header("Location: ../User.php"); //sends user back
        exit();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../User.php"); //sends user back
}