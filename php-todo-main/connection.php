<?php

$URI = 'mysql:host=localhost;dbname=todophp';
$USER = 'root';
$PASS = '';


try {
    $conn = new PDO($URI, $USER, $PASS);
    //echo 'CONEXION ESTABLECIDA!';
} catch (PDOException $e) {
    print "¡Error!: " . $e->getMessage() . "<br/>";
    die();
}
