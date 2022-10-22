<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">Listado de Productos</h1>
    <hr>
    <form id="busqueda" action="index.php" method="GET">
        <div>
            <a href="index.php?pagina=1" class=" btn btn-danger">Regresar</a>
            <a href="formularioProductos.php" class="btn btn-warning">Registrar Nuevo Producto</a>
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
            $objStock = new productos();
            $objStock->stock0();
            ?>
        </tbody>
    </table>
</body>

</html>