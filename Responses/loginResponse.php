<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $voornaam = $_POST["voornaam"];
    $achternaam = $_POST["achternaam"];
    $pwd = $_POST["password"];

    require_once "../Inclusions/dbh.inc.php"; // Connect to the database

    $loginQuery = "SELECT Voornaam, Achternaam, Rol, Wachtwoord FROM medewerker WHERE Voornaam = :Voornaam AND Achternaam = :Achternaam";
    $loginStmt = $pdo->prepare($loginQuery);
    $loginStmt->execute([':Voornaam' => $voornaam, ':Achternaam' => $achternaam]);

    $row = $loginStmt->fetch(PDO::FETCH_ASSOC);

    if ($row) {
        var_dump($row);
        // Verify the entered password against the stored hashed password
        if (password_verify($pwd, $row["Wachtwoord"])) {
            $_SESSION["user"] = array("username" => $row["Voornaam"] . " " . $row["Achternaam"], "rol" => $row["Rol"]);
            header("Location: ../Vooraad.php");
            exit();
        } else {
            header("Location: ../login.php?error=incorrect_password");
            exit();
        }
    } else {
        header("Location: ../login.php?error=user_not_found");
        exit();
    }
} else {
    header("Location: ../login.php");
    exit();
}

