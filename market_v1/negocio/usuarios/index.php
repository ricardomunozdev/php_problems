<?php include '../config/sesion.php'; ?>
<html>
    <head>        
        <?php include '../config/head.php'; ?>
        <style>
            form#busqueda{
                width: 33%;
                margin: 10px auto;
                border: 3px #1c26cf solid;
                padding: 20px;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
            form#busqueda input{margin-left: 15px}
            form#busqueda input[type="submit"]{margin-left: 50px}
            form#busqueda select{margin-left: 15px}
            form#busqueda label{margin-left: 15px}
        </style>
    </head>
    <body>
        <?php include '../config/menu.php';?>
        <br>
        <h1 class="text-center">Listado de Usuarios</h1>
        <hr>
        <form id="busqueda" action="index.php" method="GET" enctype="multipart/form-data">
            <div class="form-inline">
                <input class="form-control" type="text" name="buscar" placeholder="Ingrese Datos">
                <select class="form-control" name="tipo">
                    <option value="">Seleccionar: </option>
                    <option value="dni">DNI</option>
                    <option value="apellido">Apellido</option>
                    <option value="telefono">Telefono</option>
                </select>
            </div><br>
            <div class="form-inline">
                <label>Desde:</label>
                <input class="form-control" type="date" name="desde">
            </div><br>
            <div class="form-inline">
                <label>Hasta:</label>
                <input class="form-control" type="date" name="hasta">
                <input class="form-inline btn btn-danger" type="submit" value="Consultar">
            </div>
        </form>
        <p class="text-center"><a href="formularioUsuario.php" class="btn btn-warning">Registrar Nuevo Usuario</a></p>
        <table class="table table-atriped table-borderred text-center" style="margin: 10px 10px;">
            <thead class="table-dark">
                <tr>
                    <th>FOTO</th>
                    <th>IDUSUARIO</th>
                    <th>USUARIO</th>
                    <th>CONTRASEÑA</th>
                    <th>NOMBRE</th>
                    <th>APELLIDO</th>
                    <th>DNI</th>
                    <th>NACIMIENTO</th>
                    <th>PROVINCIA</th>
                    <th>LOCALIDAD</th>
                    <th>DIRECCION</th>
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
                if(isset($_GET['buscar'])  && $_GET['buscar']!=''){
                   $objetoConsulta3 = new registros3();
                   $objetoConsulta3->datos3($_GET['buscar'],$_GET['tipo']); 
                }else if(isset($_GET['desde'])){
                    $objetoCon4 = new registros3();
                    $objetoCon4->buscarporfecha($_GET['desde'], $_GET['hasta']);
                }
                    else {
                        if(isset($_GET['pagina'])){
                            $objetoConsulta2 = new registros2();
                            $objetoConsulta2->datos2($_GET['pagina']);
                        }
                }
                ?>
            </tbody>
        </table>
    </body>
</html>
