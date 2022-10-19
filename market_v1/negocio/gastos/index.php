<?php
include '../config/sesion.php';
?>
<html>
    <head>
       <?php include '../config/head.php' ;?>
       <style>
            form#busqueda{
                width: 50%;
                margin: 10px auto;
                border: 3px #1c26cf solid;
                padding: 20px;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
            form#busqueda input{margin-left: 15px}
            form#busqueda button{margin-left: 15px}
            form#busqueda label{margin-left: 15px}
        </style>
    </head>
    <body>
   
        <?php include '../config/menu.php' ;?>
        <br>
        <h1 class="text-center">Listados de Gastos</h1>
        <hr>
       <form id="busqueda" action="index.php" method="GET">
            <div class="form-inline">
            <label for="desde">Desde</label>
            <input type="date" class="form-control" id="desde" name="desde" required="">
            <label for="hasta">Hasta</label>
            <input type="date" class="form-control" id="hasta" name="hasta" required="">
            <button type="submit" class="btn btn-danger">Consultar</button>
            </div>
            </form>
        <p class="text-center"><a href="formulariogastos.php" class="btn btn-warning">Registrar Nuevo Gasto</a></p>
        <table class="table table-atriped table-borderred">
            <thead class="table-dark">
                <tr>
                    <th>DETALLE DEL GASTOS</th>
                    <th>IMPORTE GASTOS</th>           
                    <th>FECHA</th>
                    <th>HORA</th>                    
                    <th>ACCIONES</th>
               </tr>
            </thead>
            <tbody>  
               <?php  
               include 'class.php';
               if(isset($_GET['desde'])){
            $objetomostrarB= new gastos();
            $objetomostrarB->buscarporfecha($_GET['desde'], $_GET['hasta']);
        }
               else{
                   if(isset($_GET['pagina'])){
                  $objetoMostrart=new gastos();
                  $objetoMostrart->mostrarproducto($_GET['pagina']);
                   }
              }               
               ?>
            </tbody>
        </table>
    </body>
</html>