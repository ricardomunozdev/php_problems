<form id="busqueda" action="index.php" method="GET" enctype="multipart/form-data" class="form-inline">
    <div class="row col">
        <div class="col-md-5 ">
            <h6>Busqueda por tipo</h6>
            <div class="form-group col-12">
                <label for="desde">Tipo &nbsp;&nbsp;</label>
                <select class="form-control" name="tipo">
                    <option value="">Seleccionar: </option>
                    <option value="dni">DNI</option>
                    <option value="apellido">Apellido</option>
                    <option value="telefono">Telefono</option>
                </select>
            </div>
            <div class="form-group col-12">
                <label for="usuario">Buscar &nbsp;&nbsp;</label>
                <input type="text" class="form-control" id="buscar" name="buscar" aria-describedby="buscarHelp">
            </div>
        </div>
        <div class="col-md-5 ">
            <h6>Busqueda por fecha de nacimiento</h6>
            <div class="form-group col-12">
                <label for="desde">Desde &nbsp;&nbsp;</label>
                <input type="date" class="form-control" name="desde" id="desde">
            </div>
            <div class="form-group col-12">
                <label for="hasta">Hasta &nbsp;&nbsp;</label>
                <input type="date" class="form-control" name="hasta" id="hasta">
            </div>
        </div>
        <div class="col-md-2 ">
            <button type="submit" class="btn btn-primary">Buscar</button>
        </div>
    </div>
</form>