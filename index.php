<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Gestión de Proyectos TI</title>
    <link href="Source/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light d-flex align-items-center" style="height: 100vh;">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card shadow-sm">
                    <div class="card-body">
                        <h2 class="card-title text-center">Login</h2>
                        <form action="Controller/LoginHandler.php" method="POST">
                            <div class="mb-3">
                                <label for="codigoTrabajador" class="form-label">Código de Trabajador</label>
                                <input type="text" class="form-control" id="codigoTrabajador" name="codigoTrabajador" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Contraseña</label>
                                <input type="password" class="form-control" id="password" name="password" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Ingresar</button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <script src="Source/js/bootstrap.bundle.min.js"></script>
</body>
</html>