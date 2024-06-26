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
    <form class="sort-filter-add__container" action="Leveranciers.php" method="post">
      <div class="sort-filter__item-container">
        <label class="form__label" for="sort">Sorteer:</label>
        <select class="sort-filter-add sort-filter" id="sort" name="sort">
          <option value="idLeverancier DESC">Nieuw - Oud</option>
          <option value="idLeverancier ASC" selected>Oud - Nieuw</option>
          <option value="Levering ASC">Levering (eerder - later)</option>
          <option value="Levering DESC">Levering (later - eerder)</option>
          <option value="BedrijfsNaam ASC">Bedrijf (A - Z)</option>
          <option value="BedrijfsNaam DESC">Bedrijf (Z - A)</option>
        </select>
      </div>
      <button type="submit" class="sort-filter-add sort-filter-add--button">Zoek</button>
    </form>

    <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
          $sort = $_POST["sort"];

          try {
            if (!isset($_SESSION['sortingLeverancier'])) {
                $_SESSION['sortingLeverancier'] = array();
            }

            if (isset($_SESSION['sortingLeverancier']['sort'])) {
                unset($_SESSION['sortingLeverancier']['sort']);
            }

            $_SESSION['sortingLeverancier']['sort'] = $sort;
          } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            die();
            }
          }
      ?>

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
    <div class="sort-filter-add__container">
      <a class="sort-filter-add sort-filter-add--button" href="./AddLeverancier.php">Voeg leverancier toe</a>
    </div>
  </div>

  <script src='Javascript/edit.js'></script>
  <script src='Javascript/delete.js'></script>
</body>

</html>