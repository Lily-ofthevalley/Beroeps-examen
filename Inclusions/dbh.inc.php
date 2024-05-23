<?php 
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "VoedselbankMaaskantje";

try {
    // create connection
    $dsn = "mysql:host=$servername;dbname=$dbname;port=3306";
    $pdo = new PDO($dsn, $username, $password);
    
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connected successfully"; 
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}