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
  <title>Gebruiker toevoegen - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <form class="form-container" action="Responses/addGebruikerResponse.php" method="POST">
      <h2 class="profile__password-header">Gebruiker toevoegen</h2>
      <div class="form">
        <label class="form__label" for="Voornaam">Voornaam*</label>
        <input class="form__input" type="text" id="Voornaam" name="Voornaam" maxlength="45" required>

        <label class="form__label" for="Achternaam">Achternaam*</label>
        <input class="form__input" type="text" id="Achternaam" name="Achternaam" maxlength="90" required>

        <label class="form__label" for="Rol">Rol*</label>
        <select class="form__input" id="Rol" name="Rol" required>
          <option value="" hidden disabled selected>(Kies rol)</option>
          <option value="Administrator">Administrator</option>
          <option value="Magazijn medewerker">Magazijn medewerker</option>
          <option value="Vrijwilliger">Vrijwilliger</option>
        </select>

        <label class="form__label" for="TelefoonNummer">Telefoon*</label>
        <input class="form__input" type="number" id="TelefoonNummer" name="TelefoonNummer" maxlength="15" required>

        <label class="form__label" for="Email">E-mail*</label>
        <input class="form__input" type="email" id="Email" name="Email" maxlength="15" required>

        <label class="form__label" for="Wachtwoord">Wachtwoord*</label>
        <input class="form__input" type="text" id="Wachtwoord" name="Wachtwoord" maxlength="64" autocomplete="off" required>
      </div>
      <button class="form__submit" type="submit">Voeg toe</button>
    </form>
  </div>
</body>

</html>