<?php
session_start();

if ($_SESSION["user"]["rol"] != "Administrator") {
  header('location: Vooraad.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Gebruikers - Voedselbank Maaskantje</title>
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
          <option value="firstNameA">Voornaam (A - Z)</option>
          <option value="firstNameZ">Voornaam (Z - A)</option>
          <option value="lastNameA">Achternaam (A - Z)</option>
          <option value="lastNameZ">Achternaam (Z - A)</option>
        </select>
      </div>
      <div class="sort-filter__item-container">
        <label class="form__label" for="filterRole">Filter (rol):</label>
        <select class="sort-filter-add sort-filter" id="filterRole" name="filterRole">
          <option value="">---</option>
          <option value="Administrator">Administrator</option>
          <option value="Magazijn medewerker">Magazijn medewerker</option>
          <option value="Vrijwilliger">Vrijwilliger</option>
        </select>
      </div>
      <button type="submit" class="sort-filter-add sort-filter-add--button">Zoek</button>
    </form>
    <div class="item-list">
      <!-- Column labels -->
      <div class="item-list__label-row item-list__row--users">
        <p>Voornaam</p>
        <p>Achternaam</p>
        <p>Rol</p>
        <p>Telefoon</p>
        <p>E-mail</p>
        <p class="item-list__final-column-width"></p>
      </div>
      <div class="item-list__items">
        <?php require_once "Inclusions/gebruiker.inc.php" ?>
      </div>
    </div>
    <div class="sort-filter-add__container">
      <a class="sort-filter-add sort-filter-add--button" href="./AddGebruiker.php">Voeg gebruiker toe</a>
    </div>
  </div>

  <script src='Javascript/edit.js'></script>
  <script src='Javascript/delete.js'></script>
</body>

</html>