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
        <a href="Gebruikers.html">< Terug</a>
      </div>
      <div class="addGebruikers">
        <form action="Responses/addGebruikerResponse.php" method="POST">
          <input type="text" name="Voornaam" value="" placeholder="Voornaam"><br>
          <input type="text" name="Tussenvoegsels" value="" placeholder="Tussenvoegsels"><br>
          <input type="text" name="Achternaam" value="" placeholder="Achternaam"><br>
          <select name="Rol">
            <option value="" disabled selected>Selecteer een optie</option>
            <option value="Administrator">Administrator</option>
            <option value="MagezijnMedewerker">Magezijn medewerker</option>
            <option value="Vrijwilliger">Vrijwilliger</option>
          </select><br>
          <input type="text" name="TelefoonNummer" value="" placeholder="TelefoonNummer"><br>
          <input type="text" name="Email" value="" placeholder="Email"><br>
          <input type="text" name="Wachtwoord" value="" placeholder="Wachtwoord"><br>
          <input type="submit" name="submit" value="Voeg toe">
        </form>
      </div>
  </div>
  </body>
</html>
