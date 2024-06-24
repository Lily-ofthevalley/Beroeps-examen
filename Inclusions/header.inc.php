<?php
if ($_SESSION["user"]["rol"] == "Administrator") {
echo "<ul class='header'>
     <li><a href='Vooraad.php'>Vooraad</a></li>
     <li><a href='Leveranciers.php'>Leveranciers</a></li>
     <li><a href='Voedselpakketten.php'>Voedselpakketten</a></li>
     <li><a href='Klanten.php'>Klanten</a></li>
     <li><a href='Gebruikers.php'>Gebruikers</a></li>
     <li class='userbtn'><a href='User.php'>Welkom, " . ($_SESSION["user"]["username"]) . "</a></li>
     </ul>";
} else if ($_SESSION["user"]["rol"] == "Magazijn medewerker") {
echo "<ul class='header'>
     <li><a href='Vooraad.php'>Vooraad</a></li>
     <li><a href='Leveranciers.php'>Leveranciers</a></li>
     <li class='userbtn'><a href='User.php'>Welkom, " . ($_SESSION["user"]["username"]) . "</a></li>
     </ul>";
} else if ($_SESSION["user"]["rol"] == "Vrijwilliger") {
echo "<ul class='header'>
     <li><a href='Vooraad.php'>Vooraad</a></li>
     <li><a href='Voedselpakketten.php'>Voedselpakketten</a></li>
     <li><a href='Klanten.php'>Klanten</a></li>
     <li class='userbtn'><a href='User.php'>Welkom, " . ($_SESSION["user"]["username"]) . "</a></li>
     </ul>";
}
