<?php
include '../conexion.php';
class factura extends conexion
{
    public $consulta;
    public $registros;
    public $recorrido;
    public $idfactura;
    public $idcliente;
    public $idvendedor;
    public $totventa;
    public $condicionventa;
    public $comprobante;
    public $fechaventa;
    public $registrante;
    public $estado;
    public $buscar;
    public $pagina;
    public $registroxpagina;
    public $consultatotalregistros;
    public $totalregistros;
    public $paginacion;


    public function mostrarFactura($pag)
    {
        $this->pagina = $pag;
        $this->registroxpagina = 3;
        $this->consultatotalregistros = $this->con->query("SELECT facturas.*, usuarios.idusuario, usuarios.nombre, usuarios.privilegio FROM facturas INNER JOIN usuarios ON facturas.idcliente = usuarios.idusuario");
        $this->totalregistros = ceil($this->consultatotalregistros->num_rows / $this->registroxpagina);
        $this->paginacion = "SELECT facturas.*, usuarios.idusuario, usuarios.nombre, usuarios.privilegio FROM facturas INNER JOIN usuarios ON facturas.idcliente = usuarios.idusuario LIMIT " . (($this->pagina - 1) * $this->registroxpagina) . " ,"
            . " " . $this->registroxpagina;
        $this->consulta = $this->con->query($this->paginacion);
        while ($this->registros = $this->consulta->fetch_array()) {
?>
            <tr>
                <td><?php echo $this->registros['idfactura']; ?></td>
                <td><?php echo $this->registros['nombre']; ?></td>
                <td><?php echo $this->registros['idvendedor']; ?></td>
                <td><?php echo $this->registros['totalventa']; ?></td>
                <td><?php echo $this->registros['condicionventa']; ?></td>
                <td><?php echo $this->registros['comprobantetarjeta']; ?></td>
                <td><?php echo $this->registros['fechaventa']; ?></td>
            </tr>
        <?php
        }

        ?>
        <tr>
            <td colspan="7" class="text-center">
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

    public function buscarFactura($bus)
    {
        $this->buscar = $bus;

        $this->consulta = $this->con->query("SELECT facturas.*, usuarios.idusuario, usuarios.nombre, usuarios.privilegio FROM facturas INNER JOIN usuarios ON facturas.idcliente = usuarios.idusuario WHERE facturas.idfactura ='$this->buscar'");
        while ($this->recorrido = $this->consulta->fetch_array()) {
        ?>
            <tr>
                <td><?php echo $this->recorrido['idfactura']; ?></td>
                <td><?php echo $this->recorrido['nombre']; ?></td>
                <td><?php echo $this->recorrido['idvendedor']; ?></td>
                <td><?php echo $this->recorrido['totalventa']; ?></td>
                <td><?php echo $this->recorrido['condicionventa']; ?></td>
                <td><?php echo $this->recorrido['comprobantetarjeta']; ?></td>
                <td><?php echo $this->recorrido['fechaventa']; ?></td>
            </tr>
<?php
        }
    }
}
