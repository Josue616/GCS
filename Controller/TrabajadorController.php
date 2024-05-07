<?php
require_once __DIR__ . '/../Config/conexion.php';
require_once __DIR__ . '/../Model/Trabajador.php';

class TrabajadorController {
    private $conexion;

    public function __construct() {
        $conn = new Conexion();
        $this->conexion = $conn->conectar();
    }

    public function listarTrabajadores() {
        $sql = "SELECT u.id, u.nombre, u.codigo_trabajador, u.email FROM usuarios u 
                INNER JOIN usuario_roles ur ON u.id = ur.usuario_id 
                WHERE ur.rol_id = 2";
        $result = $this->conexion->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function agregarTrabajador($nombre, $codigo, $password, $email) {
    	$this->conexion->begin_transaction();
    	try {
        	$stmt = $this->conexion->prepare("INSERT INTO usuarios (nombre, codigo_trabajador, passwordUser, email) VALUES (?, ?, ?, ?)");
        	$stmt->bind_param("ssss", $nombre, $codigo, $password, $email);
        	$stmt->execute();
        	$usuarioId = $stmt->insert_id;
        	$rolId = 2; // Rol de trabajador
        	$stmt = $this->conexion->prepare("INSERT INTO usuario_roles (usuario_id, rol_id) VALUES (?, ?)");
        	$stmt->bind_param("ii", $usuarioId, $rolId);
        	$stmt->execute();
        	$this->conexion->commit();
    	} catch (Exception $e) {
                $this->conexion->rollback();
        	throw $e;
    	}
    }

    public function actualizarTrabajador($id, $nombre, $codigo, $password, $email) {
        $stmt = $this->conexion->prepare("UPDATE usuarios SET nombre = ?, codigo_trabajador = ?, passwordUser = ?, email = ? WHERE id = ?");
        $stmt->bind_param("ssssi", $nombre, $codigo, $password, $email, $id);
        $stmt->execute();
    }

    public function eliminarTrabajador($id) {
        $stmt = $this->conexion->prepare("DELETE FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
    }

    public function obtenerTrabajadorPorId($id) {
        $stmt = $this->conexion->prepare("SELECT id, nombre, codigo_trabajador, email FROM usuarios WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        return $stmt->get_result()->fetch_assoc();
    }

    public function desconectar() {
        $this->conexion->close();
    }

    public function __destruct() {
        $this->desconectar();
    }
}
?>
