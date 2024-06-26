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
  <link rel="icon" type="image/x-icon" href="Images/favicon.ico" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <form class="sort-filter-add__container" action="Vooraad.php" method="post">
      <div class="sort-filter__item-container">
        <label class="form__label" for="sort">Sorteer:</label>
        <select class="sort-filter-add sort-filter" id="sort" name="sort">
          <option value="idProduct DESC">Nieuw - Oud</option>
          <option value="idProduct ASC" selected>Oud - Nieuw</option>
          <option value="Barcode ASC">Barcode (laag - hoog)</option>
          <option value="Barcode DESC">Barcode (hoog - laag)</option>
          <option value="Naam ASC">Naam (A - Z)</option>
          <option value="Naam DESC">Naam (Z - A)</option>
          <option value="Aantal ASC">Aantal (laag - hoog)</option>
          <option value="Aantal DESC">Aantal (hoog - laag)</option>
        </select>
      </div>
      <div class="sort-filter__item-container">
        <label class="form__label" for="filterCategory">Filter (categorie):</label>
        <select class="sort-filter-add sort-filter" id="filterCategory" name="filterCategory">
          <option value="">---</option>
          <option value="1">Aardappelen, groente, fruit</option>
          <option value="2">Kaas, vleeswaren</option>
          <option value="3">Zuivel, plantaardig en eieren</option>
          <option value="4">Bakkerij en banket</option>
          <option value="5">Frisdrank, sappen, koffie en thee</option>
          <option value="6">Pasta, rijst en wereldkeuken</option>
          <option value="7">Soepen, sauzen, kruiden en olie</option>
          <option value="8">Snoep, koek, chips en chocolade</option>
          <option value="9">Baby, verzorging en hygiëne</option>
        </select>
      </div>
      <button type="submit" class="sort-filter-add sort-filter-add--button">Zoek</button>
    </form>

    <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $sort = $_POST["sort"];
          $filterCategory = $_POST["filterCategory"];

          try {
            if (!isset($_SESSION['sortingVooraad'])) {
                $_SESSION['sortingVooraad'] = array();
            }

            if (isset($_SESSION['sortingVooraad']['sort'])) {
                unset($_SESSION['sortingVooraad']['sort']);
            }
            if (isset($_SESSION['sortingVooraad']['filter'])) {
                unset($_SESSION['sortingVooraad']['filter']);
            }

            $_SESSION['sortingVooraad']['sort'] = $sort;
            $_SESSION['sortingVooraad']['filter'] = $filterCategory;
          } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
            }
          }
      ?>

    <div class="item-list">
      <!-- Column labels -->
      <div class="item-list__label-row item-list__row--products">
        <p>Barcode</p>
        <p>Naam</p>
        <p>Categorie</p>
        <p>Aantal</p>
        <p class="item-list__final-column-width"></p>
      </div>
      <div class="item-list__items">
        <?php require_once "Inclusions/vooraad.inc.php" ?>
      </div>
    </div>
    <div class="sort-filter-add__container">
      <a class="sort-filter-add sort-filter-add--button" href="./AddProduct.php">Voeg product toe</a>
    </div>
  </div>

  <script>
    const buttons = document.querySelectorAll('.item-list__button--delete--unavailable');
    buttons.forEach(function(button) {
      button.addEventListener('click', function() {
        window.alert("Deze actie is niet mogelijk omdat dit product in een voedselpakket is gebruikt.")
      })
    })
  </script>
  <?php
  if ($_SESSION["user"]["rol"] == "Vrijwilliger") {
    echo "<script src='Javascript/vrijwilligerVoorraadEdit.js'></script>";
  } else {
    echo "<script src='Javascript/edit.js'></script>";
  }
  ?>
  <script src='Javascript/delete.js'></script>
</body>

</html>