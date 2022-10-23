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
}
