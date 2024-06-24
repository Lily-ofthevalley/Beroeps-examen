<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $name = $_POST["name"]; //conferts form data to variables
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $email = $_POST["email"];
    $postcode = $_POST["postalCode"];
    $adults = $_POST["adults"];
    $children = $_POST["children"];
    $babies = $_POST["babies"];
    $wishes = $_POST["wishes"];
    $allergies = $_POST["allergies"];

    try{
        require_once "../Inclusions/dbh.inc.php"; //connects to database

        dbAddKlant($name, $phone, $email, $address, $postcode, $adults, $children, $babies, $wishes, $allergies); // Call the function

        header("Location: ../Klanten.php"); //sends user back
        exit();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../AddKlantResponse.php"); //sends user back
}