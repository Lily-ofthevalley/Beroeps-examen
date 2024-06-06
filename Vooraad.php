<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Voorraad - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <div class="item-list">
      <!-- Column labels -->
      <div class="item-list__label-row">
        <p>Barcode</p>
        <p>Naam</p>
        <p>Categorie</p>
        <p>Aantal</p>
        <p class="item-list__final-column-width"></p>
      </div>
      <div class="item-list__items">
        <div class="item-list__item-row">
          <p>123456789012345</p>
          <p>Tomaat</p>
          <p>Aardappelen, groente, fruit</p>
          <p>37</p>
          <div class="item-list__edit-buttons-cell item-list__final-column-width">
            <button class="item-list__edit-button">Bewerken</button>
            <button class="item-list__edit-button">Verwijderen</button>
          </div>
        </div>
        <div class="item-list__item-row">
          <p>123456789012345</p>
          <p>Tomaat</p>
          <p>Aardappelen, groente, fruit</p>
          <p>37</p>
          <div class="item-list__edit-buttons-cell item-list__final-column-width">
            <button class="item-list__edit-button">Bewerken</button>
            <button class="item-list__edit-button">Verwijderen</button>
          </div>
        </div>
        <div class="item-list__item-row">
          <p>123456789012345</p>
          <p>Tomaat</p>
          <p>Aardappelen, groente, fruit</p>
          <p>37</p>
          <div class="item-list__edit-buttons-cell item-list__final-column-width">
            <button class="item-list__edit-button">Bewerken</button>
            <button class="item-list__edit-button">Verwijderen</button>
          </div>
        </div>
        <div class="item-list__item-row">
          <p>123456789012345</p>
          <p>Tomaat</p>
          <p>Aardappelen, groente, fruit</p>
          <p>37</p>
          <div class="item-list__edit-buttons-cell item-list__final-column-width">
            <button class="item-list__edit-button">Bewerken</button>
            <button class="item-list__edit-button">Verwijderen</button>
          </div>
        </div>
      </div>
    </div>
    <div class="add-product-container">
      <a class="add-product-button" href="./AddProduct.php">Voeg product toe</a>
    </div>
  </div>
  <script>
    const buttons = document.querySelectorAll('.item-list__edit-button--unavailable');
    buttons.forEach(function(button) {
      button.addEventListener('click', function() {
        window.alert("Deze actie is niet mogelijk omdat dit product in een voedselpakket is gebruikt.")
      })
    })
  </script>
</body>

</html>