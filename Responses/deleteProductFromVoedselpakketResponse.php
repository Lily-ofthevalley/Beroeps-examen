<?php

require_once "../Inclusions/dbh.inc.php"; //connects to the database

if (isset($_GET['id'])) {
    $idVoedselpakket = $_GET['id'];
    $productBarcode = $_POST['product'];

    try{

        $sql = "SELECT idProduct FROM product WHERE Barcode = :barcode";
        $result = $pdo ->prepare($sql);
        $result -> execute(['barcode' => $productBarcode]);

        if ($result->rowCount() > 0) { //goes through the data and place it in the right place
            while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                $productId = $row['idProduct'];
            }
        }

    }catch (Exception $e) { //checks and gives errors
        header("Location: ../Voedselpakketten.php"); //sends user back
        die("Query failed". $e->getMessage());
    }
    
    try{

        $sql = "DELETE FROM VoedselPakket_Has_Product WHERE Product_idProduct = :idProduct AND VoedselPakket_idVoedselPakket = :idPakket"; //removes all the connections the packet has
        $stmt = $pdo ->prepare($sql);
        $stmt -> execute(['idProduct' => $productId, 'idPakket' => $idVoedselpakket]);
    
        header("Location: ../Voedselpakketten.php"); //sends user back
    }catch (Exception $e) { //checks and gives errors
        header("Location: ../Voedselpakketten.php"); //sends user back
        die("Query failed". $e->getMessage());
    }
    header("Location: ../Voedselpakketten.php"); //sends user back
}