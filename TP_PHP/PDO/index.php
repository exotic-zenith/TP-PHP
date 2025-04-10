<?php
session_start();

// Si l'utilisateur est connecté, on le redirige vers l'accueil
if (isset($_SESSION['user'])) {
    header("Location: home.php");
} else {
    header("Location: views/auth/login.php");
}
exit();
