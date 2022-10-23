<?php

include '../conexion.php';

class registros extends conexion
{
    public $campos;
    public $consulta;
    public $recorrido;

    public function datos()
    {
        $this->consulta = $this->con->query("SELECT * FROM usuarios");
        while ($this->recorrido = $this->consulta->fetch_array()) {
            echo '<tr>';
            // echo '<td>' . $this->recorrido['idusuario'] . '</td>';
            echo '<td>' . $this->recorrido['usuario'] . '</td>';
            // echo '<td>' . $this->recorrido['password'] . '</td>';
            echo '<td>' . $this->recorrido['nombre'] . '</td>';
            echo '<td>' . $this->recorrido['apellido'] . '</td>';
            echo '<td>' . $this->recorrido['dni'] . '</td>';
            echo '<td>' . $this->recorrido['nacimiento'] . '</td>';
            // echo '<td>' . $this->recorrido['provincia'] . '</td>';
            // echo '<td>' . $this->recorrido['localidad'] . '</td>';
            // echo '<td>' . $this->recorrido['direccion'] . '</td>';
            echo '<td>' . $this->recorrido['telefono'] . '</td>';
            echo '<td>' . $this->recorrido['email'] . '</td>';
            echo '<td>' . $this->recorrido['sexo'] . '</td>';
            echo '<td>' . $this->recorrido['privilegio'] . '</td>';
            echo '</tr>';
        }
    }
}

class registros2 extends conexion
{
    //atributos
    public $consulta;
    public $recorridos;
    public $pagina;
    public $registroxpagina;
    public $consultatotalregistros;
    public $totalregistros;
    public $paginacion;
    public $idproveedor;
    public $idusuario;
    public $actividad;
    public $haber;
    public $debe;
    public $fecha;
    public $consulta2;
    public $datos;
    public $sumahaber;
    public $sumadebe;
    public $saldo;

