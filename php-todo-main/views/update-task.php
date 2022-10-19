<?php include_once './controllers/search-task.php' ?>

<div class="mb-3">
    <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $res['id'] ?>">
    <label for="task" class="form-label">Tarea:</label>
    <input type="text" class="form-control" id="task" id="task" name="task" value="<?php echo $res['task'] ?>">
</div>
<div class="mb-3">
    <label for="description" class="form-label">Tarea:</label>
    <textarea rows="5" class="form-control" id="description" name="description"><?php echo $res['description'] ?></textarea>
</div>
<div class="mb-3">
    <label for="expiration" class="form-label">Tarea:</label>
    <input type="date" class="form-control" id="expiration" name="expiration" value="<?php echo $res['expiration'] ?>">
</div>
<div class="text-end">
    <button type="submit" class="btn btn-success">EDITAR TAREA</button>
    <a href="index.php" class="btn btn-danger">CANCELAR</a>
</div>