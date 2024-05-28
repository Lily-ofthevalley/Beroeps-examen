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
        <a href="Gebruikers.php">< Terug</a>
      </div>
      <div class="addGebruikers">
        <form action="Responses/addGebruikerResponse.php" method="POST">
          <input type="text" name="Voornaam" value="" placeholder="Voornaam" required><br>
          <input type="text" name="Achternaam" value="" placeholder="Achternaam" required><br>
          <select name="Rol" required>
            <option value="" disabled selected>Selecteer een optie</option>
            <option value="Administrator">Administrator</option>
            <option value="MagezijnMedewerker">Magezijn medewerker</option>
            <option value="Vrijwilliger">Vrijwilliger</option>
          </select><br>
          <input type="text" name="TelefoonNummer" value="" placeholder="TelefoonNummer" required><br>
          <input type="text" name="Email" value="" placeholder="Email" required><br>
          <input type="text" name="Wachtwoord" value="" placeholder="Wachtwoord" required><br>
          <input type="submit" name="submit" value="Voeg toe">
        </form>
      </div>
  </div>
  </body>
</html>
