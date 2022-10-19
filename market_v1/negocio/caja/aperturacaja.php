<?php include '../config/sesion.php' ?>
<?php include 'class.php'; ?>
<html>
    <head>        
        <?php include '../config/head.php'; ?>
         <style type="text/css">
            form#caja{
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
        <?php include '../config/menu.php';?>
        <br>
        <h1 class="text-center">Apertura Caja</h1>
        <hr>
        <form id="caja" action="aperturacaja.php" method="GET">
            <input type="hidden" name="idusuario" value="<?php echo $_SESSION['idusu'];?>">
            <div class="form-group">
                <label for="importecaja">Dinero Inicial</label>
                <input class="form-control" step="any" type="number" name="importecaja" id="importecaja">
            </div>
            <div class="form-group">
                <label for="fechacaja">Fecha Caja</label>
                <input class="form-control" readonly="" type="text" name="fechacaja" id="fechacaja"  value="<?php date_default_timezone_set('America/Argentina/Tucuman'); echo date('Y-m-d');?>">
            </div>
            <div class="form-group">
                <label for="horainicial">Hora Inicial</label>
                <input class="form-control" readonly="" type="text" name="horainicial" id="horainicial" value="<?php date_default_timezone_set('America/Argentina/Tucuman'); echo date('H:i:s');?>">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">REGISTRAR</button>
                <a href="index.php" class="btn btn-danger">CANCELAR</a>
            </div>
        </form>
        <?php
        if(isset($_GET['importecaja'])){
            $objeto1 = new caja();
            $objeto1->apertura($_GET['idusuario'], $_GET['importecaja']);
        }
        ?>
    </body>
</html>
