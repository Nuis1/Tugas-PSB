<?php
require_once 'app/controllers/MahasiswaController.php';

$controller = new MahasiswaController();

// Simple routing
$action = isset($_GET['action']) ? $_GET['action'] : 'index';

switch($action) {
    case 'detail':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id) {
            $controller->detail($id);
        } else {
            $controller->index();
        }
        break;
    case 'create':
        $controller->create();
        break;
    case 'update':
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if($id) {
            $controller->update($id);
        } else {
            $controller->index();
        }
    case 'store':
        $controller->store();
        break;
    default:
        $controller->index();
        break;
}
?>