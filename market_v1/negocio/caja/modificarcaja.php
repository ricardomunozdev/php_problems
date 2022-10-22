<?php
include 'class.php';
?>

<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>

    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">MODIFICAR CAJA</h1>
    <hr>

    <form id="modificar" action="modificarcaja.php" method="POST">

        <div class="form-group">
            <label for="importecaja">Dinero Inicial</label>
            <?php
            if (!isset($_POST['idcaja'])) {
                $mostrarDatos = new caja();
                $mostrarDatos->datosmodificar($_GET['idcaja']);
            }
            ?>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Modificar</button>
            <a class="btn btn-danger" href="index.php">Cancelar</a>
        </div>

    </form>
    <?php
    if (isset($_POST['importecaja'])) {
        $objModificar = new caja();
        $objModificar->modificar($_POST['idcaja'], $_POST['importecaja']);
    }
    ?>
</body>

</html>