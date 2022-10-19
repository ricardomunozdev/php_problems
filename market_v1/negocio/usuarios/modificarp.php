<?php
include '../config/sesion.php';
include 'class.php';
?>
<html>
    <head>
       <?php include '../config/head.php' ;?>
        <style type="text/css">
            form#modificarp{
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
        <?php include '../config/menu.php' ;?><br>      
        <h1 class="text-center">Modificar Pago</h1><hr>
        
        <?php
        if(isset($_GET['idproveedor'])){
            $objMod = new registros2();
            $objMod->datospago($_GET['idproveedor']);
        }
        ?>
            <?php
            if(isset($_POST['actividad'])){
                $objModificar = new registros2();
                $objModificar->modpago($_POST['idproveedor'],$_POST['idusuario'],$_POST['actividad'],$_POST['haber']);
            }
            ?>
    </body>
</html>