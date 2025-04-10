<?php
require_once '../controllers/AuthController.php';
AuthController::requireLogin();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier une section</title>
</head>
<body>
    <h2>Modifier une section</h2>

    <form action="../controllers/SectionController.php?action=update&id=<?= $section['id'] ?>" method="POST">
        <label>Nom de la section :</label><br>
        <input type="text" name="name" required value="<?= htmlspecialchars($section['name']) ?>"><br><br>

        <button type="submit">💾 Enregistrer</button>
    </form>

    <br>
    <a href="../controllers/SectionController.php?action=index">⬅ Retour à la liste</a>
</body>
</html>
