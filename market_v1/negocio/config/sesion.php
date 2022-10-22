<?php
    session_start();
    if(isset($_SESSION['user'])){
        echo 'Bienvenido: ';
        echo $_SESSION['nom'];
        echo '    <a href="../config/salir.php" class="btn btn-danger">Salir</a>';
    } else {
        header("location:../usuarios/index.php?pagina=1");
    }
