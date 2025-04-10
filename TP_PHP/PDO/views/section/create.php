<?php
require_once '../controllers/AuthController.php';
AuthController::requireLogin();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter une section</title>
</head>
<body>
    <h2>Ajouter une section</h2>

    <form action="../controllers/SectionController.php?action=store" method="POST">
        <label>Nom de la section :</label><br>
        <input type="text" name="name" required><br><br>

        <button type="submit">✅ Ajouter</button>
    </form>

    <br>
    <a href="../controllers/SectionController.php?action=index">⬅ Retour à la liste</a>
</body>
</html>
