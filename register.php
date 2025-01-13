<?php
include 'config.php'; // Verbind met de database

// Start de sessie
session_start();

// Controleer of het formulier is ingediend
if (isset($_POST['register'])) {
    $naam = $_POST['naam'];
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    // Hash het wachtwoord
    $wachtwoordHash = password_hash($wachtwoord, PASSWORD_BCRYPT);

    // Profiel foto uploaden
    if (isset($_FILES['profielFoto']) && $_FILES['profielFoto']['error'] == 0) {
        $bestandsnaam = $_FILES['profielFoto']['name'];
        $bestemmingsmap = 'uploads/' . $bestandsnaam;

        // Verplaats de afbeelding naar de gewenste map
        move_uploaded_file($_FILES['profielFoto']['tmp_name'], $bestemmingsmap);
    } else {
        $bestandsnaam = null; // Als er geen afbeelding is, slaan we null op
    }

    // Functie om de Gebruiker op te slaan in de database
    registreerGebruiker($naam, $email, $wachtwoordHash, $bestandsnaam);

    // Zet een succesbericht in de sessie
    $_SESSION['status'] = 'Registratie succesvol!';

    // Redirect naar de loginpagina
    header('Location: login.php');
    exit; // Zorg ervoor dat de scriptuitvoering stopt na de redirect
}

// Functie om de Gebruiker op te slaan in de database
function registreerGebruiker($naam, $email, $wachtwoordHash, $bestandsnaam) {
    global $pdo;

    // SQL-query om de Gebruiker in de database op te slaan
    $sql = "INSERT INTO Gebruiker (Naam, Email, Wachtwoord, profielFoto) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$naam, $email, $wachtwoordHash, $bestandsnaam]);
}

// Nu wordt de HTML view geladen na de logica
include 'views/register_view.php'; // Laadt de view zonder redirect