    //METODOS
    public function datos2($pag)
    {
        $this->pagina = $pag;
        $this->registroxpagina = 3;
        $this->consultatotalregistros = $this->con->query("SELECT * FROM usuarios");
        $this->totalregistros = ceil($this->consultatotalregistros->num_rows / $this->registroxpagina);
        $this->paginacion = "SELECT * FROM usuarios LIMIT " . (($this->pagina - 1) * $this->registroxpagina) . " ,"
            . " " . $this->registroxpagina;
        $this->consulta = $this->con->query($this->paginacion);

        while ($this->recorridos = $this->consulta->fetch_array()) {
?>
            <tr>
                <td><img src="fotos/<?php echo $this->recorridos['dni']; ?> " width="80px" height="80px"></td>
                <!-- <td><?php // echo $this->recorridos['idusuario']; 
                            ?> </td> -->
                <td><?php echo $this->recorridos['usuario']; ?> </td>
                <!-- <td><?php // echo $this->recorridos['password']; 
                            ?> </td> -->
                <td><?php echo $this->recorridos['nombre']; ?></td>
                <td><?php echo $this->recorridos['apellido']; ?></td>
                <td><?php echo $this->recorridos['dni']; ?></td>
                <td><?php echo $this->recorridos['nacimiento']; ?></td>
                <!-- <td><?php // echo $this->recorridos['provincia']; 
                            ?></td> -->
                <!-- <td><?php // echo $this->recorridos['localidad']; 
                            ?></td> -->
                <!-- <td><?php // echo $this->recorridos['direccion']; 
                            ?></td> -->
                <td><?php echo $this->recorridos['telefono']; ?></td>
                <td><?php echo $this->recorridos['email']; ?></td>
                <td><?php echo $this->recorridos['sexo']; ?></td>
                <td><?php switch ($this->recorridos['privilegio']) {
                        case 1:
                            echo 'Administrador';
                            break;
                        case 2:
                            echo 'Estandar';
                            break;
                        case 3:
                            echo 'Cliente';
                            break;
                        case 4:
                            echo 'Empleado';
                            break;
                        case 5:
                            echo 'Proveedor';
                            break;
                        case 6:
                            echo 'Limitado';
                            break;
                        default:
                            echo '';
                            break;
                    } ?></td>
                <td>
                    <?php if ($this->recorridos['privilegio'] == 5) {  ?>
                        <a class="btn btn-primary" href="vercuenta.php?idusuario=<?php echo $this->recorridos['idusuario']; ?>">
                            Ver cuenta
                        </a>
                    <?php } ?>
                    <a class="btn btn-success" href="formularioUpdate.php?idusuario=<?php echo $this->recorridos['idusuario']; ?>">
                        Modificar
                    </a>
                    <a class="btn btn-danger" onclick="return confirm ('Desea eliminar el registro seleccionado?');" href="formularioEliminar.php?idusuario=<?php echo $this->recorridos['idusuario']; ?>">
                        Eliminar
                    </a>
                </td>
            </tr>
        <?php
        }
        ?>
        <tr>
            <td colspan="16" class="text-center">
                <nav aria-label="Page navigation example">
                    <ul class="pagination">
                        <li class="page-item">
                            <a class="page-link" href="index.php?pagina=1">
                                << </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="index.php?pagina=<?php echo ($_GET['pagina'] - 1 === 0) ?  1 : $_GET['pagina'] - 1; ?>">
                                Anterior
                            </a>
                        </li>
                        <?php
                        for ($this->i = 1; $this->i <= $this->totalregistros; $this->i++) {
                        ?>
                            <li class="page-item <?php if ($_GET['pagina'] == $this->i) {
                                                        echo 'active';
                                                    } ?>">
                                <a class="page-link" href="index.php?pagina=<?php echo $this->i; ?>">
                                    <?php echo $this->i; ?>
                                </a>
                            </li>
                        <?php
                        }
                        ?>
                        <li class="page-item">
                            <a class="page-link" href="index.php?pagina=<?php
                                                                        if ((int)$_GET['pagina'] !== (int)$this->totalregistros)
                                                                            echo $_GET['pagina'] + 1;
                                                                        else
                                                                            echo $_GET['pagina']; ?>">
                                Siguiente
                            </a>
                        </li>
                        <li class="page-item">
                            <a class="page-link" href="index.php?pagina=<?php echo $this->i - 1; ?>">
                                >>
                            </a>
                        </li>
                    </ul>
                </nav>
            </td>
        </tr>
    <?php
        $this->con->close();
    }
    //METODO PARA VER LOS PROVEEDORES

    public function mostrarcuentaproveedor($idu)
    {
        $this->sumadebe = 0;
        $this->sumahaber = 0;
        $this->saldo = 0;
        $this->idusuario = $idu;
        $this->consulta = $this->con->query("SELECT * FROM proveedores WHERE idusuario ='$this->idusuario'");
    ?>
        <div class="table-responsive">

            <table class="table table-bordered table-striped ">
                <thead>
                    <tr class="bg-light">
                        <th colspan="1" class="text-right">Nombre: </th>
                        <th colspan="5" class="text-left">
                            <?php
                            $this->consulta2 = $this->con->query("SELECT apellido,nombre, telefono, direccion FROM usuarios WHERE idusuario='$this->idusuario'");
                            if ($this->datos = $this->consulta2->fetch_array()) {
                                echo $this->datos['apellido'] . ", " . $this->datos['nombre'] . " ► Telefono: " . $this->datos['telefono'] . " ► Dirección: " . $this->datos['direccion'];
                            }
                            ?>
                        </th>
                    </tr>
                    <tr class="bg-primary">
                        <th>Fecha</th>
                        <th>Actividad</th>
                        <th>Debe</th>
                        <th>Haber</th>
                        <th>Saldo</th>
                        <th>Accion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php

                    while ($this->recorridos = $this->consulta->fetch_array()) {
                    ?>
                        <tr>
                            <td><?php echo $this->recorridos['fecha']; ?></td>
                            <td><?php echo $this->recorridos['actividad']; ?></td>
                            <td>$<?php echo $this->recorridos['debe']; ?></td>
                            <td>$<?php echo $this->recorridos['haber']; ?></td>
                            <td>$
                                <?php
                                $this->sumadebe += $this->recorridos['debe'];
                                $this->sumahaber += $this->recorridos['haber'];
                                echo  $this->saldo = round($this->sumadebe - $this->sumahaber, 2);
                                ?>
                            </td>

                            <td>
                                <?php if ($this->recorridos['haber'] == 0) {  ?>
                                    <a class="btn btn-sm btn-success btn-block" href="modificarc.php?idproveedor=<?php echo $this->recorridos['idproveedor']; ?>">
                                        Modificar Credito
                                    </a>
                                <?php
                                } else { ?>
                                    <a class="btn btn-sm btn-success btn-block" href="modificarp.php?idproveedor=<?php echo $this->recorridos['idproveedor']; ?>">
                                        Modificar Pago
                                    </a>
                                <?php } ?>
                                <a class="btn btn-sm btn-danger btn-block" href="eliminarpc.php?idusuario=<?php echo $this->recorridos['idusuario']; ?> & idproveedor=<?php echo $this->recorridos['idproveedor']; ?>">
                                    Eliminar
                                </a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </tbody>
            </table>
        </div>
        <?php

    }
    //METODO GUARDAR
    public function guardar($idu, $act, $hab)
    {
        date_default_timezone_set("america/argentina/tucuman");
        $this->fecha = date("Y-m-d H:i:s");
        $this->idusuario = $idu;
        $this->actividad = $act;
        $this->haber = $hab;

        $this->con->query("INSERT INTO proveedores (idusuario,actividad,haber,fecha) VALUE ('$this->idusuario','$this->actividad','$this->haber','$this->fecha')");
        $this->con->close();
        echo "<script>alert('Pago Registrado');window.location.href='vercuenta.php?idusuario=" . $this->idusuario . "';</script>";
        echo "<script>alert('Usuario Regist ');window.location.href='index.php';</script>";
    }

    public function guardar2($idu, $act, $deb)
    {
        date_default_timezone_set("america/argentina/tucuman");
        $this->fecha = date("Y-m-d H:i:s");
        $this->idusuario = $idu;
        $this->actividad = $act;
        $this->debe = $deb;

        $this->con->query("INSERT INTO proveedores (idusuario,actividad,debe,fecha) VALUE ('$this->idusuario','$this->actividad','$this->debe','$this->fecha')");
        $this->con->close();
        echo "<script>alert('Credito Registrado');window.location.href='vercuenta.php?idusuario=" . $this->idusuario . "';</script>";
    }
    //METODO PARA MOSTRAR DATOS DEL CREDITO A MODIFICAR
    public function datoscredito($idp)
    {
        $this->idproveedor = $idp;
        $this->consulta = $this->con->query("SELECT * FROM proveedores WHERE idproveedor='$this->idproveedor'");
        if ($this->recorridos = $this->consulta->fetch_array()) {
        ?>
            <form id="modificarc" action="modificarc.php" method="POST">
                <input type="hidden" name="idusuario" value="<?php echo $this->recorridos['idusuario'] ?>">
                <input type="hidden" name="idproveedor" value="<?php echo $this->recorridos['idproveedor'] ?>">
                <div class="form-group">
                    <label>Actividad</label>
                    <input type="text" class="form-control" name="actividad" value="<?php echo $this->recorridos['actividad']; ?>" required="">
                </div>
                <div class="form-group">
                    <label>Debe</label>
                    <input type="number" step="any" class="form-control" name="debe" value="<?php echo $this->recorridos['debe']; ?>" required="">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" value="Modificar Credito " name="hasta">
                    <a class="btn btn-danger" href="vercuenta.php?idusuario=<?php echo $this->recorridos['idusuario']; ?>">Cancelar</a>
                </div>
            </form>
        <?php
            $this->con->close();
        }
    }
    //metodo para modificar haber
    public function modcre($idp, $idu, $act, $deb)
    {
        $this->idproveedor = $idp;
        $this->idusuario = $idu;
        $this->actividad = $act;
        $this->debe = $deb;

        $this->con->query("UPDATE proveedores SET actividad='$this->actividad', debe='$this->debe' WHERE idproveedor='$this->idproveedor' ");
        $this->con->close();
        echo "<script>alert('Credito Modificado');window.location.href='vercuenta.php?idusuario=" . $this->idusuario . "';</script>";
    }
    public function datospago($idp)
    {
        $this->idproveedor = $idp;
        $this->consulta = $this->con->query("SELECT * FROM proveedores WHERE idproveedor='$this->idproveedor'");
        if ($this->recorridos = $this->consulta->fetch_array()) {
        ?>
            <form id="modificarp" action="modificarp.php" method="POST">
                <input type="hidden" name="idusuario" value="<?php echo $this->recorridos['idusuario'] ?>">
                <input type="hidden" name="idproveedor" value="<?php echo $this->recorridos['idproveedor'] ?>">
                <div class="form-group">
                    <label>Actividad: </label>
                    <input type="text" class="form-control" name="actividad" value="<?php echo $this->recorridos['actividad']; ?>" required="">
                </div>
                <div class="form-group">
                    <label>Pago: </label>
                    <input type="number" step="any" class="form-control" name="haber" value="<?php echo $this->recorridos['haber']; ?>" required="">
                </div>
                <div>
                    <input type="submit" class="btn btn-primary" value="Modificar Pago " name="hasta">
                    <a class="btn btn-danger" href="vercuenta.php?idusuario=<?php echo $this->recorridos['idusuario']; ?>">Cancelar</a>
                </div>
            </form>
        <?php
            $this->con->close();
        }
    }

    public function modpago($idp, $idu, $act, $hab)
    {
        $this->idproveedor = $idp;
        $this->idusuario = $idu;
        $this->actividad = $act;
        $this->haber = $hab;

        $this->con->query("UPDATE proveedores SET actividad='$this->actividad', haber='$this->haber' WHERE idproveedor='$this->idproveedor' ");
        $this->con->close();
        echo "<script>alert('Pago modificado');window.location.href='vercuenta.php?idusuario=" . $this->idusuario . "';</script>";
    }
    //metodo para eliminar pagos o creditos
    public function eliminarpc($idu, $idp)
    {
        $this->idusuario = $idu;
        $this->idproveedor = $idp;
        $this->con->query("DELETE FROM proveedores WHERE idproveedor='$this->idproveedor'");
        $this->con->close();
        echo "<script>alert('Registro Eliminado');window.location.href='vercuenta.php?idusuario=" . $this->idusuario . "';</script>";
    }
}

