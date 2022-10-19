<?php
    include '../conexion.php';
    
    class caja extends conexion{
        public $idcaja;
        public $idusuario;
        public $importecaja;
        public $fechacaja;
        public $fechacaja2;
        public $horacaja;
        public $datos;
        public $datos2;
        public $datos3;
        public $consulta;
        public $consulta2;
        public $consulta3;
        public $total;
        public $total2;
        public $total3;
        public $totalcaja;
        public $fecha2;
        public $fecha3;
        public $totalventa;
        public $desde;
        public $hasta;
        public $encontrados;
        
        //METODO PARA INICIAR CAJA
         public function apertura($idusu,$impc){
            date_default_timezone_set("america/argentina/tucuman"); 
            $this->idusuario = $idusu;
            $this->importecaja = $impc; 
            $this->fechacaja = date("Y-m-d");
            $this->horacaja = date("H:i:s");                 
            
            $this->consulta = $this->con->query("INSERT INTO caja(idusuario,importecaja,fechacaja,horacaja) VALUES ('$this->idusuario','$this->importecaja',"
                        . "'$this->fechacaja','$this->horacaja')");
            $this->con->close();
            echo "<script>alert('CAJA INICIADA');window.location.href='../caja/index.php';</script>";
        }
        
        //METODO PARA DESACTIVAR APERTURA DE CAJA
        public function desactivar(){
            date_default_timezone_set("america/argentina/tucuman");
            $this->fechacaja=date("Y-m-d");
            $this->consulta= $this->con->query("SELECT * FROM caja WHERE fechacaja='$this->fechacaja'");
            $this->encontrados= $this->consulta->num_rows;
    
            if($this->encontrados==0){
            echo '<a class="btn btn-primary" href="aperturacaja.php" >Apertura de caja</a>';
                } else {
                    if($this->datos= $this->consulta->fetch_array()){
                        $this->idcaja= $this->datos['idcaja'];
                    echo '<a class="btn btn-success" href="modificarcaja.php?idcaja='.$this->idcaja.'">Modificar Caja</a>';
                        } 
                    }
                $this->con->close(); 
            }
            
            //DATOS PARA MODIFICAR CAJA INICIAL
            public function datosmodificar($idc){
                $this->idcaja=$idc;
                $this->consulta= $this->con->query("SELECT * FROM caja WHERE idcaja='$this->idcaja'");
                if($this->datos= $this->consulta->fetch_array()){
                    $this->importecaja= $this->datos['importecaja'];
                    ?>
                        <input type="hidden" name="idcaja" value="<?php echo $this->idcaja; ?>">
                        <input type="number" step="any" class="form-control" id="importecaja" name="importecaja" value="<?php echo $this->importecaja; ?>">
                    <?php
                }
                $this->con->close();  
            }
            //METODO PARA MODIFICAR CAJA
            public function modificar($idc,$imp){
                $this->idcaja=$idc;
                $this->importecaja=$imp;        
                $this->consulta= $this->con->query("UPDATE caja SET importecaja='$this->importecaja' WHERE idcaja='$this->idcaja'");
                $this->con->close();
                echo "<script>alert('Caja Modificada');window.location.href='index.php';</script>";
            }


        public function ventas() {
            date_default_timezone_set("america/argentina/tucuman");
            $this->fechacaja = date("Y-m-d H:i:s");
            $this->fecha2 = date("Y-m-d 00:00:00");
            $this->consulta = $this->con->query("SELECT * FROM facturas WHERE condicionventa = '1' AND fechaventa BETWEEN '$this->fecha2' AND '$this->fechacaja'");
            $this->total=0;
            while($this->datos = $this->consulta->fetch_array()){
                $this->total+= $this->datos['totalventa'];
            }
            echo $this->total;
        }
        
        public function inicial() {
            date_default_timezone_set("America/Argentina/Tucuman");
            $this->fechacaja = date("Y-m-d");
            $this->consulta = $this->con->query("SELECT * FROM caja WHERE fechacaja = '$this->fechacaja'");
            $this->total=0;
            while($this->datos = $this->consulta->fetch_array()){
                $this->total+= $this->datos['importecaja'];
            }
            echo $this->total;
        }
        
        //METODO PARA CALCULAR GASTOS
        public function gastos(){
        date_default_timezone_set("america/argentina/tucuman");
        $this->fechacaja= date('Y-m-d H:i:s');
        $this->fecha2=date('Y-m-d 00:00:00');
        $this->consulta=$this->con->query("SELECT * FROM gastos WHERE fechagastos BETWEEN '$this->fecha2' AND '$this->fechacaja' ");
        $this->total=0;
        while ($this->datos= $this->consulta->fetch_array()){
            $this->total+= $this->datos['totalgastos'];
        }
        echo $this->total;
    }
        
        //METODO PARA CALCULAR EL TOTAL DE LA CAJA
        public function totalcaja(){
            date_default_timezone_set("america/argentina/tucuman");
            $this->fechacaja = date('Y-m-d H:i:s');
            $this->fecha2 = date('Y-m-d 00:00:00');
            $this->consulta = $this->con->query("SELECT * FROM facturas WHERE condicionventa='1' AND fechaventa BETWEEN '$this->fecha2' AND '$this->fechacaja' ");
            $this->total = 0;
            while ($this->datos = $this->consulta->fetch_array()){
                $this->total+= $this->datos['totalventa'];
            }

            $this->fechacaja2 = date('Y-m-d');
            $this->consulta2=$this->con->query("SELECT * FROM caja WHERE fechacaja='$this->fechacaja2' ");
            $this->total2 = 0;
            while ($this->datos2= $this->consulta2->fetch_array()){
                $this->total2+= $this->datos2['importecaja'];
            }

            $this->consulta3=$this->con->query("SELECT * FROM gastos WHERE fechagastos BETWEEN '$this->fecha2' AND '$this->fechacaja' ");
            $this->total3 = 0;
            while ($this->datos3= $this->consulta3->fetch_array()){
                $this->total3+= $this->datos3['totalgastos'];

            }
            echo $this->totalcaja= $this->total+$this->total2-$this->total3;
        }
        
        //TOTAL DE CAJA POR BUSQUEDA
        public function buscartotalcaja($des,$has){
            date_default_timezone_set("america/argentina/tucuman");
            $this->desde2= $des;
            $this->hasta2= $has;
            $this->desde= $des." 00:00:00";
            $this->hasta= $has." 23:59:59";
            
            $this->consulta2= $this->con->query("SELECT * FROM facturas WHERE condicionventa='1' AND fechaventa BETWEEN '$this->desde' AND '$this->hasta'");
            while($this->datos2= $this->consulta2->fetch_array()){
                   $this->total2+=$this->datos2['totalventa']; 
            }
    
            $this->consulta= $this->con->query("SELECT * FROM caja WHERE fechacaja BETWEEN '$this->desde2' AND '$this->hasta2'");
            while($this->datos= $this->consulta->fetch_array()){
                   $this->total+=$this->datos['importecaja'];
            }    
            
            $this->consulta3=$this->con->query("SELECT * FROM gastos WHERE fechagastos BETWEEN '$this->desde' AND '$this->hasta'");
            $this->total3=0;
            while ($this->datos3= $this->consulta3->fetch_array()){
                $this->total3+= $this->datos3['totalgastos'];
            }
       
            $this->totalcaja= $this->total + $this->total2 - $this->total3; 
         
         ?>
            <form id="caja" >
                <div class="form-group">
                    <label for="importecaja">Dinero Inicial</label>
                    <input type="text" class="form-control" id="importecaja" name="importecaja" value="$ <?php echo $this->total; ?>" readonly="">
                </div>
                <div class="form-group">
                    <label for="ventas">Dinero de  Ventas</label>
                    <input type="text" class="form-control" id="ventas" name="ventas" value="$ <?php echo $this->total2; ?>" readonly="">                   
                </div>
                <div class="form-group">
                    <label for="gastos">Gastos</label>
                    <input type="text" class="form-control" id="gastos" name="gastos" value="$ <?php echo $this->total3; ?>" readonly="">                   
                </div>
                <div class="form-group">
                    <label for="totalventa">Total $</label>
                    <input type="text" class="form-control" name="totalventa" value="$ <?php echo $this->totalcaja; ?>" readonly="">
                </div>
            </form>
        <?php
    }
   }
    
?>