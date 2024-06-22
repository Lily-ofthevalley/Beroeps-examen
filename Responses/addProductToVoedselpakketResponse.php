<?php

require_once "../Inclusions/dbh.inc.php"; //connects to database

$idPakket = $_GET['id'];

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $aantal = $_POST["aantal"]; //conferts form data to variables
    $product = $_POST["product"];

    try{

        $sqlProduct = "SELECT idProduct FROM product WHERE Barcode = :barcode";
        $productStmt = $pdo->prepare($sqlProduct);
        $productStmt->execute(['barcode' => $product]);

        if ($productStmt->rowCount() > 0) { //goes through the data and place it in the right place
            while ($row = $productStmt->fetch(PDO::FETCH_ASSOC)) {
                $idProduct = $row["idProduct"];
            }
        }
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }

    try{

        $stmt = $pdo->prepare("INSERT INTO VoedselPakket_Has_Product(VoedselPakket_idVoedselPakket, Product_idProduct, Aantal) VALUES (?, ?, ?)");
        $stmt->bindParam(1, $idPakket);
        $stmt->bindParam(2, $idProduct);
        $stmt->bindParam(3, $aantal);
        $stmt->execute();

        header("Location: ../Voedselpakketten.php"); //sends user back
        exit();
    } catch (Exception $e) { //checks and gives errors
        header("Location: ../Voedselpakketten.php"); //sends user back
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../Voedselpakketten.php"); //sends user back
}