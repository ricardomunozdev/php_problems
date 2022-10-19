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
        <?php
        include 'class.php';
        if(isset($_GET['idusuario'])){
            $objEliminar = new registros2();
            $objEliminar->eliminarpc($_GET['idusuario'],$_GET['idproveedor']);
        }
        ?>
    </body>
</html>