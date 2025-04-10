<?php
require_once '../controllers/AuthController.php';
AuthController::requireLogin();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des sections</title>
</head>
<body>
    <h2>Liste des sections</h2>

    <a href="../controllers/SectionController.php?action=create">➕ Ajouter une section</a>
    <br><br>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sections as $section): ?>
                <tr>
                    <td><?= htmlspecialchars($section['id']) ?></td>
                    <td><?= htmlspecialchars($section['name']) ?></td>
                    <td>
                        <a href="../controllers/SectionController.php?action=edit&id=<?= $section['id'] ?>">✏️ Modifier</a> |
                        <a href="../controllers/SectionController.php?action=delete&id=<?= $section['id'] ?>" onclick="return confirm('Supprimer cette section ?')">❌ Supprimer</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br>
    <a href="../controllers/StudentController.php?action=index">⬅ Retour aux étudiants</a>
</body>
</html>
