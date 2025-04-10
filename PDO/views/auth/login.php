<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>
<body>
    <h2>Connexion</h2>

    <?php if (isset($_GET['error'])): ?>
        <p style="color:red;">Identifiants invalides</p>
    <?php endif; ?>

    <form action="http://localhost/TP_PHP/controllers/AuthController.php?action=login" method="POST">
        <label>Nom d'utilisateur :</label><br>
        <input type="text" name="username" required><br><br>

        <label>Mot de passe :</label><br>
        <input type="password" name="password" required><br><br>

        <button type="submit">🔐 Se connecter</button>
    </form>
</body>
</html>
