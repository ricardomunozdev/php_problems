<?php
include 'class.php';
?>
<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?><br>
    <h1 class="text-center">Nuevo Credito</h1>
    <hr>
    <form id="credito" action="nuevocredito.php" method="POST">
        <input type="hidden" name="idusuario" value="<?php echo $_GET['idusuario']; ?>">
        <div class="form-group">
            <label>Actividad: </label>
            <input type="text" class="form-control" name="actividad" required=""><br>
        </div>
        <div class="form-group">
            <label>Debe: </label>
            <input type="number" step="any" class="form-control" name="debe" required="">
        </div>
        <div>
            <input type="submit" class="btn btn-primary" value="Registrar Credito">
            <a class="btn btn-danger" href="vercuenta.php?idusuario=<?php echo $_GET['idusuario']; ?>">Cancelar</a>
        </div>
    </form>
    <?php
    if (isset($_POST['actividad'])) {
        $objetoNuevo = new registros2();
        $objetoNuevo->guardar2($_POST['idusuario'], $_POST['actividad'], $_POST['debe']);
    }
    ?>
</body>

</html>