<?php
class Trabajador {
    private $id;
    private $nombre;
    private $codigoTrabajador;
    private $passwordUser;
    private $email;

    public function __construct($id, $nombre, $codigoTrabajador, $passwordUser, $email) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->codigoTrabajador = $codigoTrabajador;
        $this->passwordUser = $passwordUser;
        $this->email = $email;
    }

    public function getId() {
        return $this->id;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getCodigoTrabajador() {
        return $this->codigoTrabajador;
    }

    public function getPasswordUser() {
        return $this->passwordUser;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }

    public function setCodigoTrabajador($codigoTrabajador) {
        $this->codigoTrabajador = $codigoTrabajador;
    }

    public function setPasswordUser($passwordUser) {
        $this->passwordUser = $passwordUser;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}
?>
