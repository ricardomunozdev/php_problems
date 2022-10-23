<?php include 'class.php'; ?>
<?php include '../config/head.php'; ?>
<br>
<div class="row mx-sm-3 ">
    <div class="col-6">
        <h1>Cuenta del Proveedor</h1>
    </div>
    <!-- <div class="col-6">
        <a href="formularioUsuario.php" class="btn btn-sm btn-outline-success float-right">
            Registrar Nuevo Usuario
        </a>
    </div> -->
</div>
<hr>
<form id="busqueda" action="index.php" method="GET" class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
        <label>Desde:</label>
        <input class="form-control" type="date" name="desde">
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label>Hasta:</label>
        <input class="form-control" type="date" name="hasta">
        <input class="form-control btn btn-primary" type="submit" value="consultar">
    </div>
</form>

<form id="busqueda" action="index.php" method="GET" class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
        <a href="nuevopago.php?idusuario=<?php echo $_GET['idusuario']; ?>" class="btn btn-primary form-control">Nuevo Pago</a>
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <a href="nuevocredito.php?idusuario=<?php echo $_GET['idusuario']; ?>" class="btn btn-warning form-control">Nuevo Credito</a>
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <a href="index.php?pagina=1" class="btn btn-danger form-control">Volver</a>
    </div>
</form>
<?php
$objmostrarCuenta = new registros2;
$objmostrarCuenta->mostrarcuentaproveedor($_GET['idusuario']);
?>
</body>

</html>