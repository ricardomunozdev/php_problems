<?php
include '../conexion.php';
class gastos extends conexion {
    public $idcaja;
    public $idusuario;
    public $importecaja;
    public $fechacaja;
    public $horacaja;
    public $consulta;
    public $datos;
    public $consulta2;
    public $datos2;
    public $total;
    public $total2;
    public $total3;
    public $fecha2; 
    public $fechacaja3;
    public $totalventas;
    public $totalcaja;
    public $desde;
    public $hasta;
    public $ventass;
    public $encontrados;
    public $fechacaja2;
    public $fecha3;
    public $desde2;
    public $hasta2;
    public $pagina;
    public $registroxpagina;
    public $consultatotalregistros;
    public $totalregistros;
    public $paginacion;

    public $detalle;
    public $totalgastos;
    public $fechagastos;
    public $horagastos;
    public $registros;
    public $idgastos;

    //metodo mostrar gastos
    public function mostrarproducto($pag){
        $this->pagina=$pag;
            $this->registroxpagina=3;
            $this->consultatotalregistros= $this->con->query("SELECT * FROM gastos");
            $this->totalregistros=ceil ($this->consultatotalregistros->num_rows/$this->registroxpagina);
            $this->paginacion="SELECT * FROM gastos LIMIT ".(($this->pagina-1)*$this->registroxpagina)." , ".$this->registroxpagina;
            $this->consulta=$this->con->query($this->paginacion);
            while($this->registros=$this->consulta->fetch_array()){
                ?>                                  
            <tr>
                <td><?php echo $this->registros['detalle']; ?></td>
                <td><?php echo $this->registros['totalgastos']; ?></td>
                <td><?php echo $this->registros['fechagastos']; ?></td>
                <td><?php echo $this->registros['horagastos']; ?></td>

                <td>
                    <a class="btn btn-success btn-sn btn-block" href="formulariomodificar.php?idgastos=<?php echo $this->registros['idgastos'] ?>">Modificar</a>
                    <a class="btn btn-danger btn-sn btn-block" onclick="return confirm ('Desea eliminar el registro aseleccionado?');"href="eliminar.php?idgastos=<?php echo $this->registros['idgastos'] ?>">Eliminar</a>

                </td>
            </tr>
            <?php
                        }
            ?>
              <tr>
                <td colspan="10">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item"><a class="page-link" href="index.php?pagina=1"><<</a></li>
                        <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']-1 ?>">Anterior</a></li>
             <?php
                for($this->i=1; $this->i<=$this->totalregistros; $this->i++){
             ?>
                        <li class="page-item <?php if($_GET['pagina']== $this->i){ echo 'active';} ?>"><a class="page-link" href="index.php?pagina=<?php echo $this->i; ?>"><?php echo $this->i; ?></a></li>
            <?php
        }
             ?>
                        <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina']+1 ?>">Siguiente</a></li>
                        <li class="page-item"><a class="page-link" href="index.php?pagina=<?php echo $this->i-1; ?>">>></a></li>
                    </ul>
                 </nav>

                          </td>
                      </tr>
                    <?php
                    $this->con->close();
    }
    
    
    //METODO PARA APERTURA DE GASTOS
    public function apertura($det,$tot){
        date_default_timezone_set("america/argentina/tucuman");
        $this->detalle=$det;
        $this->totalgastos=$tot;       
        $this->fechagastos=date("Y-m-d");
        $this->horagastos=date("H:i:s");
        $this->consulta= $this->con->query("INSERT INTO gastos (detalle,totalgastos,fechagastos,horagastos) VALUES ('$this->detalle','$this->totalgastos','$this->fechagastos','$this->horagastos')") or die ($this->con->error());//los values van respetando el orden de los campos puestos antes dentro del inster into   
                 
        $this->con->close();
        echo "<script>alert('Gastos Guardados');window.location.href='index.php?pagina=1';</script>";
    }
    
    
    public function mostrarmodificar($id){
          $this->idgastos=$id;
          $this->consulta= $this->con->query("SELECT * FROM gastos WHERE idgastos = '$this->idgastos'");
            if($this->registros= $this->consulta->fetch_array() ){
           
           ?>
            <div class="form-group">
                <label for="detalle">Detalle de Gastos</label>
                <input type="text" class="form-control" name="detalle" id="detalle" value="<?php echo $this->registros['detalle']; ?>" required="">
            </div> 
            <div class="form-group">
                <label for="totalgastos">Total Gastos $</label>
                <input type="number" step="any" class="form-control" name="totalgastos" id="totalgastos" value="<?php echo $this->registros['totalgastos']; ?>" required="">
            </div>
            <?php
              }
              $this->con->close();
    }
    
    public function guardar($id,$det,$tot){
        $this->idgastos=$id;
        $this->detalle=$det;
        $this->totalgastos=$tot;
        
        $this->con->query("UPDATE gastos SET detalle = '$this->detalle',totalgastos = '$this->totalgastos' WHERE idgastos = '$this->idgastos'") or die ($this->con->error());
        $this->con->close();
        echo "<script>alert('Gasto Modificado Satisfactoriamente');window.location.href='index.php?pagina=1';</script>";
        }
        
        public function buscarporfecha($des, $has){
            $this->desde=$des;
            $this->hasta=$has;
            
            
            $this->consulta=$this->con->query("SELECT * FROM gastos WHERE fechagastos BETWEEN '$this->desde' AND '$this->hasta'");
            while($this->registros=$this->consulta->fetch_array()){
                ?>
                <tr>
                    
                    <td><?php echo $this->registros['detalle']; ?></td>
                    <td><?php echo $this->registros['totalgastos']; ?></td>
                    <td><?php echo $this->registros['fechagastos']; ?></td>
                    <td><?php echo $this->registros['horagastos']; ?></td>
    
    <td>
        <a class="btn btn-success  " href="formulariomodificar.php?idgastos=<?php echo $this->registros['idgastos'] ?>">Modificar</a>
        <a class="btn btn-danger" onclick="return confirm ('Desea eliminar el registro seleccionado?');" href="eliminar.php?idgastos=<?php echo $this->registros['idgastos']; ?>" >Eliminar</a>
    </td>
</tr>
               <?php
            }
        }
 
       public function eliminar($id){
           $this->idgastos=$id;
           $this->con->query("DELETE FROM gastos WHERE idgastos='$this->idgastos'");
           $this->con->close();
           echo "<script>alert('Gasto Eliminado');window.location.href='index.php?pagina=1';</script>";
       }
   }
?> 