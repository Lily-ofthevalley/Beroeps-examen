<?php
session_start();

// if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "Vrijwilliger"){
//   header('location: Vooraad.php');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Klanten - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <div class="item-list">
      <!-- Column labels -->
      <div class="item-list__label-row item-list__row--customers">
        <p>Naam</p>
        <p>Adres</p>
        <p>Telefoon</p>
        <p>E-mail</p>
        <p>Gezinsamenstelling</p>
        <p>Wensen</p>
        <p>Allergiën</p>
        <p class="item-list__final-column-width"></p>
      </div>
      <div class="item-list__items">
        <?php require_once "Inclusions/klant.inc.php"?>
      </div>
    </div>
    <div class="add-link-container">
      <a class="add-link-button" href="./AddKlant.php">Voeg klant toe</a>
    </div>
  </div>
</body>

</html>