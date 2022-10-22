<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">Modificar Rubro</h1>
    <hr>
    <?php
    include '../rubros/class.php';


    if (isset($_POST['idrubro'])) {
        $objetoMod = new modificarRubro();
        $objetoMod->modificar($_POST['idrubro'], $_POST['nombrerubros']);
    } else {
        $objetoDatos = new datosRubro();
        $objetoDatos->mostrarRubro($_GET['idr']);
    }
    ?>
</body>

</html>