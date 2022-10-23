<?php

include_once('../models/usuariosModel.php');

class UsuariosController
{
    public function getAll()
    {
        $usuariosModel = new usuariosModel();
        $getAll = $usuariosModel->getAll();
        // esto lo puedes hacer en una sola línea
        // $rows = (new usuariosModel())->getAll();

        foreach ($getAll as $key => $result) {

            switch ($result->privilegio) {
                case 1:
                    $result->privilegio = 'Administrador';
                    break;
                case 2:
                    $result->privilegio =  'Estandar';
                    break;
                case 3:
                    $result->privilegio =  'Cliente';
                    break;
                case 4:
                    $result->privilegio =  'Empleado';
                    break;
                case 5:
                    $result->privilegio =  'Proveedor';
                    break;
                case 6:
                    $result->privilegio =  'Limitado';
                    break;
                default:
                    $result->privilegio =  '';
                    break;
            }

            $result->nacimiento =  (new DateTime($result->nacimiento))->format("d-m-Y");

            $result->botones = "";
            if (5 === (int)$result->privilegio) {
                $result->botones .= "<a class=\"btn btn-primary\" href=\"vercuenta.php?idusuario={$result->idusuario}\">Ver cuenta</a>";
            }

            $result->botones .= "<a class=\"btn btn-success\" href=\"formularioUpdate.php?idusuario={$result->idusuario}\">Modificar</a>";
            $result->botones .= "<a class=\"btn btn-danger\" onclick=\"return confirm ('&iquest;Desea eliminar el registro seleccionado?');\" href=\"formularioEliminar.php?idusuario={$result->idusuario}\"> Eliminar</a>";

            $rows[] = $result;
        }

        if ($rows) {
            include_once('../views/usuarios/usuariosViewGetAll.php');
        } else {
            include_once('../views/getNan.php');
        }
    }
}
