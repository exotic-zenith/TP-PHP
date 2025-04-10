<?php
// controllers/AuthController.php
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../repositories/UserRepository.php';
session_start();

class AuthController
{
    private $userRepo;

    public function __construct()
    {
        $this->userRepo = new UserRepository();
    }

    public function login($username, $password)
    {
        $authenticated = false;
        session_start();
        $authenticated = $this->userRepo->authenticate($username, $password);

        // Ici tu peux ajouter une vraie vérification depuis la BDD
        if ($authenticated) {
            $_SESSION['user'] = $username;

            // Redirige vers la page d’accueil après connexion
            header("Location: ../home.php");
            exit();
        } else {
            // Redirige vers login avec un message d'erreur
            header("Location: ../views/auth/login.php?error=1");
            exit();
        }
    }


    public function logout()
    {
        session_unset();
        session_destroy();
        var_dump($_SESSION);
        header("Location: ../views/auth/login.php");
        exit();
    }

    public static function isAuthenticated()
    {
        return isset($_SESSION['user']);
    }

    public static function requireLogin()
    {
        if (!self::isAuthenticated()) {
            header("Location: ../views/auth/login.php");
            exit();
        }
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'login') {
    $controller = new AuthController();
    if (isset($_POST['username'], $_POST['password'])) {
        $controller->login($_POST['username'], $_POST['password']);
    } else {
        echo "Missing username or password.";
    }
}

if (isset($_GET['action']) && $_GET['action'] === 'logout') {
    $controller = new AuthController();
    $controller->logout();
}