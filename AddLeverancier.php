<?php
session_start();

// if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "MagezijnMedewerker"){
//   header('location: Vooraad.php');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Leverancier toevoegen - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <form class="form-container">
      <div class="form">
        <label class="form__label" for="next">Volgende levering</label>
        <input class="form__input" type="date" id="next" name="next">

        <label class="form__label" for="company">Bedrijf*</label>
        <input class="form__input" type="text" id="company" name="company" required>

        <label class="form__label" for="address">Adres*</label>
        <input class="form__input" type="text" id="address" name="address" required>

        <label class="form__label" for="contact">Contactpersoon*</label>
        <input class="form__input" type="text" id="contact" name="contact" required>

        <label class="form__label" for="email">E-mail*</label>
        <input class="form__input" type="email" id="email" name="email" required>

        <label class="form__label" for="phone">Telefoon*</label>
        <input class="form__input" type="text" id="phone" name="phone" required>
      </div>
      <button class="form__submit" type="submit">Voeg toe</button>
    </form>
  </div>
</body>

</html>