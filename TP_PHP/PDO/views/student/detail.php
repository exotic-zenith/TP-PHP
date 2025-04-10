<?php
require_once '../controllers/AuthController.php';
AuthController::requireLogin();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Détail de l'étudiant</title>
</head>
<body>
    <h2>Détails de l'étudiant</h2>

    <?php if ($student): ?>
        <ul>
            <li><strong>ID :</strong> <?= htmlspecialchars($student['id']) ?></li>
            <li><strong>Nom :</strong> <?= htmlspecialchars($student['name']) ?></li>
            <li><strong>Date de naissance :</strong> <?= htmlspecialchars($student['birthday']) ?></li>
            <li><strong>Section :</strong> <?= htmlspecialchars($student['section_name']) ?></li>
        </ul>
    <?php else: ?>
        <p>Étudiant introuvable.</p>
    <?php endif; ?>

    <br>
    <a href="../controllers/StudentController.php?action=index">⬅ Retour à la liste</a>
</body>
</html>
