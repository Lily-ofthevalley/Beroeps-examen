<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $barcode = $_POST["barcode"]; //conferts form data to variables
    $name = $_POST["name"];
    $categorie = $_POST["category"];

    try{
        require_once "../Inclusions/dbh.inc.php"; //connects to database

        dbAddProduct($barcode, $name, $categorie, "0"); // Call the function

        header("Location: ../Vooraad.php"); //sends user back
        exit();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../AddProductResponse.php"); //sends user back
}