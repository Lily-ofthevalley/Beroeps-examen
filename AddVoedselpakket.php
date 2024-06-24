<?php
session_start();

if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "Vrijwilliger") {
    header('location: Vooraad.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Voedselpakket toevoegen - Voedselbank Maaskantje</title>
    <link rel="stylesheet" href="Styles/Styles.css" />
</head>

<body>
    <header>
        <?php require_once "Inclusions/header.inc.php"; ?>
    </header>
    <div class="page-content">
        <form class="form-container" action="Responses/addResponses/addVoedselpakketResponse.php" method="POST">
            <h2 class="profile__password-header">Voedselpakket toevoegen</h2>
            <div class="form">
                <label class="form__label" for="customer">Klant*</label>
                <select class="form__input" id="customer" name="customer" required>
                    <option value="" hidden disabled selected>(Kies klant)</option>
                    <?php require_once "Inclusions/customerList.inc.php"; ?>
                </select>
            <button class="form__submit" type="submit">Voeg toe</button>
        </form>
    </div>
    <script src='Javascript/package.js'></script>
</body>

</html>