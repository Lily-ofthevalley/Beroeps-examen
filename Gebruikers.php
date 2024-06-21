<?php
session_start();

if ($_SESSION["user"]["rol"] != "Administrator"){
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
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
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
    <div class="add-link-container">
      <a class="add-link-button" href="./AddGebruiker.php">Voeg gebruiker toe</a>
    </div>
  </div>

  <script src='Javascript/edit.js'></script>
</body>

</html>