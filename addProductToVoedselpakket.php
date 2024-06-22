<?php
session_start();

if ($_SESSION["user"]["rol"] != "Administrator" && $_SESSION["user"]["rol"] != "Vrijwilliger") {
    header('location: Vooraad.php');
    exit();
}

$idPakket = $_GET['id'];
$id = $idPakket;
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
        <form class="form-container" action="Responses/addProductToVoedselpakketResponse.php?id=<?php echo $id; ?>" method="POST">
            <h2 class="profile__password-header">Voedselpakket toevoegen</h2>
            <div class="form">
                <label class="form__label" for="options">Product:</label>
                <select class="form__input" id="options" name="product" required>
                    <option value="disabled" hidden disabled selected>Selecteer een product</option>
                    <?php require_once "Inclusions/ProductList.inc.php"; ?>
                </select>
                <label class="form__label" for="aantal">Aantal*</label>
                <input class="form__input" type="number" id="aantal" name="aantal" min="1" required>
            </div>
            <button class="form__submit" type="submit">Voeg toe</button>
        </form>
    </div>
</body>

</html>