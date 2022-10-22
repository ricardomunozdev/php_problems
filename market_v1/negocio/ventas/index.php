<?php
include 'class.php';
if (!isset($_GET['idfactura'])) {
    $objetoFactura = new ventas();
    $objetoFactura->iniciarFacturas();
}
?>
<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">Nueva Venta</h1>
    <hr>
    <form id="busqueda" action="cargarventas.php" method="GET">
        <input type="hidden" name="idfactura" value="<?php echo $_GET['idfactura']; ?>">
        <input type="hidden" name="idregistrarme" value="<?php echo $_SESSION['idusu']; ?>">
        <div class="form-inline">
            <input class="form-control" type="text" name="buscar" placeholder="Ingrese Codigo Producto" required="">
            <input class="form-control btn btn-warning" type="submit" value="Consultar">
        </div>
    </form>
    <p class="text-center"><a class="btn btn-danger" onclick="return confirm ('¿Desea cancelar toda la factura?')" href="cancelar.php?idfactura=<?php echo $_GET['idfactura']; ?>">Cancelar Venta</a></p>
    <table class="table table-atriped table-borderred">
        <thead class="table-dark">
            <tr>
                <th>FACTURA</th>
                <th>CODIGO</th>
                <th>NOMBRE</th>
                <th>CANTIDAD</th>
                <th>PRECIO</th>
                <th>SUBTOTAL</th>
                <th>ACCIONES</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $objetoMostrar = new ventas();
            $objetoMostrar->mostrarDetalle($_GET['idfactura']);
            ?>
        </tbody>
    </table>
</body>

</html>