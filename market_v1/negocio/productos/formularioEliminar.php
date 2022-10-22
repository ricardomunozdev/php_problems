<html>

<head>

    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">Eliminar Productos</h1>
    <form id="producto" action="formularioEliminar.php" method="POST">
        <input type="hidden" name="idproducto" value="<?php echo $_GET['idproducto']; ?>">
        <?php
        include 'class.php';
        if (!isset($_POST['idproducto'])) {
            $objetoProducto = new productos();
            $objetoProducto->mostrarModificar($_GET['idproducto']);
        }
        ?>
        <div>
            <button type="submit" class="btn btn-primary">ELIMINAR</button>
            <a href="index.php?pagina=1" class="btn btn-danger">CANCELAR</a>
        </div>
    </form>
    <?php
    if (isset($_POST['idproducto'])) {
        $objEliminar = new productos();
        $objEliminar->eliminarProductos($_POST['idproducto']);
    }
    ?>
</body>

</html>