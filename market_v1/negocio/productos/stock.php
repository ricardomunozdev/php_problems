<?php include '../config/sesion.php' ?>
<html>
    <head>        
        <?php include '../config/head.php'; ?>
        <style>
            form#busqueda{
                margin: 10px auto;
                padding: 20px;
            }
            form#busqueda a{margin-left: 10px}
        </style>
    </head>
    <body>
        <?php include '../config/menu.php';?>
        <br>
        <h1 class="text-center">Listado de Productos</h1>
        <hr>
        <form id="busqueda" action="index.php" method="GET">
            <div class="form-inline">
                <a  href="index.php?pagina=1" class=" btn btn-danger form-control">Regresar</a>
                <a href="formularioProductos.php" class="btn btn-warning form-control">Registrar Nuevo Producto</a>
            </div>            
        </form>
            
        <table class="table table-atriped table-borderred">
            <thead class="table-dark">
                <tr>
                    <th>FOTO</th>
                    <th>CODIGO</th>
                    <th>NOMBRE</th>
                    <th>DESCRIPCION</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO_COMPRA</th>
                    <th>PRECIO_VENTA</th>
                    <th>RUBRO</th>
                    <th>REGISTRANTE</th>
                    <th>FECHA</th>
                    <th>ACCIONES</th>
                </tr>
            </thead>
            <tbody>
               <?php
               include 'class.php';
               $objStock1 = new productos();
               $objStock1->stock();
               ?>
            </tbody>
        </table>
    </body>
</html>
