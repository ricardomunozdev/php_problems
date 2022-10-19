<?php
    include '../conexion.php';
    
    class ventas extends conexion{
        public $i;
        public $idproducto;
        public $cantidad;
        public $preciocompra;
        public $precioventa;
        public $codigo;
        public $consulta;
        public $registros;
        public $sumaidfactura;
        public $idfactura;
        public $facturadisponible;
        public $estado;
        public $cantidadventa;
        public $cantidaddisponible;
        public $subtotal;
        public $idregistrante;
        public $total;
        public $iddetalleventa;
        public $encontrado;
        public $consulta2;
        public $registros2;
        public $idcliente;
        public $idvendedor;
        public $condicion;
        public $comprobante;
        public $fechareg;
        public $cliente;
        public $totalinteres;

        public function iniciarFacturas() {
            date_default_timezone_set("america/argentina/tucuman");
            $this->consulta = $this->con->query("SELECT idfactura, estado FROM facturas ORDER BY idfactura DESC LIMIT 1");
            
            while($this->registros = $this->consulta->fetch_array()){
                $this->idfactura = $this->registros['idfactura'];
                $this->sumaidfactura = $this->idfactura + 1;
                $this->facturadisponible = $this->sumaidfactura;
                $this->estado = $this->registros['estado'];
                $this->fechareg = date("Y-m-d H:i:s");
                                
                if($this->estado == 0){
                    header("location:index.php?idfactura=$this->idfactura");
                }
                else {
                /*$this->con->query("INSERT INTO facturas(idfactura,estado) VALUES ('$this->facturadisponible','0')") or die($this->con->error);*/
                $this->con->query("INSERT INTO facturas(idfactura,idcliente,idvendedor,totalventa,condicionventa,comprobantetarjeta,fechaventa,idregistrarme,estado) VALUES ('$this->facturadisponible','0','0','0','0','0','$this->fechareg','0','0')")or die($this->con->error);
                header("location:index.php?idfactura=$this->idfactura");
                }          
            }
        }
        
        public function cargarDetalle($cod,$idf,$idr) {
            $this->idregistrante = $idr;
            $this->codigo = $cod;
            $this->idfactura = $idf;
            $this->consulta = $this->con->query("SELECT * FROM producto WHERE codigo ='$this->codigo'");
            
            $this->encontrado = $this->consulta->num_rows;
            
            if($this->encontrado>0){
               
            if($this->registros = $this->consulta->fetch_array()){
                $this->idproducto = $this->registros['idproducto'];
                $this->cantidad = $this->registros['stock'];
                $this->precioventa = $this->registros['precioventa'];
                if($this->cantidad == 0){
                    echo "<script>alert('El producto no tiene Stock');window.location.href='index.php?idfactura=$this->idfactura';</script>";
                }
                else{
                    echo $this->cantidadventa = 1;
                    echo $this->subtotal = $this->precioventa*$this->cantidadventa;
                    echo $this->cantidaddisponible = $this->cantidad-$this->cantidadventa;
                   
                   
                    $this->con->query("INSERT INTO detalleventa(idfactura,idproducto,cantidadventa,precio,subtotal,idregistrarme) VALUES ('$this->idfactura','$this->idproducto','$this->cantidadventa','$this->precioventa','$this->subtotal','$this->idregistrante')")or die($this->con->error);
                    $this->con->query("UPDATE producto SET stock = '$this->cantidaddisponible' WHERE idproducto = '$this->idproducto'");
                    header("location:index.php?idfactura=$this->idfactura");
                  }
                }
            }
            else{
                echo "<script>alert('El codigo ingresado no existe');window.location.href='index.php?idfactura=$this->idfactura';</script>";
            }
        }
        
        public function mostrardetalle($idf){
            $this->idfactura=$idf;
            $this->consulta= $this->con->query("SELECT detalleventa.*, producto.* FROM detalleventa INNER JOIN producto ON detalleventa.idproducto = producto.idproducto WHERE detalleventa.idfactura='$this->idfactura' ORDER BY detalleventa.iddetalleventa DESC");
            $this->total = 0;
            while($this->registros= $this->consulta->fetch_array()){
                ?>
                <tr>
                    <td><?php echo $this->idfactura; ?></td>
                    <td><?php echo $this->registros['codigo']; ?></td>
                    <td><?php echo $this->registros['nombreproducto']; ?></td>
                    <td><?php echo $this->registros['cantidadventa']; ?></td>
                    <td><?php echo $this->registros['precioventa']; ?></td>
                    <td><?php echo $this->registros['subtotal']; ?></td>
                    <td><a class="btn btn-danger" onclick="return confirm('¿Desea quitar este producto?')" href="quitar.php?iddetalleventa=<?php echo $this->registros['iddetalleventa'];?>">QUITAR</a></td>
                </tr>
                <?php
                $this->total+= $this->registros['subtotal'];
            }
            ?>
                <tr>
                    <td colspan="5" class="text-right"><b>TOTAL</b></td>
                    <td colspan="2" class="text-right"><b><?php echo $this->total?></b></td>
                </tr>
                <tr>
                    <td colspan="7" class="text-center"><a class="btn btn-primary btn-block" onclick="return confirm('¿desea finalizar la venta?')" href="finalizar.php?idfactura=<?php echo $this->idfactura;?>&totalventa=<?php echo $this->total; ?>" >Finalizar Venta</a></td>
                </tr>
                <?php
        }
        
        function quitar($idd) {
            $this->iddetalleventa = $idd;
            $this->consulta = $this->con->query("SELECT * FROM detalleventa WHERE iddetalleventa = '$this->iddetalleventa'");
            if($this->registros = $this->consulta->fetch_array()){
                $this->idproducto = $this->registros['idproducto'];
                $this->cantidadventa = $this->registros['cantidadventa'];
                $this->idfactura = $this->registros['idfactura'];
                
                $this->consulta2 = $this->con->query("SELECT stock FROM producto WHERE idproducto = '$this->idproducto'");
                if($this->registros2 = $this->consulta2->fetch_array()){
                    $this->cantidaddisponible = $this->registros2['stock'];
                }
                
                $this->cantidad = $this->cantidadventa + $this->cantidaddisponible;
                $this->con->query("UPDATE producto SET stock = '$this->cantidad' WHERE idproducto = '$this->idproducto'");
                $this->con->query("DELETE FROM detalleventa WHERE iddetalleventa = '$this->iddetalleventa'");
                echo "<script>window.location.href='index.php?idfactura=$this->idfactura';</script>";
            }
        }
        
        function cancelar($idf) {
            $this->idfactura = $idf;
            $this->consulta = $this->con->query("SELECT * FROM detalleventa WHERE idfactura = '$this->idfactura'");
            while($this->registros = $this->consulta->fetch_array()){
                $this->idproducto = $this->registros['idproducto'];
                $this->cantidadventa = $this->registros['cantidadventa'];
                
                $this->consulta2 = $this->con->query("SELECT stock FROM producto WHERE idproducto = '$this->idproducto'");
                if($this->registros2 = $this->consulta2->fetch_array()){
                    $this->cantidaddisponible = $this->registros2['stock'];
                }
                
                $this->cantidad = $this->cantidadventa + $this->cantidaddisponible;
                $this->con->query("UPDATE producto SET stock = '$this->cantidad' WHERE idproducto = '$this->idproducto'");
                $this->con->query("DELETE FROM detalleventa WHERE idfactura = '$this->idfactura'");
                $this->con->query("DELETE FROM factura WHERE idfactura = '$this->idfactura'");
                echo "<script>alert('Factura Cancelada');window.location.href='../productos/index.php?pagina=1';</script>";
            }
        }
        
        public function vendedor() {
            $this->consulta = $this->con->query("SELECT * FROM usuarios WHERE privilegio = '4' ORDER BY apellido ASC, nombre ASC");
            while($this->registros = $this->consulta->fetch_array()){
                ?>
                <option value="<?php echo $this->registros['idusuario']; ?>"><?php echo $this->registros['apellido'].", ".$this->registros['nombre']; ?></option>
                <?php
                
            }
        }
        public function cliente() {
            $this->consulta = $this->con->query("SELECT * FROM usuarios WHERE privilegio = '3' ORDER BY apellido ASC, nombre ASC");
            while($this->registros = $this->consulta->fetch_array()){
                ?>
                <option value="<?php echo $this->registros['idusuario']; ?>"><?php echo $this->registros['apellido'].", ".$this->registros['nombre']; ?></option>
                <?php
                
            }
    }
    
    public function registrarFactura($idf,$idc,$idv,$totvta,$convta,$comp,$idr){
        date_default_timezone_set("america/argentina/tucuman");
        $this->idfactura = $idf;
        $this->cliente = $idc;
        $this->idvendedor = $idv;
        $this->total = $totvta;
        $this->condicion = $convta;
        $this->comprobante = $comp;
        $this->idregistrante = $idr;
        $this->estado = 2;
        $this->fechareg = date("Y-m-d H:i:s");
        
        switch ($this->condicion){
            case 1: $this->totalinteres = $this->total;
                break;
            case 2: $this->totalinteres = $this->total;
                break;
            case 3: $this->totalinteres = $this->total;
                break;
            case 4: $this->totalinteres = ($this->total*0.1) + $this->total;
                break;
            case 5: $this->totalinteres = ($this->total*0.1) + $this->total;
                break;
            case 6: $this->totalinteres = $this->total;
                break;
            case 7: $this->totalinteres = $this->total;
                break;
            case 8: $this->totalinteres = ($this->total*0.1) + $this->total;
                break;
            case 9: $this->totalinteres = ($this->total*0.1) + $this->total;
                break;
            case 10: $this->totalinteres = ($this->total*0.1) + $this->total;
                break;
            case 11: $this->totalinteres = ($this->total*0.15) + $this->total;
                break;
            case 12: $this->totalinteres = ($this->total*0.15) + $this->total;
                break;
            case 13: $this->totalinteres = ($this->total*0.15) + $this->total;
                break;
        }
        $this->consulta = $this->con->query("UPDATE facturas SET idcliente='$this->cliente',idvendedor='$this->idvendedor',totalventa='$this->totalinteres',condicionventa='$this->condicion',comprobantetarjeta='$this->comprobante',fechaventa='$this->fechareg',idregistrarme='$this->idregistrante',estado='$this->estado' WHERE idfactura='$this->idfactura'")or die($this->con->error);
        echo "<script>alert('Venta Finalizada Correctamente');window.location.href='../facturas/index.php';</script>";
    }
    }
?>