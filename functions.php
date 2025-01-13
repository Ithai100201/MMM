<?php
function getUsers() {
    global $pdo;  // Gebruik de globale PDO-verbinding uit config.php

    $sql = "SELECT * FROM Gebruiker";  // Haal alle gebruikers op
    $stmt = $pdo->prepare($sql);
    $stmt->execute();

    // Resultaat ophalen en retourneren als een array
    return $stmt->fetchAll();
}
?>
