<?php
session_start();

include 'conexion.php';

class seguridad extends conexion
{
    public $usuario;
    public $password;
    public $consulta;
    public $datos;

    public function ingresar($user, $pass)
    {
        $this->usuario = $user;
        $this->password = $pass;
        $this->consulta = $this->con->query("SELECT * FROM usuarios WHERE usuario = '$this->usuario'"
            . "and password = '$this->password'");
        if ($this->datos = $this->consulta->fetch_array()) {
            $_SESSION['idusu'] = $this->datos['idusuario'];
            $_SESSION['user'] = $this->datos['usuario'];
            $_SESSION['nom'] = $this->datos['nombre'] . ", " . $this->datos['apellido'];
            $_SESSION['rol'] = $this->datos['privilegio'];
            header("location:usuarios/index.php?pagina=1");
        } else {
            echo "<script>alert('Usuario o Password Incorrectos');window.location.href='index.php';</script>";
        }
    }
}

$objValidar = new seguridad();
$objValidar->ingresar($_POST['usuario'], $_POST['password']);
