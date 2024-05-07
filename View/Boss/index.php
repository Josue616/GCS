<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'jefe') {
    header('Location: ../../index.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Jefe - Gestión de Proyectos TI</title>
    <link href="../../Source/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center">
        <h2 class="mb-4">Dashboard del Jefe</h2>
        <a href="../../index.php" class="btn btn-secondary" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Cerrar Sesión</a>
        <form id="logout-form" action="logout.php" method="POST" style="display: none;">
        </form>
    </div>
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-users fa-3x"></i>
                    <h5 class="card-title mt-2">Gestionar Trabajadores</h5>
                    <a href="gestionar_trabajadores.php" class="btn btn-primary">Acceder</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-project-diagram fa-3x"></i>
                    <h5 class="card-title mt-2">Gestionar Proyectos</h5>
                    <a href="gestionar_proyectos.php" class="btn btn-primary">Acceder</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-envelope-open-text fa-3x"></i>
                    <h5 class="card-title mt-2">Solicitudes/Propuestas</h5>
                    <a href="solicitudes_propuestas.php" class="btn btn-primary">Acceder</a>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center">
                <div class="card-body">
                    <i class="fas fa-cogs fa-3x"></i>
                    <h5 class="card-title mt-2">Configuraciones</h5>
                    <a href="configuraciones.php" class="btn btn-primary">Acceder</a>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="../../Source/js/bootstrap.bundle.min.js"></script>
</body>
</html>
