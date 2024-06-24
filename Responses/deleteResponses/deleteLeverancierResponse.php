<?php

require_once "../Inclusions/dbh.inc.php"; //connects to the database

if (isset($_GET['id'])) {
    $idLeverancierToDelete = $_GET['id'];
    $idLeverancier = $idLeverancierToDelete;

    try{
        dbRemoveLeverancier($idLeverancier);
    
        header("Location: ../Leveranciers.php"); //sends user back
    }catch (Exception $e) { //checks and gives errors
        header("Location: ../Leveranciers.php"); //sends user back
        die("Query failed". $e->getMessage());
    }
    header("Location: ../Leveranciers.php"); //sends user back
}