class registros3 extends conexion
{
    public $consulta;
    public $recorrido;
    public $buscar;
    public $tipo;
    public $desde;
    public $hasta;


    public function datos3($bus, $tipo)
    {
        $this->buscar = $bus;
        $this->tipo = $tipo;

        switch ($this->tipo) {
            case 'dni':
                $this->consulta = $this->con->query("SELECT * FROM usuarios where dni = '$this->buscar'");
                break;
            case 'apellido':
                $this->consulta = $this->con->query("SELECT * FROM usuarios where apellido LIKE '%$this->buscar%'");
                break;
            case 'telefono':
                $this->consulta = $this->con->query("SELECT * FROM usuarios where telefono LIKE '%$this->buscar%'");
        }

        while ($this->recorrido = $this->consulta->fetch_array()) {
        ?>
            <tr>
                <td><img src="fotos/<?php echo $this->recorrido['dni']; ?> " width="80px" height="80px"></td>
                <!-- <td><?php // echo $this->recorrido['idusuario']; 
                            ?></td> -->
                <td><?php echo $this->recorrido['usuario']; ?></td>
                <!-- <td><?php // echo $this->recorrido['password']; 
                            ?></td> -->
                <td><?php echo $this->recorrido['nombre']; ?></td>
                <td><?php echo $this->recorrido['apellido']; ?></td>
                <td><?php echo $this->recorrido['dni']; ?></td>
                <td><?php echo $this->recorrido['nacimiento']; ?></td>
                <!-- <td><?php // echo $this->recorrido['provincia']; 
                            ?></td> -->
                <!-- <td><?php // echo $this->recorrido['localidad']; 
                            ?></td> -->
                <!-- <td><?php // echo $this->recorrido['direccion']; 
                            ?></td> -->
                <td><?php echo $this->recorrido['telefono']; ?></td>
                <td><?php echo $this->recorrido['email']; ?></td>
                <td><?php echo $this->recorrido['sexo']; ?></td>
                <td><?php switch ($this->recorrido['privilegio']) {
                        case 1:
                            echo 'Administrador';
                            break;
                        case 2:
                            echo 'Estandar';
                            break;
                        case 3:
                            echo 'Cliente';
                            break;
                        case 4:
                            echo 'Empleado';
                            break;
                        case 5:
                            echo 'Proveedor';
                            break;
                        case 6:
                            echo 'Limitado';
                    } ?></td>
                <td>
                    <?php if ($this->recorrido['privilegio'] == 5) {  ?>
                        <a class="btn btn-primary" href="vercuenta.php?idusuario=<?php echo $this->recorrido['idusuario']; ?>">Ver cuenta</a>
                    <?php } ?>
                    <a class="btn btn-success" href="formularioUpdate.php?idusuario=<?php echo $this->recorrido['idusuario']; ?>">Modificar</a>
                    <a class="btn btn-danger" onclick="return confirm ('Desea eliminar el registro seleccionado?');" href="formularioEliminar.php?idusuario=<?php echo $this->recorrido['idusuario']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php
        }
    }

