<?php
include '../conexion.php';

class productos extends conexion
{
    public $i;
    public $consulta;
    public $registros;
    public $nombreproducto;
    public $descripcion;
    public $codigo;
    public $stock;
    public $preciocompra;
    public $precioventa;
    public $fechaproducto;
    public $idrubro;
    public $idusuario;
    public $consultacodigo;
    public $existecodigo;
    public $codnompro;
    public $existecodnompro;
    public $idproducto;
    public $consulta2;
    public $registros2;
    public $pagina;
    public $registroxpagina;
    public $consultatotalregistros;
    public $paginacion;
    public $totalregistros;


    public function mostrarProductos($pag)
    {
        $this->pagina = $pag;
        $this->registroxpagina = 3;
        $this->consultatotalregistros = $this->con->query("SELECT producto.*, rubros.* FROM "
            . "producto INNER JOIN rubros ON producto.idrubro = rubros.idrubro ORDER BY nombreproducto ASC");
        $this->totalregistros = ceil($this->consultatotalregistros->num_rows / $this->registroxpagina);
        $this->paginacion = "SELECT producto.*, rubros.* FROM "
            . "producto INNER JOIN rubros ON producto.idrubro = rubros.idrubro LIMIT " . (($this->pagina - 1) * $this->registroxpagina) . " ,"
            . " " . $this->registroxpagina;
        $this->consulta = $this->con->query($this->paginacion);

        while ($this->registros = $this->consulta->fetch_array()) {
?>
            <tr>
                <td><img src="fotos/<?php echo $this->registros['codigo']; ?>" style="width: 100px; height: 100px; margin: 0"></td>
                <td><?php echo $this->registros['codigo']; ?></td>
                <td><?php echo $this->registros['nombreproducto']; ?></td>
                <td><?php echo $this->registros['descripcion']; ?></td>
                <td><?php echo $this->registros['stock']; ?></td>
                <td>$<?php echo $this->registros['preciocompra']; ?></td>
                <td>$<?php echo $this->registros['precioventa']; ?></td>
                <td><?php echo $this->registros['nombrerubros']; ?></td>
                <td><?php echo $this->registros['idusuario']; ?></td>
                <td><?php echo $this->registros['fechaproducto']; ?></td>
                <td>
                    <a class="btn btn-success btn-sm btn-block" href="formularioModificar.php?idproducto=<?php echo $this->registros['idproducto']; ?>">MODIFICAR</a>
                    <a class="btn btn-danger btn-sm btn-block" href="formularioEliminar.php?idproducto=<?php echo $this->registros['idproducto']; ?>">ELIMINAR</a>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="16" class="text-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="index.php?pagina=1">
                                <<< /a>
                        </li>
                        <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">Anterior</a></li>
                        <?php
                        for ($this->i = 1; $this->i <= $this->totalregistros; $this->i++) {
                        ?>
                            <li class="page-item <?php if ($_GET['pagina'] == $this->i) {
                                                        echo 'active';
                                                    } ?>"><a class="page-link" href="index.php?pagina=<?php echo $this->i; ?>"><?php echo $this->i; ?></a></li>
                        <?php
                        }
                        ?>
                        <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a></li>
                        <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $this->i - 1; ?>">>></a></li>
                    </ul>
                </nav>
            </td>
        </tr>
        <?php
        $this->con->close();
    }

    public function rubros()
    {
        $this->consulta = $this->con->query("SELECT * FROM rubros ORDER BY nombrerubros ASC");
        while ($this->registros = $this->consulta->fetch_array()) {
        ?>
            <option value="<?php echo $this->registros['idrubro']; ?>"><?php echo $this->registros['nombrerubros']; ?></option>
        <?php
        }
        $this->con->close();
    }

