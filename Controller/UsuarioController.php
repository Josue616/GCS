<?php
require_once '../Config/conexion.php';
require_once '../Model/Usuario.php';

class UsuarioController {
    private $conexion;

    public function __construct() {
        $conn = new Conexion();
        $this->conexion = $conn->conectar();
    }

    public function login($codigoTrabajador, $password) {
        $stmt = $this->conexion->prepare("SELECT * FROM usuarios WHERE codigo_trabajador = ? AND passwordUser = ?");
        $stmt->bind_param("ss", $codigoTrabajador, $password);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($usuario = $resultado->fetch_assoc()) {
            $rol = $this->obtenerRol($usuario['id']);
            $_SESSION['usuario_id'] = $usuario['id'];
            $_SESSION['rol'] = $this->obtenerRol($usuario['id']);
            $this->redireccionarSegunRol($rol);
        } else {
            echo "Credenciales incorrectas.";
        }
    }

    private function obtenerRol($usuarioId) {
        $stmt = $this->conexion->prepare("SELECT r.nombre FROM roles r JOIN usuario_roles ur ON r.id = ur.rol_id WHERE ur.usuario_id = ?");
        $stmt->bind_param("i", $usuarioId);
        $stmt->execute();
        $resultado = $stmt->get_result();
        if ($rol = $resultado->fetch_assoc()) {
            return $rol['nombre'];
        } else {
            return null;
        }
    }

    private function redireccionarSegunRol($rol) {
        if ($rol === 'jefe') {
            header('Location: ../View/Boss/index.php');
            exit;
        } elseif ($rol === 'trabajador') {
            header('Location: ../View/Worker/index.php');
            exit;
        } else {
            echo "Rol no reconocido o usuario sin rol asignado.";
        }
    }

    public function desconectar() {
        $conn = new Conexion();
        $conn->desconectar();
    }

    public function __destruct() {
        $this->desconectar();
    }
}
?>