    public function buscarporfecha($des, $has)
    {
        $this->desde = $des;
        $this->hasta = $has;

        $this->consulta = $this->con->query("SELECT * FROM usuarios WHERE nacimiento BETWEEN '$this->desde' AND '$this->hasta'");
        while ($this->recorrido = $this->consulta->fetch_array()) {
        ?>
            <tr>
                <td><img src="fotos/<?php echo $this->recorrido['dni']; ?> " width="80px" height="80px"></td>
                <!-- <td><?php // echo $this->recorrido['idusuario']; 
                            ?></td> -->
                <td><?php echo $this->recorrido['usuario']; ?></td>
                <!-- <td><?php // echo $this->recorrido['password']; 
                            ?></td> -->
                <td><?php echo $this->recorrido['nombre']; ?></td>
                <td><?php echo $this->recorrido['apellido']; ?></td>
                <td><?php echo $this->recorrido['dni']; ?></td>
                <td><?php echo $this->recorrido['nacimiento']; ?></td>
                <!-- <td><?php // echo $this->recorrido['provincia']; 
                            ?></td> -->
                <!-- <td><?php // echo $this->recorrido['localidad']; 
                            ?></td> -->
                <!-- <td><?php // echo $this->recorrido['direccion']; 
                            ?></td> -->
                <td><?php echo $this->recorrido['telefono']; ?></td>
                <td><?php echo $this->recorrido['email']; ?></td>
                <td><?php echo $this->recorrido['sexo']; ?></td>
                <td><?php switch ($this->recorrido['privilegio']) {
                        case 1:
                            echo 'Administrador';
                            break;
                        case 2:
                            echo 'Estandar';
                            break;
                        case 3:
                            echo 'Cliente';
                            break;
                        case 4:
                            echo 'Empleado';
                            break;
                        case 5:
                            echo 'Proveedor';
                            break;
                        case 6:
                            echo 'Limitado';
                    } ?></td>
                <td>
                    <?php if ($this->recorrido['privilegio'] == 5) {  ?>
                        <a class="btn btn-primary" href="vercuenta.php?idusuario=<?php echo $this->recorrido['idusuario']; ?>">Ver cuenta</a>
                    <?php } ?>
                    <a class="btn btn-success" href="formularioUpdate.php?idusuario=<?php echo $this->recorrido['idusuario']; ?>">Modificar</a>
                    <a class="btn btn-danger" onclick="return confirm ('Desea eliminar el registro seleccionado?');" href="formularioEliminar.php?idusuario=<?php echo $this->recorrido['idusuario']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php
        }
    }
}

