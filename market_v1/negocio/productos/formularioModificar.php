<?php include '../config/sesion.php' ?>
<html>
    <head>
        
        <?php include '../config/head.php'; ?>
        <style type="text/css">
            form#producto{
                width: 40%;
                margin: 0 auto;
                border: 3px #1c26cf solid;
                padding: 20px;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
        </style>
    </head>
    <body>
        <?php include '../config/menu.php';?>
        <br>
        <h1 class="text-center">Modificar Productos</h1>
        <form id="producto" action="formularioModificar.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="idproducto" value="<?php echo $_GET['idproducto'];?>">
            <?php
            include 'class.php';
            if(!isset($_POST['idproducto'])){
            $objetoProducto = new productos();
            $objetoProducto->mostrarModificar($_GET['idproducto']);}
            ?>
            <div class="form-group">
                <label for="foto">FOTO DEL PRODUCTO</label>
                <input type="file" class="form-control" id="foto" name="foto">
            </div>
            <div>
                <button type="submit" class="btn btn-primary">MODIFICAR</button>
                <a href="index.php?pagina=1" class="btn btn-danger">CANCELAR</a>
            </div>
        </form>
        <?php
            if(isset($_POST['nombreproducto'])){
                $objModificar = new productos();
                $objModificar->modificarProductos($_POST['idproducto'], $_POST['nombreproducto'], $_POST['descripcion'], $_POST['codigo'], $_POST['stock'], $_POST['preciocompra'], $_POST['precioventa'],$_POST['idrubro']);
            
                $ubicaciontemporal = $_FILES['foto']['tmp_name'];
            if(move_uploaded_file($ubicaciontemporal,'fotos/'.$_POST['codigo'])){
                echo "<script>alert('Producto Modificado Satisfactoriamente');"
                ."window.location.href='index.php?pagina=1';</script>";
            }
        }
        ?>
    </body>
</html>
