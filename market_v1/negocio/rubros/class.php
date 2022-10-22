<?php

include '../conexion.php';

class registros extends conexion
{
    public $campos;
    public $consulta;
    public $recorrido;

    public function datos()
    {
        $this->consulta = $this->con->query("SELECT * FROM rubros");
        while ($this->recorrido = $this->consulta->fetch_array()) {
            echo '<tr>';
            echo '<td>' . $this->recorrido['idrubros'] . '</td>';
            echo '<td>' . $this->recorrido['nombrerubros'] . '</td>';
            echo '</tr>';
        }
    }
}

class registros2 extends conexion
{
    public $consulta;
    public $recorrido;

    public function datos2()
    {
        $this->consulta = $this->con->query("SELECT * FROM rubros");
        while ($this->recorrido = $this->consulta->fetch_array()) {
?>
            <tr>
                <td><?php echo $this->recorrido['idrubro']; ?></td>
                <td><?php echo $this->recorrido['nombrerubros']; ?></td>
                <td><a class="btn btn-success" href="formularioUpdateR.php?idr=
                       <?php echo $this->recorrido['idrubro']; ?>">Modificar</a></td>
                <td><a class="btn btn-danger" href="formularioEliminarR.php?idr=
                       <?php echo $this->recorrido['idrubro']; ?>">Eliminar</a></td>
            </tr>

        <?php
        }
    }
}

class registros3 extends conexion
{
    public $consulta;
    public $recorrido;
    public $buscar;

    public function datos3($bus)
    {
        $this->buscar = $bus;
        $this->consulta = $this->con->query("SELECT * FROM rubros where nombrerubros = '$this->buscar'");
        while ($this->recorrido = $this->consulta->fetch_array()) {
        ?>
            <tr>
                <td><?php echo $this->recorrido['idrubro']; ?></td>
                <td><?php echo $this->recorrido['nombrerubros']; ?></td>
                <td><a class="btn btn-success" href="formularioUpdateR.php?idr=
                       <?php echo $this->recorrido['idrubro']; ?>">Modificar</a></td>
                <a class="btn btn-danger" href="formularioEliminarR.php?idr=
                       <?php echo $this->recorrido['idrubro']; ?>">Eliminar</a></td>
            </tr>
        <?php
        }
    }
}

class nuevoRubro extends conexion
{
    public $nombreRubro;

    public function registrarRubro($nomR)
    {
        $this->nombreRubro = $nomR;

        $this->con->query("INSERT INTO rubros(nombrerubros) VALUES ('$this->nombreRubro')");
        $this->con->close();

        echo "<script>alert('Rubro Agregado Satisfactoriamente');"
            . "window.location.href='index.php';</script>";
    }
}

class datosRubro extends conexion
{
    public $idrubro;
    public $consulta;
    public $recorrido;

    public function mostrarRubro($idR)
    {
        $this->idrubro = $idR;
        $this->consulta = $this->con->query("SELECT * FROM rubros WHERE idrubro='$this->idrubro'");
        if ($this->recorrido = $this->consulta->fetch_array()) {
        ?>
            <form id="rubro" class="form-group" action="formularioUpdateR.php" method="POST">
                <input type="hidden" name="idrubro" value="<?php echo $this->recorrido['idrubro']; ?>">
                <div class="form-group">
                    <label>NOMBRE_RUBRO: </label>
                    <input type="text" class="form-control" name="nombrerubros" required="" value="<?php echo $this->recorrido['nombrerubros']; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Modificar Rubro">
                    <a class="btn btn-danger" href="index.php">Cancelar Formulario</a>
                </div>
            </form>
        <?php
        }
    }
}

class modificarRubro extends conexion
{
    public $nombrerubros;
    public $idrubro;

    public function modificar($idR, $nomR)
    {
        $this->nombrerubros = $nomR;
        $this->idrubro = $idR;

        $this->con->query("UPDATE rubros SET nombrerubros = '$this->nombrerubros' WHERE idrubro = '$this->idrubro'") or die($this->con->error());
        $this->con->close();

        echo "<script>alert('Rubro Modificado Satisfactoriamente');"
            . "window.location.href='index.php';</script>";
    }
}

class eliminarR extends conexion
{

    public $idrubro;

    public function eliminarRubro($idR)
    {

        $this->idrubro = $idR;


        $this->con->query("DELETE FROM rubros WHERE idrubro = '$this->idrubro'") or die($this->con->error());
        $this->con->close();

        echo "<script>alert('Rubro ELiminado Satisfactoriamente');"
            . "window.location.href='index.php';</script>";
    }
}

class datosEliminarR extends conexion
{
    public $idrubro;
    public $consulta;
    public $recorrido;

    public function eliminarR($idR)
    {
        $this->idrubro = $idR;
        $this->consulta = $this->con->query("SELECT * FROM rubros WHERE idrubro='$this->idrubro'");
        if ($this->recorrido = $this->consulta->fetch_array()) {
        ?>
            <form id="rubro" class="form-group" action="formularioEliminarR.php" method="POST">
                <input type="hidden" name="idrubro" value="<?php echo $this->recorrido['idrubro']; ?>">
                <div class="form-group">
                    <label>NOMBRE_RUBRO: </label>
                    <input type="text" class="form-control" name="nombrerubros" required=" 
                       " value="<?php echo $this->recorrido['nombrerubros']; ?>">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Eliminar Rubro">
                    <a class="btn btn-danger" href="index.php">Cancelar Formulario</a>
                </div>
            </form>
<?php
        }
    }
}

?>