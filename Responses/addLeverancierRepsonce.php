<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $company = $_POST["company"]; //conferts form data to variables
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];
    $levering = $_POST["next"];
    $postcode = $_POST["postalCode"];

    try{
        require_once "../Inclusions/dbh.inc.php"; //connects to database

        dbAddLeverancier($company, $address, $postcode, $contact, $email, $phone, $levering); // Call the function

        header("Location: ../Leveranciers.php"); //sends user back
        exit();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../AddLeverancierResponse.php"); //sends user back
}