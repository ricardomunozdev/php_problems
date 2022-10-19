<?php

include_once './connection.php';

try {

    if ($_GET) {

        $id = $_GET['id'];
        $task = $_GET['task'];
        $description = $_GET['description'];
        $expiration = $_GET['expiration'];

        $query = 'UPDATE tasks SET task=?,description=?,expiration=? WHERE id=?';
        $sent = $conn->prepare($query);
        $sent->execute(array($task, $description, $expiration, $id));
        header('location:index.php');
    }
} catch (PDOException $e) {
    echo 'ERROR_CONSULT' . $e->getMessage() . '<br>';
    die();
}
