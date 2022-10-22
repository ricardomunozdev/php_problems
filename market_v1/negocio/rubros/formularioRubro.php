<html>

<head>
    <?php include '../config/head.php'; ?>
</head>

<body>
    <?php include '../config/menu.php'; ?>
    <br>
    <h1 class="text-center">Registro de Nuevo Rubro</h1>
    <hr>
    <form id="rubro" class="form-group" action="formularioRubro.php" method="POST">
        <div class="form-group">
            <label>NOMBRE RUBRO</label>
            <input type="text" class="form-control" name="nombre" required="">
        </div>
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Registrar Rubro">
            <a class="btn btn-danger" href="index.php">Cancelar Formulario</a>
        </div>
    </form>

    <?php
    include 'class.php';
    if (isset($_POST['nombre'])) {
        $objetoNuevo = new nuevoRubro();
        $objetoNuevo->registrarRubro($_POST['nombre']);
    }
    ?>
</body>

</html>