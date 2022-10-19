<?php

include_once './connection.php';

try {

    if ($_POST) {
        $task = $_POST['task'];
        $description = $_POST['description'];
        $expiration = $_POST['expiration'];

        $query = 'INSERT INTO tasks(task,description,expiration) VALUES (?,?,?)';
        $sent = $conn->prepare($query);
        $sent->execute(array($task, $description, $expiration));

        header('location:index.php');
    }
} catch (PDOException $e) {
    echo 'ERROR_CONSULT' . $e->getMessage() . '<br>';
    die();
}
