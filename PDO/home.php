<?php
require_once __DIR__ . "/controllers/AuthController.php";
AuthController::requireLogin();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <h1>🎓 Tableau de bord</h1>

    <ul>
        <li><a href="controllers/StudentController.php?action=index">👨‍🎓 Gérer les étudiants</a></li>
        <li><a href="controllers/SectionController.php?action=index">🏫 Gérer les sections</a></li>
    </ul>

    <p><a href="controllers/AuthController.php?action=logout">🚪 Se déconnecter</a></p>
</body>
</html>
