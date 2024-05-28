<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Log in - Voedselbank Maaskantje</title>
    <link rel="stylesheet" href="Styles/Styles.css" />
  </head>
  <body>
    <div class="loginContainer">
      <div class="login">
        <h1>Inloggen</h1>
        <form action="Responses/loginResponse.php" method="post">
            <input type="text" name="voornaam" value="" placeholder="voornaam" required><br>
            <input type="text" name="achternaam" value="" placeholder="achternaam" required><br>
            <input type="password" name="password" value="" placeholder="Wachtwoord" required><br>
            <input type="submit" name="submit" value="Verstuur">
        </form>
      </div>
    </div>
  </body>
</html>
