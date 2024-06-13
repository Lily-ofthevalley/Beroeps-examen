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
  <title>Voedselpakketen - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <div class="item-list">
      <!-- Column labels -->
      <div class="item-list__label-row item-list__row--packages">
        <p>ID</p>
        <p>Klant</p>
        <p>Aanmaak</p>
        <p>Afgifte</p>
        <p>Producten</p>
        <p class="item-list__final-column-width"></p>
      </div>
      <div class="item-list__items">
        <div class="item-list__item-row item-list__row--packages">
          <p>0</p>
          <p>Stam</p>
          <p>7 jun 2024</p>
          <p>-</p>
          <div class="item-list__grid">
            <p>4x</p>
            <p>Tomaat</p>
            <p>2x</p>
            <p>Grote tomaat</p>
            <p>1x</p>
            <p>Nog grotere tomaat</p>
          </div>
          <div class="item-list__edit-buttons-cell">
            <button class="item-list__edit-button">Bewerken</button>
            <button class="item-list__edit-button">Verwijderen</button>
            <button class="item-list__edit-button">Afgeven</button>
          </div>
        </div>
      </div>
    </div>
    <div class="add-link-container">
      <a class="add-link-button" href="./AddVoedselpakket.php">Voeg voedselpakket toe</a>
    </div>
  </div>
</body>

</html>