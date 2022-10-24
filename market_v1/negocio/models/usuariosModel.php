<?php

include_once('conexion.php');

class UsuariosModel extends conexion
{
    private $rows = array();

    public function getAll()
    {
        $this->consulta = $this->con->query("SELECT * FROM usuarios");
        while ($result = $this->consulta->fetch_object()) {
            $this->rows[] = $result;
        }
        return $this->rows;
    }

    public function buscarPorTipo($buscar, $tipo)
    {

        switch ($tipo) {
            case 'dni':
                $this->consulta = $this->con->query("SELECT * FROM usuarios where dni = '$buscar'");
                break;
            case 'apellido':
                $this->consulta = $this->con->query("SELECT * FROM usuarios where apellido LIKE '%$buscar%'");
                break;
            case 'telefono':
                $this->consulta = $this->con->query("SELECT * FROM usuarios where telefono LIKE '%$buscar%'");
                break;
        }

        while ($result = $this->consulta->fetch_object()) {
            $this->rows[] = $result;
        }
        return $this->rows;
    }

    public function buscarPorFecha($desde, $hasta)
    {
        $this->consulta = $this->con->query("SELECT * FROM usuarios WHERE nacimiento BETWEEN '$desde' AND '$hasta'");

        while ($result = $this->consulta->fetch_object()) {
            $this->rows[] = $result;
        }
        return $this->rows;
    }
}
