<?php
require_once '../Config/conexion.php';
require_once '../Model/Trabajador.php';
require_once 'TrabajadorController.php';

session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'jefe') {
    header('Location: ../index.php');
    exit;
}

$trabajadorController = new TrabajadorController();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['accion'])) {
        switch ($_POST['accion']) {
            case 'agregar':
                $nombre = $_POST['nombre'] ?? '';
                $codigo = $_POST['codigo_trabajador'] ?? '';
                $password = $_POST['password'] ?? '';
                $email = $_POST['email'] ?? '';
                $trabajadorController->agregarTrabajador($nombre, $codigo, $password, $email);
                break;
            case 'actualizar':
                $id = $_POST['id'] ?? 0;
                $nombre = $_POST['nombre'] ?? '';
                $codigo = $_POST['codigo_trabajador'] ?? '';
                $password = $_POST['password'] ?? '';
                $email = $_POST['email'] ?? '';
                $trabajadorController->actualizarTrabajador($id, $nombre, $codigo, $password, $email);
                break;
            case 'eliminar':
                $id = $_POST['id'] ?? 0;
                $trabajadorController->eliminarTrabajador($id);
                break;
        }
    }
    header('Location: ../View/Boss/gestionar_trabajadores.php');
} elseif ($_SERVER['REQUEST_METHOD'] == 'GET') {
    if (isset($_GET['accion']) && $_GET['accion'] == 'listar') {
        $trabajadores = $trabajadorController->listarTrabajadores();
    }
}

$trabajadorController->desconectar();
?>
