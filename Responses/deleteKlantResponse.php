<?php

require_once "../Inclusions/dbh.inc.php"; //connects to the database

if (isset($_GET['id'])) {
    $idKlantToDelete = $_GET['id'];
    $idKlant = $idKlantToDelete;

    try{
        dbRemoveMedewerker($idKlant);
    
        header("Location: ../Klanten.php"); //sends user back
    }catch (Exception $e) { //checks and gives errors
        header("Location: ../Klanten.php"); //sends user back
        die("Query failed". $e->getMessage());
    }
    header("Location: ../Klanten.php"); //sends user back
}