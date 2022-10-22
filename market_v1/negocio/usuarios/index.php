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
<form id="busqueda" action="index.php" method="GET" enctype="multipart/form-data" class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
        <label for="usuario" class=" mb-2">Buscar </label>
        <input type="text" class="form-control" id="buscar" name="buscar" aria-describedby="buscarHelp"> <select class="form-control" name="tipo">
            <option value="">Seleccionar: </option>
            <option value="dni">DNI</option>
            <option value="apellido">Apellido</option>
            <option value="telefono">Telefono</option>
        </select>
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label for="desde">Desde </label>
        <input type="date" class="form-control" name="desde" id="desde">
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label for="hasta">Hasta </label>
        <input type="date" class="form-control" name="hasta" id="hasta">
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
</form>


<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>FOTO</th>
                <!-- <th>IDUSUARIO</th> -->
                <th>USUARIO</th>
                <!-- <th>CONTRASEÑA</th> -->
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>DNI</th>
                <th>NACIMIENTO</th>
                <!-- <th>PROVINCIA</th> -->
                <!-- <th>LOCALIDAD</th> -->
                <!-- <th>DIRECCION</th> -->
                <th>TELEFONO</th>
                <th>EMAIL</th>
                <th>SEXO</th>
                <th>PRIVILEGIO</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            include 'class.php';
            if (isset($_GET['buscar'])  && $_GET['buscar'] != '') {
                $objetoConsulta3 = new registros3();
                $objetoConsulta3->datos3($_GET['buscar'], $_GET['tipo']);
            } else if (isset($_GET['desde'])) {
                $objetoCon4 = new registros3();
                $objetoCon4->buscarporfecha($_GET['desde'], $_GET['hasta']);
            } else {
                if (isset($_GET['pagina'])) {
                    $objetoConsulta2 = new registros2();
                    $objetoConsulta2->datos2($_GET['pagina']);
                }
            }
            ?>
        </tbody>
    </table>
</div>
<?php include '../config/footer.php'; ?>