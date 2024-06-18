<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $company = $_POST["company"]; //conferts form data to variables
    $address = $_POST["address"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    try{
        require_once "../Inclusions/dbh.inc.php"; //connects to database

        dbAddLeverancier($company, $address, "0", $contact, $email, $phone); // Call the function

        header("Location: ../Leveranciers.php"); //sends user back
        exit();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../AddLeverancierResponse.php"); //sends user back
}