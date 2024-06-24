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
  <title>Leverancier toevoegen - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
  <link rel="icon" type="image/x-icon" href="Images/favicon.ico" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <form class="form-container" action="Responses/addResponses/addLeverancierRepsonce.php" method="POST">
      <h2 class="profile__password-header">Leverancier toevoegen</h2>
      <div class="form">
        <label class="form__label" for="next">Volgende levering</label>
        <input class="form__input" type="date" id="next" name="next">

        <label class="form__label" for="company">Bedrijf*</label>
        <input class="form__input" type="text" id="company" name="company" maxlength="45" required>

        <label class="form__label" for="address">Adres*</label>
        <input class="form__input" type="text" id="address" name="address" maxlength="45" required>

        <label class="form__label" for="postalCode">Postcode*</label>
        <input class="form__input" type="text" id="postalCode" name="postalCode" maxlength="6" required>

        <label class="form__label" for="contact">Contactpersoon*</label>
        <input class="form__input" type="text" id="contact" name="contact" maxlength="45" required>

        <label class="form__label" for="email">E-mail*</label>
        <input class="form__input" type="email" id="email" name="email" maxlength="45" required>

        <label class="form__label" for="phone">Telefoon*</label>
        <input class="form__input" type="text" id="phone" name="phone" maxlength="15" required>
      </div>
      <button class="form__submit" type="submit">Voeg toe</button>
    </form>
  </div>
</body>

</html>