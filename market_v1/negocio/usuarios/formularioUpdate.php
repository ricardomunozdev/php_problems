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
        <h1 class="text-center">Modificar Usuario</h1>
        <hr> 
        <?php
        include 'class.php';
        if (isset($_POST['nombre'])){
            $objModUsu = new modificarUsuario();
            $objModUsu->modificar($_POST['idusuario'], $_POST['usuario'], $_POST['password'], $_POST['nombre'], $_POST['apellido'], $_POST['dni'], $_POST['nacimiento'], $_POST['provincia'], $_POST['localidad'], $_POST['direccion'], $_POST['telefono'], $_POST['email'], $_POST['sexo'], $_POST['privilegio']);
        
            $ubicaciontemporal = $_FILES['foto']['tmp_name'];
            if(move_uploaded_file($ubicaciontemporal,'fotos/'.$_POST['dni'])){
                  echo "<script>alert('Usuario Modificado Satisfactoriamente');window.location.href='index.php?pagina=1';</script>";
        
            }
            } else {
            $mostrarDatosUsuario = new datosModificarUsuario();
            $mostrarDatosUsuario->mostrarDatos($_GET['idusuario']);
        }
        ?>
    </body>
</html>