class nuevoUsuario extends conexion
{
    public $usuario;
    public $pass;
    public $nombre;
    public $apellido;
    public $dni;
    public $nacimiento;
    public $provincia;
    public $localidad;
    public $direccion;
    public $telefono;
    public $email;
    public $sexo;
    public $privilegio;
    public $idregistrarme;
    public $consultausuario;
    public $existeusuario;
    public $consultadni;
    public $existedni;
    public $consultatel;
    public $existetel;
    public $consultamail;
    public $existemail;


    public function registrar($usu, $pass, $nom, $ape, $dn, $nac, $prov, $loc, $dir, $tel, $mail, $sex, $pri)
    {
        $this->usuario = $usu;
        $this->pass = $pass;
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->dni = $dn;
        $this->nacimiento = $nac;
        $this->provincia = $prov;
        $this->localidad = $loc;
        $this->direccion = $dir;
        $this->telefono = $tel;
        $this->email = $mail;
        $this->sexo = $sex;
        $this->privilegio = $pri;

        $this->consultausuario = $this->con->query("SELECT usuario FROM usuarios WHERE usuario = '$this->usuario'");
        $this->existeusuario = $this->consultausuario->num_rows;
        $this->consultadni = $this->con->query("SELECT dni FROM usuarios WHERE dni = '$this->dni'");
        $this->existedni = $this->consultadni->num_rows;
        $this->consultatel = $this->con->query("SELECT telefono FROM usuarios WHERE telefono ='$this->telefono'");
        $this->existetel = $this->consultatel->num_rows;
        $this->consultamail = $this->con->query("SELECT email FROM usuarios WHERE email ='$this->email'");
        $this->existemail = $this->consultamail->num_rows;

        if ($this->existeusuario > 0) {
            echo "<script>alert('El Usuario ya se encuentra registrado');history.back(-1);</script>";
        } else if ($this->existedni > 0) {
            echo "<script>alert('El DNI ya se encuentra registrado');history.back(-1);</script>";
        } else if ($this->existetel > 0) {
            echo "<script>alert('El Telefono ya se encuentra registrado');history.back(-1);</script>";
        } else if ($this->existemail > 0) {
            echo "<script>alert('El E-MAIL ya se encuentra registrado');history.back(-1);</script>";
        } else {
            $this->con->query("INSERT INTO usuarios(usuario,password,nombre,apellido,dni,nacimiento,provincia,localidad,direccion,telefono,email,sexo,privilegio) VALUES ('$this->usuario','$this->pass','$this->nombre','$this->apellido','$this->dni','$this->nacimiento','$this->provincia','$this->localidad','$this->direccion','$this->telefono','$this->email','$this->sexo','$this->privilegio')") or die($this->con->error);
            $this->con->close();
        }
    }
}

