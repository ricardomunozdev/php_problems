<?php

include_once './connection.php';

try {
    if ($_GET) {
        $id = $_GET['id'];

        $query = "SELECT * FROM tasks WHERE id=?";
        $sent = $conn->prepare($query);
        $sent->execute(array($id));

        $res = $sent->fetch();
        
    }
} catch (PDOException $e) {
    'TASK_NOT_EXIST' . $e->getMessage() . '<br>';
    die();
}
