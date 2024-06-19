<?php
session_start();

// if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "Vrijwilliger"){
//   header('location: Vooraad.php');
// }
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Klant toevoegen - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <form class="form-container">
      <h2 class="profile__password-header">Klant toevoegen</h2>
      <div class="form">
        <label class="form__label" for="name">Naam*</label>
        <input class="form__input" type="text" id="name" name="name" maxlength="45" required>

        <label class="form__label" for="address">Adres*</label>
        <input class="form__input" type="text" id="address" name="address" maxlength="45" required>

        <label class="form__label" for="phone">Telefoon*</label>
        <input class="form__input" type="text" id="phone" name="phone" maxlength="15" required>

        <label class="form__label" for="email">E-mail*</label>
        <input class="form__input" type="email" id="email" name="email" maxlength="45" required>

        <fieldset class="form__fieldset form__fieldset--center">
          <legend class="form__label">Gezinsamenstelling</legend>

          <label class="form__label" for="adults">Volwassenen*</label>
          <input class="form__input" type="number" id="adults" name="adults" min="0" required>

          <label class="form__label" for="children">Kinderen*</label>
          <input class="form__input" type="number" id="children" name="children" min="0" required>

          <label class="form__label" for="babies">Baby's*</label>
          <input class="form__input" type="number" id="babies" name="babies" min="0" required>
        </fieldset>

        <label class="form__label" for="wishes">Wensen*</label>
        <select class="form__input" id="wishes" name="wishes" required>
          <option value="" selected>-</option>
          <option value="noPork">Geen varkensvlees</option>
          <option value="vegetarian">Vegetarisch</option>
          <option value="vegan">Veganistisch</option>
        </select>

        <fieldset class="form__fieldset">
          <legend class="form__label">Allergiën</legend>

          <div class="form__checkbox-container">
            <input type="checkbox" id="gluten" name="allergies" value="gluten">
            <label for="gluten">Gluten</label>
          </div>

          <div class="form__checkbox-container">
            <input type="checkbox" id="pindas" name="allergies" value="pindas">
            <label for="pindas">Pinda's</label>
          </div>

          <div class="form__checkbox-container">
            <input type="checkbox" id="shellfish" name="allergies" value="shellfish">
            <label for="shellfish">Schaaldieren</label>
          </div>

          <div class="form__checkbox-container">
            <input type="checkbox" id="hazelnuts" name="allergies" value="hazelnuts">
            <label for="hazelnuts">Hazelnoten</label>
          </div>

          <div class="form__checkbox-container">
            <input type="checkbox" id="lactose" name="allergies" value="lactose">
            <label for="lactose">Lactose</label>
          </div>

          <div class="form__checkbox-container">
            <input type="checkbox" id="customAllergyCheckbox" name="allergies" value="custom">
            <label for="customAllergyCheckbox">Anders:</label>
            <input class="form__input form__input--small" type="text" id="customAllergyInput" name="customAllergy" maxlength="45">
          </div>
        </fieldset>
      </div>
      <button class="form__submit" type="submit">Voeg toe</button>
    </form>
  </div>
</body>

</html>