    public function guardarProductos($nomP, $des, $cod, $st, $prc, $prv, $idR, $idU)
    {
        date_default_timezone_set("america/argentina/tucuman");
        $this->nombreproducto = $nomP;
        $this->descripcion = $des;
        $this->codigo = $cod;
        $this->stock = $st;
        $this->preciocompra = $prc;
        $this->precioventa = $prv;
        $this->idrubro = $idR;
        $this->idusuario = $idU;
        $this->fechaproducto = date("Y-m-d H:i:s");

        $this->consultacodigo = $this->con->query("SELECT codigo FROM producto WHERE codigo = '$this->codigo'");
        $this->existecodigo = $this->consultacodigo->num_rows;
        $this->codnompro = $this->con->query("SELECT nombreproducto FROM producto WHERE nombreproducto = '$this->nombreproducto'");
        $this->existecodnompro = $this->codnompro->num_rows;

        if ($this->existecodigo > 0) {
            echo "<script>alert('El codigo del producto ya se encuentra registrado');history.back(-1);</script>";
        } else if ($this->existecodnompro) {
            echo "<script>alert('El nombre del producto ya se encuentra registrado');history.back(-1);</script>";
        } else {
            $this->consulta = $this->con->query("INSERT INTO producto(nombreproducto,descripcion,codigo,stock,preciocompra,precioventa,fechaproducto,idrubro,idusuario) VALUES ('$this->nombreproducto','$this->descripcion','$this->codigo','$this->stock','$this->preciocompra','$this->precioventa','$this->fechaproducto','$this->idrubro','$this->idusuario')") or die($this->con->error);
        }
        $this->con->close();
    }
    public function mostrarModificar($id)
    {
        $this->idproducto = $id;
        $this->consulta = $this->con->query("SELECT * FROM producto WHERE idproducto = '$this->idproducto'");
        if ($this->registros = $this->consulta->fetch_array()) {
        ?>
            <div class="form-group">
                <label for="nombre">NOMBRE DEL PRODUCTO</label>
                <input type="text" class="form-control" name="nombreproducto" id="nombre" value="<?php echo $this->registros['nombreproducto']; ?>" required="">
            </div>
            <div class="form-group">
                <label for="descripcion">DESCRIPCION</label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" value="<?php echo $this->registros['descripcion']; ?>" required="">
            </div>
            <div class="form-group">
                <label for="codigo">CODIGO</label>
                <input type="text" class="form-control" name="codigo" id="codigo" value="<?php echo $this->registros['codigo']; ?>" required="">
            </div>
            <div class="form-group">
                <label for="stock">CANTIDAD</label>
                <input type="number" class="form-control" name="stock" id="stock" value="<?php echo $this->registros['stock']; ?>" required="">
            </div>
            <div class="form-group">
                <label for="preciocompra">PRECIO COMPRA</label>
                <input type="number" step="any" class="form-control" name="preciocompra" id="preciocompra" value="<?php echo $this->registros['preciocompra']; ?>" required="">
            </div>
            <div class="form-group">
                <label for="precioventa">PRECIO VENTA</label>
                <input type="number" step="any" class="form-control" name="precioventa" id="precioventa" value="<?php echo $this->registros['precioventa']; ?>" required="">
            </div>
            <div class="form-group">
                <label for="idrubro">RUBRO</label>
                <select class="form-control" name="idrubro" required="">
                    <option value="0">Seleccionar: </option>
                    <?php
                    $this->consulta2 = $this->con->query("SELECT * FROM rubros ORDER BY nombrerubros ASC");
                    while ($this->registros2 = $this->consulta2->fetch_array()) {
                    ?>
                        <option value="<?php echo $this->registros2['idrubro']; ?>" <?php if ($this->registros2['idrubro'] == $this->registros['idrubro']) {
                                                                                        echo "selected='selected'";
                                                                                    } ?>><?php echo $this->registros2['nombrerubros']; ?></option>
                    <?php
                    }
                    ?>
                </select>
            </div>
        <?php
        }
        $this->con->close();
    }

    public function modificarProductos($idp, $nom, $desc, $cod, $stock, $pc, $pv, $idru)
    {
        $this->idproducto = $idp;
        $this->nombreproducto = $nom;
        $this->descripcion = $desc;
        $this->codigo = $cod;
        $this->stock = $stock;
        $this->preciocompra = $pc;
        $this->precioventa = $pv;
        $this->idrubro = $idru;


        $this->con->query("UPDATE producto SET nombreproducto='$this->nombreproducto',descripcion='$this->descripcion', codigo='$this->codigo',stock='$this->stock',preciocompra='$this->preciocompra',precioventa='$this->precioventa',idrubro='$this->idrubro' WHERE idproducto = '$this->idproducto'");
        echo "<script>alert('Producto Modificado Satisfactoriamente');window.location.href='index.php?pagina=1';</script>";
    }
    public function eliminarProductos($idp)
    {
        $this->idproducto = $idp;


        $this->con->query("DELETE FROM producto WHERE idproducto = '$this->idproducto'");
        echo "<script>alert('Producto Eliminado Satisfactoriamente');window.location.href='index.php?pagina=1';</script>";
    }
    public function stock0()
    {
        $this->consulta = $this->con->query("SELECT producto.*, rubros.* FROM producto INNER JOIN rubros ON producto.idrubro = rubros.idrubro WHERE producto.stock = 0 ORDER BY producto.nombreproducto ASC");
        while ($this->registros = $this->consulta->fetch_array()) {
        ?>
            <tr>
                <td><img src="fotos/<?php echo $this->registros['codigo']; ?>" style="width: 100px; height: 100px; margin: 0"></td>
                <td><?php echo $this->registros['codigo']; ?></td>
                <td><?php echo $this->registros['nombreproducto']; ?></td>
                <td><?php echo $this->registros['descripcion']; ?></td>
                <td><?php echo $this->registros['stock']; ?></td>
                <td>$<?php echo $this->registros['preciocompra']; ?></td>
                <td>$<?php echo $this->registros['precioventa']; ?></td>
                <td><?php echo $this->registros['nombrerubros']; ?></td>
                <td><?php echo $this->registros['idusuario']; ?></td>
                <td><?php echo $this->registros['fechaproducto']; ?></td>
                <td>
                    <a class="btn btn-success btn-sm btn-block" href="formularioModificar.php?idproducto=<?php echo $this->registros['idproducto']; ?>">MODIFICAR</a>
                    <a class="btn btn-danger btn-sm btn-block" href="formularioEliminar.php?idproducto=<?php echo $this->registros['idproducto']; ?>">ELIMINAR</a>
                </td>
            </tr>
        <?php
        }
        $this->con->close();
    }

