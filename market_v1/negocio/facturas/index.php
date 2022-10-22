<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">Facturas Emitidas</h1>
    <hr>
    <br>
    <form id="busqueda" method="GET">
        <div class="form-inline">
            <input class="form-control" type="text" name="buscar" placeholder="Codigo de Factura" required="">
            <input class="form-control btn btn-primary" type="submit" value="Consultar">
            <a class="text-center btn btn-danger" href="index.php?pagina=1">Volver</a>
        </div>
    </form>
    <table class="table table-atriped table-borderred">
        <thead class="table-dark">
            <tr>
                <th>FACTURA</th>
                <th>CLIENTE</th>
                <th>VENDEDOR</th>
                <th>TOTAL_VENTA</th>
                <th>CONDICIONVENTA</th>
                <th>COMPROBANTE</th>
                <th>FECHA_VENTA</th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'class.php';
            if (isset($_GET['buscar'])) {
                $buscarFactura = new factura();
                $buscarFactura->buscarFactura($_GET['buscar']);
            } else if (isset($_POST['idfactura'])) {
                $objfactura = new factura();
                $objfactura->mostrarFactura();
            } else {
                if (isset($_GET['pagina'])) {
                    $objPag = new factura();
                    $objPag->mostrarFactura($_GET['pagina']);
                }
            }
            ?>
        </tbody>
    </table>
</body>

</html>