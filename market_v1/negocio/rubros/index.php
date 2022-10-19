<?php include '../config/sesion.php' ?>
<html>
    <head>        
        <?php include '../config/head.php'; ?>
        <style>
            form#busqueda{
                width: 30%;
                margin: 10px auto;
                border: 3px #1c26cf solid;
                padding: 20px;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
            a{ margin-left: 20px}
            input{margin-left: 15px}
        </style>
    </head>
    <body>
        <?php include '../config/menu.php';?>
        <br>
        <h1 class="text-center">Listado de Rubros</h1>
        <hr>
        <form id="busqueda" action="index.php" method="GET">
            <div class="form-inline">
                <input class="form-control" type="text" name="buscar" placeholder="Ingrese Rubro" required="">
                <input class="form-control btn btn-primary" type="submit" value="Consultar">
            </div>            
        </form>
        <p class="text-center"><a href="formularioRubro.php" class="btn btn-warning text-center">Registrar Nuevo Rubro</a></p>
        <table class="table table-atriped table-borderred">
            <thead class="table-dark">
                <tr>
                    <th>IDRUBRO</th>
                    <th>NOMBRE_RUBRO</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'class.php';
                if(isset($_GET['buscar'])){
                   $objetoConsulta3 = new registros3();
                   $objetoConsulta3->datos3($_GET['buscar']); 
                } else {
                   $objetoConsulta2 = new registros2();
                   $objetoConsulta2->datos2();
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
