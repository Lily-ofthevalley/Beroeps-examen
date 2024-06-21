<?php
session_start();

// if ($_SESSION["user"]["rol"] != "Administrator"){
//   header('location: Vooraad.php');
// }
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
  <div class="addGebruikersContainer">
    <div id="terugNaarGebruikers">
      <a href="Gebruikers.php">
        < Terug</a>
    </div>
    <div class="addGebruikers">
      <form action="Responses/addGebruikerResponse.php" method="POST">
        <input type="text" name="Voornaam" value="" placeholder="Voornaam" maxlength="45" required><br>
        <input type="text" name="Achternaam" value="" placeholder="Achternaam" maxlength="90" required><br>

        <select name="Rol" required>
          <option value="" hidden disabled selected>Selecteer een optie</option>
          <option value="Administrator">Administrator</option>
          <option value="Magazijn medewerker">Magazijn medewerker</option>
          <option value="Vrijwilliger">Vrijwilliger</option>
        </select><br>

        <input type="text" name="TelefoonNummer" value="" placeholder="TelefoonNummer" maxlength="15" required><br>
        <input type="email" name="Email" value="" placeholder="Email" maxlength="45" required><br>

        <input type="text" name="Wachtwoord" value="" placeholder="Wachtwoord" maxlength="64" required><br>
        <input type="submit" name="submit" value="Voeg toe">
      </form>
    </div>
  </div>
</body>

</html>