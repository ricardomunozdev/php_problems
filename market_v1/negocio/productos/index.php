<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">Listado de Productos</h1>
    <hr>
    <form id="busqueda" action="index.php" method="GET" enctype="multipart/form-data">
        <div class="form-inline">
            <input class="form-control" type="text" name="buscar" placeholder="Ingrese Datos" required="">
            <select class="form-control" name="tipo">
                <option value="">Seleccionar: </option>
                <option value="codigo">Codigo</option>
                <option value="nombre">Nombre</option>
                <option value="descripcion">Descripción</option>
            </select>
        </div><br>
        <div class="form-inline">
            <input class="form-control btn btn-primary" type="submit" value="consultar">
            <a href="stockcero.php" class=" btn btn-danger form-control">Stock Agotado</a>
            <a href="stock.php" class=" btn btn-success form-control">Stock < 10</a>
        </div>
    </form>
    <p class="text-center"><a href="formularioProductos.php" class="btn btn-warning">Registrar Nuevo Producto</a></p>
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
            if (isset($_GET['buscar'])) {
                $objetoBuscar = new productos();
                $objetoBuscar->buscar($_GET['buscar'], $_GET['tipo']);
            } else if (isset($_POST['idproducto'])) {
                $objMostrar = new productos();
                $objMostrar->mostrarProductos();
            } else {
                if (isset($_GET['pagina'])) {
                    $objPag = new productos();
                    $objPag->mostrarProductos($_GET['pagina']);
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>