<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $customer = $_POST["customer"]; //conferts form data to variables

    try{
        require_once "../Inclusions/dbh.inc.php"; //connects to database

        dbAddVoedselPakket($customer); // Call the function

        header("Location: ../Voedselpakketten.php"); //sends user back
        exit();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../Voedselpakketten.php"); //sends user back
}