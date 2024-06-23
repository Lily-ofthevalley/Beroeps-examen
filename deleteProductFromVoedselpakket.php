<?php
session_start();

if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "Vrijwilliger") {
    header('location: Vooraad.php');
    exit();
}

$id = $_GET['id'];
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
        <form class="form-container" action="Responses/deleteProductFromVoedselpakketResponse.php?id=<?php echo $id; ?>" method="POST">
            <h2 class="profile__password-header">Product uit Voedselpakket verwijderen</h2>
            <div class="form">
                <label class="form__label" for="options">Product:</label>
                <select class="form__input" id="options" name="product" required>
                    <option value="disabled" hidden disabled selected>Selecteer een product</option>
                    <?php require_once "Inclusions/ProductList.inc.php"; ?>
                </select>
            </div>
            <button class="form__submit" type="submit">Voeg toe</button>
        </form>
    </div>
</body>

</html>