<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Artiest Registratie</title>
</head>
<body>
<h1>Artiest Registratie</h1>

<!-- Formulier voor registratie -->
<form action="../register.php" method="POST" enctype="multipart/form-data">
    <label for="naam">Artiestnaam</label>
    <input type="text" name="naam" id="naam" required>

    <label for="email">E-mail</label>
    <input type="email" name="email" id="email" required>

    <label for="wachtwoord">Wachtwoord</label>
    <input type="password" name="wachtwoord" id="wachtwoord" required>

    <label for="profielFoto">Profiel foto</label>
    <input type="file" name="profielFoto" id="profielFoto" accept="image/*">

    <button type="submit" name="register">Registreer</button>


    <p>Heb je al een account? <a href="login.php">log hier in!</a></p>
</form>
</body>
</html>
