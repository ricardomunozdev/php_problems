<form id="busqueda" action="index.php" method="GET" enctype="multipart/form-data" class="form-inline">
    <div class="form-group mx-sm-3 mb-2">
        <label for="usuario" class=" mb-2">Buscar </label>
        <input type="text" class="form-control" id="buscar" name="buscar" aria-describedby="buscarHelp"> <select class="form-control" name="tipo">
            <option value="">Seleccionar: </option>
            <option value="dni">DNI</option>
            <option value="apellido">Apellido</option>
            <option value="telefono">Telefono</option>
        </select>
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label for="desde">Desde </label>
        <input type="date" class="form-control" name="desde" id="desde">
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <label for="hasta">Hasta </label>
        <input type="date" class="form-control" name="hasta" id="hasta">
    </div>
    <button type="submit" class="btn btn-primary">Entrar</button>
</form>