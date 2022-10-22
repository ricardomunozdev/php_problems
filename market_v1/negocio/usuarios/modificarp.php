<?php
include 'class.php';
?>
<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?><br>
    <h1 class="text-center">Modificar Pago</h1>
    <hr>

    <?php
    if (isset($_GET['idproveedor'])) {
        $objMod = new registros2();
        $objMod->datospago($_GET['idproveedor']);
    }
    ?>
    <?php
    if (isset($_POST['actividad'])) {
        $objModificar = new registros2();
        $objModificar->modpago($_POST['idproveedor'], $_POST['idusuario'], $_POST['actividad'], $_POST['haber']);
    }
    ?>
</body>

</html>