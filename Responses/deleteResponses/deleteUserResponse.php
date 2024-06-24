<?php

require_once "../../Inclusions/dbh.inc.php"; //connects to the database

if (isset($_GET['id'])) {
    $idMedewerkerToDelete = $_GET['id'];
    $idMedewerker = $idMedewerkerToDelete;

    try{
        dbRemoveMedewerker($idMedewerker);
    
        header("Location: ../../Gebruikers.php"); //sends user back
    }catch (Exception $e) { //checks and gives errors
        header("Location: ../../Gebruikers.php"); //sends user back
        die("Query failed". $e->getMessage());
    }
    header("Location: ../../Gebruikers.php"); //sends user back
}