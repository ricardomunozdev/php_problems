<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">Eliminar Usuario</h1>
    <hr>
    <?php
    include 'class.php';

    if (isset($_POST['nombre'])) {
        $objetoMod = new eliminar();
        $objetoMod->eliminarUsuario($_POST['idusuario']);
    } else {
        $objetoDatos = new datosEliminar();
        $objetoDatos->eliminar($_GET['idusuario']);
    }
    ?>
</body>

</html>