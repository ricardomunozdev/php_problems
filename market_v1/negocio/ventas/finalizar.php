<?php include '../config/sesion.php' ?>
<?php include 'class.php'; ?>
<html>
    <head>        
        <?php include '../config/head.php'; ?>
         <style type="text/css">
            form#finalizar{
                width: 40%;
                margin: 0 auto;
                border: 3px #1c26cf solid;
                padding: 20px;
                border-radius: 10px;
                -moz-border-radius: 10px;
                -webkit-border-radius: 10px;
            }
        </style>
    </head>
    <body>
        <?php include '../config/menu.php';?>
        <br>
        <h1 class="text-center">Finalizar Venta</h1>
        <hr>
        <form id="finalizar" action="finalizar.php" method="POST">
            <div class="form-group">
                <label for="cliente">CLIENTE</label>
                <select class="form-control" id="cliente" name="cliente" required="">
                    <option value="">Seleccionar: </option>
                   <?php
                $objetoCliente = new ventas();
                $objetoCliente->cliente();
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="idvendedor">VENDEDOR</label>
                <select class="form-control" id="idvendedor" name="idvendedor" required="">
                    <option value="">Seleccionar: </option>
                <?php
                $objetoVendedor = new ventas();
                $objetoVendedor->vendedor();
                ?>
                </select>
            </div>
            <div class="form-group">
                <label for="totalventa">TOTAL $</label>
                <input type="text" class="form-control" id="totalventa" name="totalventa" value="<?php echo $_GET['totalventa'];?>" readonly="">
            </div>
            <div class="form-group">
                <label for="condicionventa">CONDICIÓN VENTA</label>
                <select class="form-control" id="condicionventa" name="condicionventa" required="">
                    <option value="">Seleccionar: </option>
                    <option value="1">Efectivo</option>
                    <option value="2">Debito</option>
                    <option value="3">Tarjeta Naranja 1 Pago</option>
                    <option value="4">Tarjeta Naranja 3 Pago</option>
                    <option value="5">Tarjeta Naranja 6 Pago</option>
                    <option value="6">Tarjeta Naranja Plan Z</option>
                    <option value="7">Tarjeta Visa 1 Pago</option>
                    <option value="8">Tarjeta Visa 3 Pago</option>
                    <option value="9">Tarjeta Visa 6 Pago</option>
                    <option value="10">Tarjeta Visa 9 Pago</option>
                    <option value="11">Tarjeta Visa 12 Pago</option>
                    <option value="12">Tarjeta Visa 18 Pago</option>
                    <option value="13">Tarjeta Visa 24 Pago</option>
                </select>
            </div>
            <div class="form-group">
                <label for="comprobantetarjeta"> N° COMPROBANTE</label>
                <input type="text" class="form-control" id="comprobantetarjeta" name="comprobantetarjeta">
            </div>
            <input type="hidden" name="idfactura" value="<?php echo $_GET['idfactura'];?>">
            <input type="hidden" name="idregistrarme" value="<?php echo $_SESSION['idusu'];?>">
            <div class="form-group text-center">
                <input type="submit" value="Regristrar Venta" class="btn btn-success">
                <a class="btn btn-primary" onclick="return confirm ('¿Desea Regresar?')" href="index.php?idfactura=<?php echo $_GET['idfactura'];?>">Regresar</a>
            </div>
        </form>
        <?php
        if(isset($_POST['cliente'])){
                $objReg = new ventas();
                $objReg->registrarFactura($_POST['idfactura'], $_POST['cliente'], $_POST['idvendedor'], $_POST['totalventa'], $_POST['condicionventa'], $_POST['comprobantetarjeta'], $_POST['idregistrarme']);
                
        }
        ?>
    </body>
</html>
