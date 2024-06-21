<?php
session_start();

if ($_SESSION["user"]["rol"] == "Vrijwilliger"){
    if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
        $barcode = $_POST["barcode"]; //conferts form data to variables
        $aantal = $_POST["quantity"];
    
        try{
            require_once "../Inclusions/dbh.inc.php"; //connects to database
    
            $sqlEditVooraad = "UPDATE product SET Aantal = :aantal WHERE Barcode = :barcode";
            $editStmt = $pdo->prepare($sqlEditVooraad);
            $editStmt->execute(['barcode' => $barcode, 'aantal' => $aantal]);
    
            header("Location: ../Vooraad.php"); //sends user back
            exit();
        } catch (Exception $e) { //checks and gives errors
            die("Query failed". $e->getMessage());
        }
    }
    
    else {
        header("location: ../Vooraad.php"); //sends user back
    }
  } else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
        $barcode = $_POST["barcode"]; //conferts form data to variables
        $naam = $_POST["name"];
        $idCategorie = $_POST["category"];
        $aantal = $_POST["quantity"];
    
        try{
            require_once "../Inclusions/dbh.inc.php"; //connects to database
    
            $sqlEditVooraad = "UPDATE product SET Barcode = :barcode, Naam = :naam, idCategorie = :idCategorie, Aantal = :aantal WHERE Barcode = :barcode OR Naam = :naam";
            $editStmt = $pdo->prepare($sqlEditVooraad);
            $editStmt->execute(['barcode' => $barcode, 'naam' => $naam, 'idCategorie' => $idCategorie, 'aantal' => $aantal]);
    
            header("Location: ../Vooraad.php"); //sends user back
            exit();
        } catch (Exception $e) { //checks and gives errors
            die("Query failed". $e->getMessage());
        }
    }
    
    else {
        header("location: ../Vooraad.php"); //sends user back
    }
  }
