<?php include '../config/sesion.php' ?>
<html>
    <head>
        <?php include '../config/head.php'; ?>
        <style type="text/css">
            form#usuario{
                width: 40%;
                margin: 0 auto;
                border: 3px #1c26cf solid;
                padding: 20px;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
        </style>
    </head>
    <body>
        <?php include '../config/menu.php'; ?>
        <br>
        <h1 class="text-center">Registro de Nuevo Usuario</h1>
        <hr>
        <form id="usuario" action="formularioUsuario.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label>USUARIO</label>
                <input type="text" class="form-control" name="usuario" required="">
                <input type="hidden" name="idusuario" value="<?php echo $_SESSION['idusu'];?>">
            </div>
            <div class="form-group">
                <label>CONTRASEÑA</label>
                <input type="text" class="form-control" name="password" required="">
            </div>
            <div class="form-group">
                <label>NOMBRE</label>
                <input type="text" class="form-control" name="nombre" required="">
            </div>
            <div class="form-group">
                <label>APELLIDO</label>
                <input type="text" class="form-control" name="apellido" required="">
            </div>
            <div class="form-group">
                <label>DNI</label>
                <input type="number" class="form-control" name="dni" required="">
            </div>
            <div class="form-group">
                <label>NACIMIENTO</label>
                <input type="date" class="form-control" name="nacimiento" required="">
            </div>
            <div class="form-group">
                <label>PROVINCIA</label>
                <input type="text" class="form-control" name="provincia" required="">
            </div>
            <div class="form-group">
                <label>LOCALIDAD</label>
                <input type="text" class="form-control" name="localidad" required="">
            </div>
            <div class="form-group">
                <label>DIRECCION</label>
                <input type="text" class="form-control" name="direccion" required="">
            </div>
            <div class="form-group">
                <label>TELEFONO</label>
                <input type="text" class="form-control" name="telefono" required="">
            </div>
            <div class="form-group">
                <label>EMAIL</label>
                <input type="text" class="form-control" name="email" required="">
            </div>
            <div class="form-group">
                <label>GENERO</label>
                <select class="form-control" name="sexo" required="">
                    <option value="">Seleccionar: </option><br>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
            <div class="form-group">
                <label>PRIVILEGIO</label>
                <select class="form-control" name="privilegio" required="">
                    <option value="">Seleccionar: </option><br>
                    <option value="1">Administrador</option>
                    <option value="2">Estandar</option>
                    <option value="3">Cliente</option>
                    <option value="4">Empleado</option>
                    <option value="5">Proveedor</option>
                    <option value="6">Limitado</option>
                </select>
            </div>
            <div class="form-group">
                <label for="foto">Foto del usuario</label>
                <input type="file" class="form-control" id="foto" name="foto" required="">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Registrar Usuario">
                <a class="btn btn-danger" href="index.php?pagina=1">Cancelar Formulario</a>
            </div>
        </form>
        
        <?php
        include 'class.php';
        if(isset($_POST['nombre'])){
            $objetoNuevo = new nuevoUsuario();
            $objetoNuevo->registrar($_POST['usuario'], $_POST['password'], $_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['nacimiento'], $_POST['provincia'], $_POST['localidad'], $_POST['direccion'], $_POST['telefono'], $_POST['email'], $_POST['sexo'], $_POST['privilegio']);
            
            $ubicaciontemporal = $_FILES['foto']['tmp_name'];
            if(move_uploaded_file($ubicaciontemporal,'fotos/'.$_POST['dni'])){
                  echo "<script>alert('Usuario Registrado Satisfactoriamente');window.location.href='index.php?pagina=1';</script>";
                   
                }
            }
        ?>
    </body>
</html>