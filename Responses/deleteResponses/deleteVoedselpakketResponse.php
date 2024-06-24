<?php

require_once "../../Inclusions/dbh.inc.php"; //connects to the database

if (isset($_GET['id'])) {
    $idVoedselpakketToDelete = $_GET['id'];

    try{

        $sql = "DELETE FROM VoedselPakket_Has_Product WHERE VoedselPakket_idVoedselPakket = ?"; //removes all the connections the packet has
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute([$idVoedselpakketToDelete]);

        dbRemoveVoedselPakket($idVoedselpakketToDelete);
    
        header("Location: ../../Voedselpakketten.php"); //sends user back
    }catch (Exception $e) { //checks and gives errors
        header("Location: ../../Voedselpakketten.php"); //sends user back
        die("Query failed". $e->getMessage());
    }
    header("Location: ../../Voedselpakketten.php"); //sends user back
}