<?php
session_start();

if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "Magazijn medewerker") {
  header('location: Vooraad.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Leveranciers - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
  <link rel="icon" type="image/x-icon" href="Images/favicon.ico" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <div class="item-list">
      <!-- Column labels -->
      <div class="item-list__label-row item-list__row--suppliers">
        <p>Volgende levering</p>
        <p>Bedrijf</p>
        <p>Adres</p>
        <p>Postcode</p>
        <p>Contactpersoon</p>
        <p>E-mail</p>
        <p>Telefoon</p>
        <p class="item-list__final-column-width"></p>
      </div>
      <div class="item-list__items">
        <?php require_once "Inclusions/leveranciers.inc.php" ?>
      </div>
    </div>
    <div class="add-link-container">
      <a class="add-link-button" href="./AddLeverancier.php">Voeg leverancier toe</a>
    </div>
  </div>

  <script src='Javascript/edit.js'></script>
  <script src='Javascript/delete.js'></script>
</body>

</html>