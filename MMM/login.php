<?php
include 'config.php'; // Verbind met de database

// Start de sessie
session_start();

// Controleer of het formulier is ingediend
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $wachtwoord = $_POST['wachtwoord'];

    // Haal de gebruiker op uit de database
    $sql = "SELECT * FROM Artist WHERE Email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $gebruiker = $stmt->fetch();

    // Controleer of de gebruiker bestaat en het wachtwoord klopt
    if ($gebruiker && password_verify($wachtwoord, $gebruiker['Wachtwoord'])) {
        // Zet de sessiegegevens voor de ingelogde gebruiker
        $_SESSION['gebruiker_id'] = $gebruiker['id'];
        $_SESSION['gebruiker_naam'] = $gebruiker['Naam'];

        // Succesbericht
        $_SESSION['status'] = 'Je bent succesvol ingelogd!';

        // Redirect naar de gewenste pagina (bijvoorbeeld het dashboard)
        header("Location: dashboard.php");
        exit();
    } else {
        // Foutmelding als login niet succesvol is
        $_SESSION['status'] = 'Ongeldige inloggegevens!';
    }
}

// Laad de HTML view na de logica
include 'views/login_view.php'; // Laadt de login view
