<?php
session_start();

if (!isset($_SESSION['rol']) || $_SESSION['rol'] != 'jefe') {
    header('Location: ../../index.php');
    exit;
}

require_once '../../Controller/TrabajadorController.php';
$trabajadorController = new TrabajadorController();
$trabajadores = $trabajadorController->listarTrabajadores();

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Trabajadores</title>
    <link rel="stylesheet" href="../../Source/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
	<div class="d-flex justify-content-between align-items-center">
        	<h2 class="mb-4">Dashboard del Jefe</h2>
        	<a href="index.php" class="btn btn-secondary" >Regresar</a>
    	</div>
    <div>
        <h4>Añadir Nuevo Trabajador</h4>
        <form action="../../Controller/TrabajadorHandler.php" method="POST">
            <input type="hidden" name="accion" value="agregar">
            <input type="text" name="nombre" placeholder="Nombre" required>
            <input type="text" name="codigo_trabajador" placeholder="Código Trabajador" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="email" name="email" placeholder="Email" required>
            <button type="submit" class="btn btn-success">Agregar</button>
        </form>
    </div>
    <hr>
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Código Trabajador</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($trabajadores as $trabajador) { ?>
            <tr>
                <td><?php echo $trabajador['id']; ?></td>
                <td><?php echo $trabajador['nombre']; ?></td>
                <td><?php echo $trabajador['codigo_trabajador']; ?></td>
                <td><?php echo $trabajador['email']; ?></td>
                <td>
                    <a href="editar_trabajador.php?id=<?php echo $trabajador['id']; ?>" class="btn btn-primary">Editar</a>
                    <form action="../../Controller/TrabajadorHandler.php" method="POST" onsubmit="return confirm('¿Está seguro de querer eliminar este trabajador?');">
                        <input type="hidden" name="id" value="<?php echo $trabajador['id']; ?>">
                        <input type="hidden" name="accion" value="eliminar">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
<script src="../../Source/js/bootstrap.bundle.min.js"></script>
</body>
</html>
