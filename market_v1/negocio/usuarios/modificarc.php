<?php
include 'class.php';
?>
<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?><br>
    <h1 class="text-center">Modificar Credito</h1>
    <hr>

    <?php
    if (isset($_GET['idproveedor'])) {
        $objMod = new registros2();
        $objMod->datoscredito($_GET['idproveedor']);
    }
    ?>
    <?php
    if (isset($_POST['actividad'])) {
        $objModificar = new registros2();
        $objModificar->modcre($_POST['idproveedor'], $_POST['idusuario'], $_POST['actividad'], $_POST['debe']);
    }
    ?>
</body>

</html>