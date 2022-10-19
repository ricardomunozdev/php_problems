<?php

include_once './controllers/consult.php';

foreach ($res as $data) :

?>

    <tr>
        <td><?php echo $data['task'] ?></td>
        <td><?php echo $data['description'] ?></td>
        <td><?php echo $data['expiration'] ?></td>
        <td>
            <a href="index.php?id=<?php echo $data['id'] ?>"><i class="fa-regular fa-pen-to-square text-primary mx-1"></i></a>
            <a href="delete.php?id=<?php echo $data['id'] ?>" onclick="return confirm('¿Desea eliminar la tarea?')"><i class="fa-solid fa-trash text-danger mx-1"></i></a>
        </td>
    </tr>

<?php endforeach ?>