<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>

    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">Modificar Producto</h1>
    <form id="producto" action="formulariomodificar.php" method="POST">
        <input type="hidden" name="idgastos" value="<?php echo $_GET['idgastos']; ?>">
        <?php
        include 'class.php';
        if (isset($_GET['idgastos'])) {
            $objetoProducto = new gastos();
            $objetoProducto->mostrarmodificar($_GET['idgastos']);
        }
        ?>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="index.php?pagina=1" class="btn btn-danger">Cancelar</a>
        </div>
    </form>
    <?php
    if (isset($_POST['idgastos'])) {
        $objetoGuardar1 = new gastos();
        $objetoGuardar1->guardar($_POST['idgastos'], $_POST['detalle'], $_POST['totalgastos']);
    }
    ?>
</body>

</html>