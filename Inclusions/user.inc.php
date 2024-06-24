<?php
require_once "dbh.inc.php"; //connects to the database

$id = $_SESSION["user"]["id"];

try {
    $sqlUser = "SELECT TelefoonNummer, Email FROM medewerker WHERE idMedewerker = $id"; //Selects the product data
    $resultUser = $pdo->query($sqlUser);
} catch (PDOException $e) { //checks and gives errors
    echo "Error: " . $e->getMessage();
    die();
}

if ($resultUser->rowCount() > 0) { //goes through the data and place it in the right place
    while ($row = $resultUser->fetch(PDO::FETCH_ASSOC))
    {
echo    "<h1 class='profile__name'>". ($_SESSION["user"]["username"]) ."</h1>
        <h3 class='profile__role'>". ($_SESSION["user"]["rol"]) ."</h3>
      <div class='profile__info-container'>
        <h4>Telefoon</h4>
        <h4>E-mail</h4>
        <p>".$row["TelefoonNummer"]."</p>
        <p>".$row["Email"]."</p>
      </div>";
    }
}