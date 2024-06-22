<?php
session_start();

if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "Vrijwilliger") {
    header('location: Vooraad.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voedselpakket toevoegen - Voedselbank Maaskantje</title>
    <link rel="stylesheet" href="Styles/Styles.css" />
</head>

<body>
    <header>
        <?php require_once "Inclusions/header.inc.php"; ?>
    </header>
    <div class="page-content">
        <form class="form-container" action="Responses/addVoedselpakketResponse.php" method="POST">
            <h2 class="profile__password-header">Voedselpakket toevoegen</h2>
            <div class="form">
                <label class="form__label" for="customer">Klant*</label>
                <select class="form__input" id="customer" name="customer" required>
                    <option value="" hidden disabled selected>(Kies klant)</option>
                    <?php require_once "Responses/customerListResponse.php"; ?>
                </select>
                <div class="form__package-content-container" id="output">
                    <!-- THIS IS WHERE THE ITEMS END UP -->
                </div>
                <!-- DOES NOT NEED TO BE SUBMITTED, just adds item to the list -->
                <label class="form__label" for="options">Vroeg product toe:</label>
                <select class="form__input" id="options" required>
                    <option value="disabled" hidden disabled selected>Selecteer een product</option>
                    <!-- Zet ID/Barcode (zolang het uniek is) van product in de value, en naam van het product als text. Lijst van producten moet uit database gehaald worden -->
                    <option value="1">Tomaat</option>
                    <option value="2">Snoep</option>
                </select>
                <button type="button" class="item-list__button" onclick="addOption()" formnovalidate>Voeg toe</button>
            </div>
            <!-- Wat je submit is een lijst van items (aantal items kan verschillen) met als id/name de barcode/id van het product. De values zijn de aantallen per product. -->
            <button class="form__submit" type="submit">Voeg toe</button>
        </form>
    </div>
    <script src='Javascript/package.js'></script>
</body>

</html>