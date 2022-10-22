<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">Nuevo Productos</h1>
    <form id="producto" action="formularioProductos.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="idusuario" value="<?php echo $_SESSION['idusu']; ?>">
        <div class="form-group">
            <label for="nombre">NOMBRE DEL PRODUCTO</label>
            <input type="text" class="form-control" name="nombreproducto" id="nombre" required="">
        </div>
        <div class="form-group">
            <label for="descripcion">DESCRIPCION</label>
            <input type="text" class="form-control" name="descripcion" id="descripcion" required="">
        </div>
        <div class="form-group">
            <label for="codigo">CODIGO</label>
            <input type="text" class="form-control" name="codigo" id="codigo" required="">
        </div>
        <div class="form-group">
            <label for="stock">CANTIDAD</label>
            <input type="number" class="form-control" name="stock" id="codigo" required="">
        </div>
        <div class="form-group">
            <label for="preciocompra">PRECIO COMPRA</label>
            <input type="number" step="any" class="form-control" name="preciocompra" id="preciocompra" required="">
        </div>
        <div class="form-group">
            <label for="precioventa">PRECIO VENTA</label>
            <input type="number" step="any" class="form-control" name="precioventa" id="precioventa" required="">
        </div>
        <div class="form-group">
            <label for="idrubro">RUBRO</label>
            <select class="form-control" name="idrubro" required="">
                <option value="">Seleccionar: </option>
                <?php
                include 'class.php';
                $objproductos = new productos();
                $objproductos->rubros();
                ?>
            </select>
        </div>
        <div class="form-group">
            <label form="foto">FOTO DEL PRODUCTO</label>
            <input type="file" class="form-control" id="foto" name="foto" required="">
        </div>
        <div>
            <button type="submit" class="btn btn-primary">GUARDAR</button>
            <a href="index.php?pagina=1" class="btn btn-danger">CANCELAR</a>
        </div>
    </form>
    <?php
    if (isset($_POST['nombreproducto'])) {
        $objguardar = new productos();
        $objguardar->guardarProductos($_POST['nombreproducto'], $_POST['descripcion'], $_POST['codigo'], $_POST['stock'], $_POST['preciocompra'], $_POST['precioventa'], $_POST['idrubro'], $_POST['idusuario']);

        $ubicaciontemporal = $_FILES['foto']['tmp_name'];
        if (move_uploaded_file($ubicaciontemporal, 'fotos/' . $_POST['codigo'])) {
            echo "<script>alert('Producto Agregado Satisfactoriamente');"
                .   "window.location.href='index.php?pagina=1';</script>";
        }
    }
    ?>
</body>

</html>