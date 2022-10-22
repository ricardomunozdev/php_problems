<?php
    include 'class.php';
    $objetoVentas = new ventas();
    $objetoVentas->cargarDetalle($_GET['buscar'],$_GET['idfactura'],$_GET['idregistrarme']);
