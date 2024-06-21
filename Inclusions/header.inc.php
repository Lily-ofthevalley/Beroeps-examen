<?php
if ($_SESSION["user"]["rol"] == "Administrator") {
    echo "<ul class='header'>";
    echo "<li><a href='Vooraad.php'>Vooraad</a></li>";
    echo "<li><a href='Leveranciers.php'>Leveranciers</a></li>";
    echo "<li><a href='Voedselpakketten.php'>Voedselpakketten</a></li>";
    echo "<li><a href='Klanten.php'>Klanten</a></li>";
    echo "<li><a href='Gebruikers.php'>Gebruikers</a></li>";
    echo "<li class='userbtn'><a href='User.php'>Welkom, " . ($_SESSION["user"]["username"]) . "</a></li>";
    echo "</ul>";
} else if ($_SESSION["user"]["rol"] == "Magazijn Medewerker") {
    echo "<ul class='header'>";
    echo "<li><a href='Vooraad.php'>Vooraad</a></li>";
    echo "<li><a href='Leveranciers.php'>Leveranciers</a></li>";
    echo "<li class='userbtn'><a href='User.php'>Welkom, " . ($_SESSION["user"]["username"]) . "</a></li>";
    echo "</ul>";
} else if ($_SESSION["user"]["rol"] == "Vrijwilliger") {
    echo "<ul class='header'>";
    echo "<li><a href='Vooraad.php'>Vooraad</a></li>";
    echo "<li><a href='Voedselpakketten.php'>Voedselpakketten</a></li>";
    echo "<li><a href='Klanten.php'>Klanten</a></li>";
    echo "<li class='userbtn'><a href='User.php'>Welkom, " . ($_SESSION["user"]["username"]) . "</a></li>";
    echo "</ul>";
}
