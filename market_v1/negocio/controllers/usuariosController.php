<?php

include_once('../models/usuariosModel.php');

class UsuariosController
{
    public function getAll()
    {
        $usuariosModel = new usuariosModel();
        $rows = $usuariosModel->getAll();
        // esto lo puedes hacer en una sola línea
        // $rows = (new usuariosModel())->getAll();

        if ($rows) {
            include_once('../views/usuarios/usuariosViewGetAll.php');
        } else {
            include_once('../views/getNan.php');
        }
    }
}
