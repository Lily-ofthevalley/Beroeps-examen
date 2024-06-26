<?php
session_start();

if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "Vrijwilliger") {
  header('location: Vooraad.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Klanten - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
  <link rel="icon" type="image/x-icon" href="Images/favicon.ico" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <form class="sort-filter-add__container">
      <div class="sort-filter__item-container">
        <label class="form__label" for="sort">Sorteer:</label>
        <select class="sort-filter-add sort-filter" id="sort" name="sort">
          <option value="new">Nieuw - Oud</option>
          <option value="old" selected>Oud - Nieuw</option>
          <option value="nameA">Naam (A - Z)</option>
          <option value="nameZ">Naam (Z - A)</option>
        </select>
      </div>
      <div class="sort-filter__item-container">
        <label class="form__label" for="filterWishes">Filter (wensen):</label>
        <select class="sort-filter-add sort-filter" id="filterWishes" name="filterWishes">
          <option value="">---</option>
          <option value="Geen varkensvlees">Geen varkensvlees</option>
          <option value="Vegetarisch">Vegetarisch</option>
          <option value="Veganistisch">Veganistisch</option>
        </select>
      </div>
      <button type="submit" class="sort-filter-add sort-filter-add--button">Zoek</button>
    </form>
    <div class="item-list">
      <!-- Column labels -->
      <div class="item-list__label-row item-list__row--customers">
        <p>Naam</p>
        <p>Telefoon</p>
        <p>E-mail</p>
        <p>Adres</p>
        <p>Postcode</p>
        <p>Gezinsamenstelling</p>
        <p>Wensen</p>
        <p>Allergiën</p>
        <p class="item-list__final-column-width"></p>
      </div>
      <div class="item-list__items">
        <?php require_once "Inclusions/klant.inc.php" ?>
      </div>
    </div>
    <div class="sort-filter-add__container">
      <a class="sort-filter-add sort-filter-add--button" href="./AddKlant.php">Voeg klant toe</a>
    </div>
  </div>

  <script src='Javascript/edit.js'></script>
  <script src='Javascript/delete.js'></script>
</body>

</html>