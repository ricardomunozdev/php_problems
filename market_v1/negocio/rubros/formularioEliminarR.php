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

    if (isset($_POST['idrubro'])) {
        $objetoMod = new eliminarR();
        $objetoMod->eliminarRubro($_POST['idrubro']);
    } else {
        $objetoDatos = new datosEliminarR();
        $objetoDatos->eliminarR($_GET['idr']);
    }
    ?>
</body>

</html>