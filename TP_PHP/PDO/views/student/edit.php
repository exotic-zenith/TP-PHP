<?php
require_once '../controllers/AuthController.php';
AuthController::requireLogin();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'étudiant</title>
</head>
<body>
    <h2>Modifier l'étudiant</h2>

    <form action="../controllers/StudentController.php?action=update&id=<?= $student['id'] ?>" method="POST">
        <label>Nom :</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($student['name']) ?>" required><br><br>

        <label>Date de naissance :</label><br>
        <input type="date" name="birthday" value="<?= htmlspecialchars($student['birthday']) ?>" required><br><br>

        <label>Section :</label><br>
        <select name="section_id" required>
            <?php foreach ($sections as $section): ?>
                <option value="<?= $section['id'] ?>" 
                    <?= $student['section_id'] == $section['id'] ? 'selected' : '' ?>>
                    <?= htmlspecialchars($section['name']) ?>
                </option>
            <?php endforeach; ?>
        </select><br><br>

        <button type="submit">💾 Enregistrer les modifications</button>
    </form>

    <br>
    <a href="../controllers/StudentController.php?action=index">⬅ Retour à la liste</a>
</body>
</html>
