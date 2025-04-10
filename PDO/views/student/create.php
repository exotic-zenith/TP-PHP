<?php
require_once '../controllers/AuthController.php';
AuthController::requireLogin();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un étudiant</title>
</head>
<body>
    <h2>Ajouter un étudiant</h2>

    <form action="../controllers/StudentController.php?action=store" method="POST">
        <label>Nom :</label><br>
        <input type="text" name="name" required><br><br>

        <label>Date de naissance :</label><br>
        <input type="date" name="birthday" required><br><br>

        <label>Section :</label><br>
        <select name="section_id" required>
            <option value="">-- Choisir une section --</option>
            <?php foreach ($sections as $section): ?>
                <option value="<?= $section['id'] ?>">
                    <?= htmlspecialchars($section['name']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">✅ Ajouter</button>
    </form>

    <br>
    <a href="../controllers/StudentController.php?action=index">⬅ Retour à la liste</a>
</body>
</html>
