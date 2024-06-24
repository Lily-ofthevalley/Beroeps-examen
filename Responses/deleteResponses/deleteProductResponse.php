<?php

require_once "../Inclusions/dbh.inc.php"; //connects to the database

if (isset($_GET['id'])) {
    $idProductToDelete = $_GET['id'];
    $idProduct = $idProductToDelete;

    try{
        dbRemoveProduct($idProduct);
    
        header("Location: ../Vooraad.php"); //sends user back
    }catch (Exception $e) { //checks and gives errors
        header("Location: ../Vooraad.php"); //sends user back
        die("Query failed". $e->getMessage());
    }
}