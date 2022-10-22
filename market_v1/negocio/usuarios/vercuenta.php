<?php
include 'class.php';
?>
<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">Cuenta del Proveedor</h1>
    <hr>
    <form id="busqueda" action="index.php" method="GET">
        <div class="form-inline">

        </div>
        <div class="form-inline">
            <label>Desde:</label>
            <input class="form-control" type="date" name="desde">
        </div>
        <div class="form-inline">
            <label>Hasta:</label>
            <input class="form-control" type="date" name="hasta">
            <input class="form-control btn btn-primary" type="submit" value="consultar">
        </div>
    </form>
    <p class="text-center">
        <a href="nuevopago.php?idusuario=<?php echo $_GET['idusuario']; ?>" class="btn btn-primary form-control">Nuevo Pago</a>
        <a href="nuevocredito.php?idusuario=<?php echo $_GET['idusuario']; ?>" class="btn btn-warning form-control">Nuevo Credito</a>
        <a href="index.php?pagina=1" class="btn btn-danger form-control">Volver</a>
    </p>
    <?php
    $objmostrarCuenta = new registros2;
    $objmostrarCuenta->mostrarcuentaproveedor($_GET['idusuario']);
    ?>
</body>

</html>