<?php
// controllers/StudentController.php

require_once __DIR__ . '/../models/StudentRepository.php';
require_once __DIR__ . '/../models/SectionRepository.php';
require_once __DIR__ . '/../controllers/AuthController.php';

session_start();
AuthController::requireLogin(); // bloque l'accès si non connecté

class StudentController {
    private $repo;
    private $sectionRepo;

    public function __construct() {
        $this->repo = new StudentRepository();
        $this->sectionRepo = new SectionRepository();
    }

    public function index() {
        $students = $this->repo->findAllWithSection();
        include '../views/student/index.php';
    }

    public function create() {
        $sections = $this->sectionRepo->findAll();
        include '../views/student/create.php';
    }

    public function store($data) {
        $this->repo->create($data);
        header("Location: StudentController.php?action=index");
        exit();
    }

    public function delete($id) {
        $this->repo->delete($id);
        header("Location: StudentController.php?action=index");
        exit();
    }

    public function show($id) {
        $student = $this->repo->findById($id);
        include '../views/student/detail.php';
    }

    public function edit($id) {
        $student = $this->repo->findById($id);
        $sections = $this->sectionRepo->findAll();
        include '../views/student/edit.php';
    }
    
    public function update($id, $data) {
        $this->repo->update($id, $data);
        header("Location: StudentController.php?action=index");
        exit();
    }
    
    
}

// ======================= ROUTEUR ============================

$controller = new StudentController();
$action = $_GET['action'] ?? 'index';

switch ($action) {
    case 'create':
        $controller->create();
        break;

    case 'store':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $controller->store($_POST);
        }
        break;

    case 'delete':
        if (isset($_GET['id'])) {
            $controller->delete($_GET['id']);
        }
        break;

    case 'index':
    default:
        $controller->index();
        break;
    
    case 'show':
        if (isset($_GET['id'])) {
            $controller->show($_GET['id']);
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
        
        
}


