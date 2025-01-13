<?php
ini_set("display_errors", 1);
error_reporting(E_ALL);

$servername = "localhost";
$username = "ftp100201";
$password = "@GlrMMM01";
$database = "BEROEPS_100201";

$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password, $options);
} catch(PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}