class datosModificarUsuario extends conexion
{
    public $idusuario;
    public $consulta;
    public $recorrido;

    public function mostrarDatos($id)
    {
        $this->idusuario = $id;
        $this->consulta = $this->con->query("SELECT * FROM usuarios WHERE idusuario='$this->idusuario'");
        if ($this->recorrido = $this->consulta->fetch_array()) {
        ?>
            <form id="usuario" class="form-group" action="formularioUpdate.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idusuario" value="<?php echo $this->recorrido['idusuario']; ?>">
                <div class="form-group">
                    <label>USUARIO</label>
                    <input type="text" class="form-control" name="usuario" required=" 
                       " value="<?php echo $this->recorrido['usuario']; ?>">
                </div>
                <div class="form-group">
                    <label>CONTRASEÑA</label>
                    <input type="text" class="form-control" name="password" required=" 
                       " value="<?php echo $this->recorrido['password']; ?>">
                </div>
                <div class="form-group">
                    <label>NOMBRE</label>
                    <input type="text" class="form-control" name="nombre" required=" 
                       " value="<?php echo $this->recorrido['nombre']; ?>">
                </div>
                <div class="form-group">
                    <label>APELLIDO</label>
                    <input type="text" class="form-control" name="apellido" required="" value="<?php echo $this->recorrido['apellido']; ?>">
                </div>
                <div class="form-group">
                    <label>DNI</label>
                    <input type="number" class="form-control" name="dni" required="" value="<?php echo $this->recorrido['dni']; ?>">
                </div>
                <div class="form-group">
                    <label>NACIMIENTO</label>
                    <input type="date" class="form-control" name="nacimiento" required="" value="<?php echo $this->recorrido['nacimiento']; ?>">
                </div>
                <div class="form-group">
                    <label>PROVINCIA</label>
                    <input type="text" class="form-control" name="provincia" required="" value="<?php echo $this->recorrido['provincia']; ?>">
                </div>
                <div class="form-group">
                    <label>LOCALIDAD</label>
                    <input type="text" class="form-control" name="localidad" required="" value="<?php echo $this->recorrido['localidad']; ?>">
                </div>
                <div class="form-group">
                    <label>DIRECCION</label>
                    <input type="text" class="form-control" name="direccion" required="" value="<?php echo $this->recorrido['direccion']; ?>">
                </div>
                <div class="form-group">
                    <label>TELEFONO</label>
                    <input type="text" class="form-control" name="telefono" required="" value="<?php echo $this->recorrido['telefono']; ?>">
                </div>
                <div class="form-group">
                    <label>EMAIL</label>
                    <input type="text" class="form-control" name="email" required="" value="<?php echo $this->recorrido['email']; ?>">
                </div>
                <div class="form-group">
                    <label>SEXO</label>
                    <input type="text" class="form-control" name="sexo" required="" value="<?php echo $this->recorrido['sexo']; ?>">
                </div>
                <div class="form-group">
                    <label>PRIVILEGIO</label>
                    <select class="form-control" name="privilegio" required="">
                        <option value="">Seleccionar: </option><br>
                        <option value="1">Administrador</option>
                        <option value="2">Estandar</option>
                        <option value="3">Cliente</option>
                        <option value="4">Empleado</option>
                        <option value="5">Proveedor</option>
                        <option value="6">Limitado</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="foto">Foto del usuario</label>
                    <input type="file" class="form-control" id="foto" name="foto">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Modificar Usuario">
                    <a class="btn btn-danger" href="index.php?pagina=1">Cancelar Formulario</a>
                </div>
            </form>
        <?php
        }
    }
}

