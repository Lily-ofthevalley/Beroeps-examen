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
  <title>Voedselpakketen - Voedselbank Maaskantje</title>
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
          <option value="customerA">Klant (A - Z)</option>
          <option value="customerZ">Klant (Z - A)</option>
          <option value="creationEarly">Aanmaak (eerder - later)</option>
          <option value="creationLate">Aanmaak (later - eerder)</option>
          <option value="issueEarly">Afgifte (eerder - later)</option>
          <option value="issueLate">Afgifte (later - eerder)</option>
        </select>
      </div>
      <button type="submit" class="sort-filter-add sort-filter-add--button">Zoek</button>
    </form>
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
        <?php require_once "Inclusions/voedselpakket.inc.php" ?>
      </div>
    </div>
    <div class="sort-filter-add__container">
      <a class="sort-filter-add sort-filter-add--button" href="./AddVoedselpakket.php">Voeg voedselpakket toe</a>
    </div>
  </div>

  <script src='Javascript/delete.js'></script>
  <script src='Javascript/showMore.js'></script>
</body>

</html>