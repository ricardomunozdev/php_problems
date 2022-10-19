<?php include '../config/sesion.php' ?>
<html>
    <head>        
        <?php include '../config/head.php'; ?>
        <style type="text/css">
            form#usuario{
                width: 40%;
                margin: 0 auto;
                border: 3px #1c26cf solid;
                padding: 20px;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
            </style>
    </head>
    <body>
        <?php include '../config/menu.php'; ?>
        <br>
        <h1 class="text-center">Eliminar Usuario</h1>
        <hr> 
        <?php
        include 'class.php';
                
        if(isset($_POST['nombre'])){
            $objetoMod = new eliminar();
            $objetoMod->eliminarUsuario($_POST['idusuario']);
        }
        else {
        $objetoDatos = new datosEliminar();
        $objetoDatos->eliminar($_GET['idusuario']);
 }
        ?>
    </body>
</html>