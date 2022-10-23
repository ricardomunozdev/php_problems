<?php include '../config/head.php'; ?>
<br>
<div class="row mx-sm-3 ">
    <div class="col-6">
        <h1>Listado de Usuarios</h1>
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
$controller->getAll();
?>
<?php include '../config/footer.php'; ?>