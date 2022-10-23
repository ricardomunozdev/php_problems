<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="table-dark">
            <tr>
                <th>FOTO</th>
                <!-- <th>IDUSUARIO</th> -->
                <th>USUARIO</th>
                <!-- <th>CONTRASEÑA</th> -->
                <th>NOMBRE</th>
                <th>APELLIDO</th>
                <th>DNI</th>
                <th>NACIMIENTO</th>
                <!-- <th>PROVINCIA</th> -->
                <!-- <th>LOCALIDAD</th> -->
                <!-- <th>DIRECCION</th> -->
                <th>TELEFONO</th>
                <th>EMAIL</th>
                <th>SEXO</th>
                <th>PRIVILEGIO</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($rows as $key => $row) {
            ?>
                <tr>
                    <td><img src="fotos/<?php echo $row->dni; ?> " width="80px" height="80px"></td>
                    <!-- <td><?php // $this->recorrido->idusuario; 
                                ?></td> -->
                    <td><?php echo $row->usuario; ?></td>
                    <!-- <td><?php //echo  $row->password; 
                                ?></td> -->
                    <td><?php echo $row->nombre; ?></td>
                    <td><?php echo $row->apellido; ?></td>
                    <td><?php echo $row->dni; ?></td>
                    <td><?php echo  $row->nacimiento; ?></td>
                    <!-- <td><?php //echo  $row->provincia; 
                                ?></td> -->
                    <!-- <td><?php //echo  $row->direccion; 
                                ?></td> -->
                    <td><?php echo $row->telefono; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td><?php echo $row->sexo; ?></td>
                    <td><?php echo $row->privilegio; ?></td>
                    <td><?php echo $row->botones; ?></td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
</div>