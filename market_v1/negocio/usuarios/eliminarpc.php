<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?>
    <?php
    include 'class.php';
    if (isset($_GET['idusuario'])) {
        $objEliminar = new registros2();
        $objEliminar->eliminarpc($_GET['idusuario'], $_GET['idproveedor']);
    }
    ?>
</body>

</html>