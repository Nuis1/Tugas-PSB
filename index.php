<?php
require_once 'app/controllers/MahasiswaController.php';

$controller = new MahasiswaController();

// Simple routing
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch ($action) {
    case 'detail':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            $controller->detail($id);
        } else {
            $controller->index();
        }
        break;
    case 'create':
        $controller->create();
        break;
    case 'edit':
        $id = $_GET['id'] ?? null;
        if ($id) {
            $controller->edit($id);
        }
        break;

    case 'update':
        $controller->update();
        break;
    case 'store':
        $controller->store();
        break;
    case 'delete':
        if ($action == 'delete' && isset($_GET['id'])) {
            $controller->delete($_GET['id']);
        }
    default:
        $controller->index();
        break;
}
