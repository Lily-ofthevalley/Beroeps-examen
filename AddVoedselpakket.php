<?php
session_start();

if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "Vrijwilliger"){
  header('location: Vooraad.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Voedselpakket toevoegen - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <form class="form-container">
      <h2 class="profile__password-header">Voedselpakket toevoegen</h2>
      <div class="form">
        <label class="form__label" for="customer">Klant*</label>
        <select class="form__input" id="customer" name="customer" required>
          <option value="" hidden disabled selected>(Kies klant)</option>
          <option value="Stam">Stam</option>
          <option value="De Boer">De Boer</option>
          <option value="Barneveld">Barneveld</option>
        </select>

        <p>Producten kunnen worden toegevoegd in het voedselpakket overzicht nadat het pakket is aangemaakt.</p>
      </div>
      <button class="form__submit" type="submit">Voeg toe</button>
    </form>
  </div>
</body>

</html>