<?php
include '../config/sesion.php';
include 'class.php';
?>
<html>
    <head>
       <?php include '../config/head.php' ;?>
        <style type="text/css">
            form#pago{
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
        <h1 class="text-center">Nuevo Pago</h1><hr>
        <form id="pago" action="nuevopago.php" method="POST">
            <input type="hidden" name="idusuario" value="<?php echo $_GET['idusuario'];?>">
            <div class="form-group">
                <label>Actividad: </label>
                <input type="text" class="form-control" name="actividad" required="">
            </div>
            <div class="form-group">
                <label>Pago: </label>
                <input type="number" step="any" class="form-control" name="haber" required="">
            </div>
            <div>
                <input type="submit" class="btn btn-primary" value="Registrar pago">
                <a class="btn btn-danger" href="vercuenta.php?idusuario=<?php echo $_GET['idusuario'];?>">Cancelar</a>         
            </div>
        </form> 
            <?php
            if(isset($_POST['actividad'])){
                $objetoNuevo = new registros2();
                $objetoNuevo->guardar($_POST['idusuario'],$_POST['actividad'],$_POST['haber']);
            }
            ?>
    </body>
</html>