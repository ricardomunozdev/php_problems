<?php
include '../config/sesion.php';
include 'class.php';
?>

<html>
    <head>
       <?php include '../config/head.php' ;?>
       <style type="text/css">
            form#busqueda{
                width: 50%;
                margin: 10px auto;
                border: 3px #1c26cf solid;
                padding: 20px;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
            #busqueda input{ margin-left: 15px}
            #busqueda label{ margin-left: 15px}
            #busqueda button{ margin-left: 15px}
           form#caja{
                width: 40%;
                margin: 10px auto;
                border: 3px #1c26cf solid;
                padding: 20px;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
           
           </style>
    </head>
    <body>
   
        <?php include '../config/menu.php' ;?>
        <br>
        <h1 class="text-center">Control de Caja</h1>
        <hr>
        <div class="text-center">
            <?php $objetodesactivarcaja=new caja();
                  $objetodesactivarcaja->desactivar();
                    ?>
            <br>
            <form class="text-center" id="busqueda" action="index.php" method="GET">
            <div class="form-inline">
                <label for="desde">Desde: </label>
                <input type="date" class="form-control" id="desde" name="desde" required="">
                <label for="hasta">Hasta: </label>
                <input type="date" class="form-control" id="hasta" name="hasta" required="">
                <button type="submit" class="btn btn-danger">Consultar</button>
            </div>
            </form>
        </div>
        
        <?php
        if(isset($_GET['desde'])){
            $objetomostrarB= new caja();
            $objetomostrarB->buscartotalcaja($_GET['desde'], $_GET['hasta']);
        }
        else{
        
        ?>
        <form id="caja" >
            <div class="form-group">
                <label for="importecaja">Dinero Inicial</label>
                <input type="text" class="form-control" id="importecaja" name="importecaja" value="$<?php $objetoCaja=new caja(); $objetoCaja->inicial(); ?>" readonly="">
            </div>
            <div class="form-group">
                <label for="ventas">Dinero de  Ventas</label>
                <input type="text" class="form-control" id="ventas" name="ventas" value="$<?php $objetoVentas=new caja(); $objetoVentas->ventas();  ?>" readonly="">                   
            </div>
            <div class="form-group">
                <label for="gastos">Gastos </label>
                <input type="text" class="form-control" id="gastos" name="gastos" value="$<?php $objetogasto=new caja(); $objetogasto->gastos(); ?>" readonly="">                   
            </div>
            <div class="form-group">
                <label for="total">Total </label>
                <input type="text" class="form-control" id="total" name="total" value="$<?php $objetoTotal=new caja(); $objetoTotal->totalcaja(); ?>" readonly="">
            </div>
                                              
        </form>
        <?php } ?>
        
    </body>
</html>


