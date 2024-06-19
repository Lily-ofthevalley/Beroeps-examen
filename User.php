<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Mijn account - Voedselbank Maaskantje</title>
  <link rel="stylesheet" href="Styles/Styles.css" />
</head>

<body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
  <div class="page-content">
    <div class="profile-container">
      <?php require_once "Inclusions/user.inc.php"?>
    </div>

    <form class="form-container profile__password-container"  action="Responses/editPasswordResponse.php" method="POST">
      <h2 class="profile__password-header">Wachtwoord veranderen</h2>
      <div class="form">
        <label class="form__label" for="name">Nieuw wachtwoord</label>
        <input class="form__input" type="password" id="name" name="name" minlength="8" required>
      </div>
      <button class="form__submit" type="submit">Verander</button>
    </form>
  </div>
</body>

</html>