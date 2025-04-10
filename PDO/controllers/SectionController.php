<?php
require_once '../repositories/SectionRepository.php';
require_once 'AuthController.php';

class SectionController {
    private $repo;

    public function __construct() {
        AuthController::requireLogin();
        $this->repo = new SectionRepository();
    }

    public function index() {
        $sections = $this->repo->findAll();
        include '../views/section/list.php';
    }

    public function create() {
        include '../views/section/create.php';
    }

    public function store($data) {
        $this->repo->insert($data);
        header("Location: SectionController.php?action=index");
        exit();
    }

    public function edit($id) {
        $section = $this->repo->findById($id);
        include '../views/section/edit.php';
    }

    public function update($id, $data) {
        $this->repo->update($id, $data);
        header("Location: SectionController.php?action=index");
        exit();
    }

    public function delete($id) {
        $this->repo->delete($id);
        header("Location: SectionController.php?action=index");
        exit();
    }
}

// Routeur
$controller = new SectionController();

$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'index':
        $controller->index();
        break;
    case 'create':
        $controller->create();
        break;
    case 'store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store($_POST);
        }
        break;
    case 'edit':
        if (isset($_GET['id'])) {
            $controller->edit($_GET['id']);
        }
        break;
    case 'update':
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_GET['id'])) {
            $controller->update($_GET['id'], $_POST);
        }
        break;
    case 'delete':
        if (isset($_GET['id'])) {
            $controller->delete($_GET['id']);
        }
        break;
}
