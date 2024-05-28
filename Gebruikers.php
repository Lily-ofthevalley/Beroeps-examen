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
    <title>Gebruikers - Voedselbank Maaskantje</title>
    <link rel="stylesheet" href="Styles/Styles.css" />
  </head>
  <body>
  <header>
    <?php require_once "Inclusions/header.inc.php" ?>
  </header>
    <h1>Hello, World!</h1>
    <p>This is a basic HTML file.</p>
  </body>
</html>
