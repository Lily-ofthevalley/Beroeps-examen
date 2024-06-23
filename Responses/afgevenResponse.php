<?php

require_once "../Inclusions/dbh.inc.php"; //connects to database

$idPakket = $_GET['id'];

try{
    $sql = "UPDATE voedselpakket SET UitgeefDatum = :datum WHERE idVoedselPakket = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['datum' => date('Y-m-d'), 'id' => $idPakket]);

    header("location: ../Voedselpakketten.php"); //sends user back
} catch (Exception $e) { //checks and gives errors
    header("location: ../Voedselpakketten.php"); //sends user back
    die("Query failed". $e->getMessage());
}