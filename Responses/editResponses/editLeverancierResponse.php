<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") { //checks if the user got here legit
    $next = $_POST["next"]; //conferts form data to variables
    $company = $_POST["company"];
    $address = $_POST["address"];
    $postalCode = $_POST["postalCode"];
    $contact = $_POST["contact"];
    $email = $_POST["email"];
    $phone = $_POST["phone"];

    try{
        require_once "../../Inclusions/dbh.inc.php"; //connects to database

        $sqlEditLeverancier = "UPDATE leverancier SET BedrijfsNaam = :company, Adres = :addres, Postcode = :postalCode, ContactspersoonNaam = :contact, Email = :email,  TelefoonNummer = :phone,  Levering = :volgende WHERE BedrijfsNaam = :company OR TelefoonNummer = :phone";
        $editStmt = $pdo->prepare($sqlEditLeverancier);
        $editStmt->execute(['volgende' => $next, 'company' => $company, 'addres' => $address, 'postalCode' => $postalCode, 'contact' => $contact, 'email' => $email, 'phone' => $phone]);

        header("Location: ../../Leveranciers.php"); //sends user back
        exit();
    } catch (Exception $e) { //checks and gives errors
        die("Query failed". $e->getMessage());
    }
}

else {
    header("location: ../../Leveranciers.php"); //sends user back
}