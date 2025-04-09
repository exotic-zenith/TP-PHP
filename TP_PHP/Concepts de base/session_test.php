<?php
require_once 'SessionManager.php';

$sessionManager = SessionManager::getInstance();
$sessionManager->incrementVisitCount();

$visitCount = $sessionManager->getVisitCount();
$firstVisitDate = $sessionManager->getFirstVisitDate();
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Sessions</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .message-container {
            background-color: white;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }
        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
        }
        .btn:hover {
            background-color: #45a049;
        }
        .info {
            margin-top: 20px;
            font-size: 0.9em;
            color: #666;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <?php if ($visitCount == 1): ?>
            <h2>Bienvenue à notre plateforme</h2>
            <p>C'est votre première visite.</p>
        <?php else: ?>
            <h2>Merci pour votre fidélité</h2>
            <p>C'est votre <?= $visitCount ?>ème visite.</p>
        <?php endif; ?>

        <form method="post" action="">
            <button type="submit" name="reset" class="btn">Réinitialiser la session</button>
        </form>

        <div class="info">
            <p>Première visite: <?= $firstVisitDate ?></p>
            <p>ID de session: <?= session_id() ?></p>
        </div>
    </div>

    <?php
    if (isset($_POST['reset'])) {
        $sessionManager->resetSession();
        header("Location: ".$_SERVER['PHP_SELF']);
        exit();
    }
    ?>
</body>
</html>