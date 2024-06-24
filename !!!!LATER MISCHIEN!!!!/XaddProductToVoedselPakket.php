<?php
session_start();

if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "Vrijwilliger") {
    header('location: Vooraad.php');
    exit();
}

$idPakket = $_GET['id'];
$id = $idPakket;
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
        <form class="form-container" action="Responses/addProductToVoedselpakketResponse.php?id=<?php echo $id; ?>" method="POST">
            <h2 class="profile__password-header">Voedselpakket toevoegen</h2>
            <div class="form">
                <div class="form__package-content-container" id="output">
                    <!-- THIS IS WHERE THE ITEMS END UP -->
                </div>
                <!-- DOES NOT NEED TO BE SUBMITTED, just adds item to the list -->
                <label class="form__label" for="options">Voeg product toe:</label>
                <select class="form__input" id="options" name="product" required>
                    <option value="disabled" hidden disabled selected>Selecteer een product</option>
                    <!-- Zet ID/Barcode (zolang het uniek is) van product in de value, en naam van het product als text. Lijst van producten moet uit database gehaald worden -->
                    <?php require_once "Inclusions/ProductList.inc.php"; ?>
                </select>
                <button type="button" class="item-list__button" onclick="addOption()" formnovalidate>Voeg toe</button>
            </div>
            <button class="form__submit" type="submit">Voeg toe</button>
        </form>
    </div>
    <script src='Javascript/package.js'></script>
</body>

</html>