class modificarUsuario extends conexion
{
    public $usuario;
    public $pass;
    public $nombre;
    public $apellido;
    public $dni;
    public $nacimiento;
    public $provincia;
    public $localidad;
    public $direccion;
    public $telefono;
    public $email;
    public $sexo;
    public $idusuario;
    public $privilegio;
    public $idregistrante;

    public function modificar($id, $usu, $pass, $nom, $ape, $dn, $nac, $prov, $loc, $dir, $tel, $mail, $sex, $pri)
    {
        $this->usuario = $usu;
        $this->pass = $pass;
        $this->nombre = $nom;
        $this->apellido = $ape;
        $this->dni = $dn;
        $this->nacimiento = $nac;
        $this->provincia = $prov;
        $this->localidad = $loc;
        $this->direccion = $dir;
        $this->telefono = $tel;
        $this->email = $mail;
        $this->sexo = $sex;
        $this->privilegio = $pri;
        $this->idusuario = $id;


        $this->con->query("UPDATE usuarios SET usuario='$this->usuario', password='$this->pass', nombre='$this->nombre', "
            . "apellido='$this->apellido', dni='$this->dni', nacimiento='$this->nacimiento', "
            . "provincia='$this->provincia', localidad='$this->localidad', direccion='$this->direccion', "
            . "telefono='$this->telefono', email='$this->email', sexo='$this->sexo', privilegio='$this->privilegio' "
            . "WHERE idusuario='$this->idusuario'") or die($this->con->error);
        $this->con->close();
    }
}

