<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'trabajador') {
    header('Location: ../../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Trabajador - Gestión de Proyectos TI</title>
    <link href="../../Source/css/bootstrap.min.css" rel="stylesheet">
</head>