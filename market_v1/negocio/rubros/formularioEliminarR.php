<?php include '../config/sesion.php' ?>
<html>
    <head>        
        <?php include '../config/head.php'; ?>
        <style type="text/css">
            form#rubro{
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
                
        if(isset($_POST['idrubro'])){
            $objetoMod = new eliminarR();
            $objetoMod->eliminarRubro($_POST['idrubro']);
        }
        else {
        $objetoDatos = new datosEliminarR();
        $objetoDatos->eliminarR($_GET['idr']);
 }
        ?>
    </body>
</html>