class eliminar extends conexion
{

    public $idusuario;

    public function eliminarUsuario($id)
    {

        $this->idusuario = $id;


        $this->con->query("DELETE FROM usuarios WHERE idusuario = '$this->idusuario'") or die($this->con->error());
        $this->con->close();

        echo "<script>alert('Usuario ELiminado Satisfactoriamente');"
            . "window.location.href='index.php';</script>";
    }
}

class datosEliminar extends conexion
{
    public $idusuario;
    public $consulta;
    public $recorrido;

    public function eliminar($id)
    {
        $this->idusuario = $id;
        $this->consulta = $this->con->query("SELECT * FROM usuarios WHERE idusuario='$this->idusuario'");
        if ($this->recorrido = $this->consulta->fetch_array()) {
        ?>
            <form id="usuario" class="form-group" action="formularioEliminar.php" method="POST">
                <input type="hidden" name="idusuario" value="<?php echo $this->recorrido['idusuario']; ?>">
                <div class="form-group">
                    <label>USUARIO</label>
                    <input type="text" class="form-control" name="usuario" required=" 
                       " value="<?php echo $this->recorrido['usuario']; ?>">
                </div>
                <div class="form-group">
                    <label>CONTRASEÑA</label>
                    <input type="text" class="form-control" name="password" required=" 
                       " value="<?php echo $this->recorrido['password']; ?>">
                </div>
                <div class="form-group">
                    <label>NOMBRE</label>
                    <input type="text" class="form-control" name="nombre" required=" 
                       " value="<?php echo $this->recorrido['nombre']; ?>">
                </div>
                <div class="form-group">
                    <label>APELLIDO</label>
                    <input type="text" class="form-control" name="apellido" required="" value="<?php echo $this->recorrido['apellido']; ?>">
                </div>
                <div class="form-group">
                    <label>DNI</label>
                    <input type="number" class="form-control" name="dni" required="" value="<?php echo $this->recorrido['dni']; ?>">
                </div>
                <div class="form-group">
                    <label>NACIMIENTO</label>
                    <input type="date" class="form-control" name="nacimiento" required="" value="<?php echo $this->recorrido['nacimiento']; ?>">
                </div>
                <div class="form-group">
                    <label>PROVINCIA</label>
                    <input type="text" class="form-control" name="provincia" required="" value="<?php echo $this->recorrido['provincia']; ?>">
                </div>
                <div class="form-group">
                    <label>LOCALIDAD</label>
                    <input type="text" class="form-control" name="localidad" required="" value="<?php echo $this->recorrido['localidad']; ?>">
                </div>
                <div class="form-group">
                    <label>DIRECCION</label>
                    <input type="text" class="form-control" name="direccion" required="" value="<?php echo $this->recorrido['direccion']; ?>">
                </div>
                <div class="form-group">
                    <label>TELEFONO</label>
                    <input type="text" class="form-control" name="telefono" required="" value="<?php echo $this->recorrido['telefono']; ?>">
                </div>
                <div class="form-group">
                    <label>EMAIL</label>
                    <input type="text" class="form-control" name="email" required="" value="<?php echo $this->recorrido['email']; ?>">
                </div>
                <div class="form-group">
                    <label>SEXO</label>
                    <input type="text" class="form-control" name="sexo" required="" value="<?php echo $this->recorrido['sexo']; ?>">
                </div>
                <div class="form-group">
                    <label>PRIVILEGIO</label>
                    <input type="text" class="form-control" name="privilegio" required="" value="<?php echo $this->recorrido['privilegio']; ?>">
                </div>
                <div class="form-group">
                    <label for="foto">Foto del usuario</label>
                    <input type="file" class="form-control" id="foto" name="foto" required="">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Eliminar Usuario">
                    <a class="btn btn-danger" href="index.php?pagina=1">Cancelar Formulario</a>
                </div>
            </form>
<?php
        }
    }
}

?>