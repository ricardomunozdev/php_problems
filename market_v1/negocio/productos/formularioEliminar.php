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
        <h1 class="text-center">Eliminar Productos</h1>
        <form id="producto" action="formularioEliminar.php" method="POST">
            <input type="hidden" name="idproducto" value="<?php echo $_GET['idproducto'];?>">
            <?php
            include 'class.php';
            if(!isset($_POST['idproducto'])){
            $objetoProducto = new productos();
            $objetoProducto->mostrarModificar($_GET['idproducto']);}
            ?>
            <div>
                <button type="submit" class="btn btn-primary">ELIMINAR</button>
                <a href="index.php?pagina=1" class="btn btn-danger">CANCELAR</a>
            </div>
        </form>
        <?php
            if(isset($_POST['idproducto'])){
                $objEliminar = new productos();
                $objEliminar->eliminarProductos($_POST['idproducto']);
            }
        ?>
    </body>
</html>
