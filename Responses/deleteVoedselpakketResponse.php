<?php

require_once "../Inclusions/dbh.inc.php"; //connects to the database

if (isset($_GET['id'])) {
    $idVoedselpakketToDelete = $_GET['id'];
    $idVoedselpakket = $idVoedselpakketToDelete;

    try{
        dbRemoveVoedselPakket($idVoedselpakket);
    
        header("Location: ../Voedselpakketten.php"); //sends user back
    }catch (Exception $e) { //checks and gives errors
        header("Location: ../Voedselpakketten.php"); //sends user back
        die("Query failed". $e->getMessage());
    }
    header("Location: ../Voedselpakketten.php"); //sends user back
}