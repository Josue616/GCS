<?php
require_once '../Config/conexion.php';
require_once '../Model/Usuario.php';
require_once 'UsuarioController.php';

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $codigoTrabajador = $_POST['codigoTrabajador'] ?? '';
    $password = $_POST['password'] ?? '';

    $usuarioController = new UsuarioController();

    $usuarioController->login($codigoTrabajador, $password);
} else {
    header('Location: ../index.php');
    exit;
}
?>
