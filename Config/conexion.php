<?php
class Conexion {
    private $host = 'localhost';
    private $db_name = 'gestion';
    private $username = 'gestion';
    private $password = 'Gfghftg3434@@';
    private $conexion;

    public function conectar() {
        $this->conexion = new mysqli($this->host, $this->username, $this->password, $this->db_name);

        if ($this->conexion->connect_error) {
            die("Error de conexión: " . $this->conexion->connect_error);
        }

        return $this->conexion;
    }

    public function desconectar() {
        if ($this->conexion) {
            $this->conexion->close();
        }
    }
}
?>
