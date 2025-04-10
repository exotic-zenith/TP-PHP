<?php
require_once '../controllers/AuthController.php';
AuthController::requireLogin();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des étudiants</title>
</head>
<body>
    <h2>Liste des étudiants</h2>

    <a href="../controllers/StudentController.php?action=create">➕ Ajouter un étudiant</a>
    <br><br>

    <table border="1" cellpadding="8">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Date de naissance</th>
                <th>Section</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($students as $student): ?>
                <tr>
                    <td><?= htmlspecialchars($student['id']) ?></td>
                    <td><?= htmlspecialchars($student['name']) ?></td>
                    <td><?= htmlspecialchars($student['birthday']) ?></td>
                    <td><?= htmlspecialchars($student['section_name']) ?></td>
                    <td>
                        <a href="../controllers/StudentController.php?action=delete&id=<?= $student['id'] ?>" onclick="return confirm('Supprimer cet étudiant ?')">❌ Supprimer</a>
                        <a href="../controllers/StudentController.php?action=show&id=<?= $student['id'] ?>">🔍 Voir</a>
                        <a href="../controllers/StudentController.php?action=edit&id=<?= $student['id'] ?>">✏️ Modifier</a> |

                        <!-- Tu peux aussi ajouter Modifier ici -->
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><br>
    <a href="../controllers/AuthController.php?action=logout">🔓 Déconnexion</a>
</body>
</html>
