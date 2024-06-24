<?php
session_start();

if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "Magazijn medewerker"){
  header('location: Vooraad.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Product toevoegen - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
  <link rel="icon" type="image/x-icon" href="Images/favicon.ico" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <form class="form-container" action="Responses/addResponses/addProductResponse.php" method="POST">
      <h2 class="profile__password-header">Product toevoegen</h2>
      <div class="form">
        <label class="form__label" for="barcode">Barcode*</label>
        <input class="form__input" type="text" id="barcode" name="barcode" maxlength="45" required>

        <label class="form__label" for="name">Naam product*</label>
        <input class="form__input" type="text" id="name" name="name" maxlength="45" required>

        <label class="form__label" for="category">Categorie*</label>
        <select class="form__input" id="category" name="category" required>
          <option value="" hidden disabled selected>(Kies categorie)</option>
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

        <label class="form__label" for="quantity">Aantal*</label>
        <input class="form__input" type="number" id="quantity" name="quantity" min="0" maxlength="10" required>
      </div>
      <button class="form__submit" type="submit">Voeg toe</button>
    </form>
  </div>
</body>

</html>