    public function stock()
    {
        $this->consulta = $this->con->query("SELECT producto.*, rubros.* FROM producto INNER JOIN rubros ON producto.idrubro = rubros.idrubro WHERE producto.stock > 0 AND producto.stock < 10 ORDER BY producto.nombreproducto ASC");
        while ($this->registros = $this->consulta->fetch_array()) {
        ?>
            <tr>
                <td><img src="fotos/<?php echo $this->registros['codigo']; ?>" style="width: 100px; height: 100px; margin: 0"></td>
                <td><?php echo $this->registros['codigo']; ?></td>
                <td><?php echo $this->registros['nombreproducto']; ?></td>
                <td><?php echo $this->registros['descripcion']; ?></td>
                <td><?php echo $this->registros['stock']; ?></td>
                <td>$<?php echo $this->registros['preciocompra']; ?></td>
                <td>$<?php echo $this->registros['precioventa']; ?></td>
                <td><?php echo $this->registros['nombrerubros']; ?></td>
                <td><?php echo $this->registros['idusuario']; ?></td>
                <td><?php echo $this->registros['fechaproducto']; ?></td>
                <td>
                    <a class="btn btn-success btn-sm btn-block" href="formularioModificar.php?idproducto=<?php echo $this->registros['idproducto']; ?>">MODIFICAR</a>
                    <a class="btn btn-danger btn-sm btn-block" href="formularioEliminar.php?idproducto=<?php echo $this->registros['idproducto']; ?>">ELIMINAR</a>
                </td>
            </tr>
        <?php
        }
        $this->con->close();
    }

    public function buscar($bus, $tipo)
    {
        $this->buscar = $bus;
        $this->tipo = $tipo;

        switch ($this->tipo) {
            case 'codigo':
                $this->consulta = $this->con->query("SELECT producto.*, rubros.* FROM producto INNER JOIN rubros ON producto.idrubro = rubros.idrubro where producto.codigo = '$this->buscar'");
                break;
            case 'nombre':
                $this->consulta = $this->con->query("SELECT producto.*, rubros.* FROM producto INNER JOIN rubros ON producto.idrubro = rubros.idrubro where producto.nombreproducto LIKE '%$this->buscar%'");
                break;
            case 'descripcion':
                $this->consulta = $this->con->query("SELECT producto.*, rubros.* FROM producto INNER JOIN rubros ON producto.idrubro = rubros.idrubro where producto.descripcion LIKE '%$this->buscar%'");
        }

        while ($this->recorrido = $this->consulta->fetch_array()) {
        ?>
            <tr>
                <td><img src="fotos/<?php echo $this->recorrido['codigo']; ?>" style="width: 100px; height: 100px; margin: 0"></td>
                <td><?php echo $this->recorrido['codigo']; ?></td>
                <td><?php echo $this->recorrido['nombreproducto']; ?></td>
                <td><?php echo $this->recorrido['descripcion']; ?></td>
                <td><?php echo $this->recorrido['stock']; ?></td>
                <td>$<?php echo $this->recorrido['preciocompra']; ?></td>
                <td>$<?php echo $this->recorrido['precioventa']; ?></td>
                <td><?php echo $this->recorrido['nombrerubros']; ?></td>
                <td><?php echo $this->recorrido['idusuario']; ?></td>
                <td><?php echo $this->recorrido['fechaproducto']; ?></td>
                <td>
                    <a class="btn btn-success btn-sm btn-block" href="formularioModificar.php?idproducto=<?php echo $this->registros['idproducto']; ?>">MODIFICAR</a>
                    <a class="btn btn-danger btn-sm btn-block" href="formularioEliminar.php?idproducto=<?php echo $this->registros['idproducto']; ?>">ELIMINAR</a>
                </td>
            </tr>
<?php
        }
    }
}
