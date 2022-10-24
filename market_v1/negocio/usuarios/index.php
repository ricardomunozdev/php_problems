<?php include '../config/head.php'; ?>
<br>
<div class="container-fluid">
    <div class="row ">
        <div class="col-6">
            <h2>Listado de Usuarios</h2>
            <a href="index.php">Listar todos</a>
        </div>
        <div class="col-6">
            <a href="formularioUsuario.php" class="btn btn-sm btn-outline-success float-right">
                Registrar Nuevo Usuario
            </a>
        </div>
    </div>
    <hr>


    <?php include '../views/usuarios/usuariosViewBuscador.php'; ?>
    <?php
    include '../controllers/usuariosController.php';
    $controller = new UsuariosController();

    if (isset($_GET['buscar']) && !empty($_GET['buscar'])) {
        $controller->getAll($_GET['buscar'], $_GET['tipo'], null, null);
    } elseif (isset($_GET['desde']) || isset($_GET['hasta'])) {
        $controller->getAll(null, null, $_GET['desde'], $_GET['hasta']);
    } else {
        $controller->getAll();
    }
    ?>
</div>
<?php include '../config/footer.php'; ?>