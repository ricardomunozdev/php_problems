<?php

include_once './connection.php';

try {

    $query = 'SELECT * FROM tasks';
    $sent = $conn->prepare($query);
    $sent->execute();
    $res = $sent->fetchAll();
    
} catch (PDOException $e) {
    echo 'ERROR_CONSULT' . $e->getMessage() . '<br>';
    die();
}
