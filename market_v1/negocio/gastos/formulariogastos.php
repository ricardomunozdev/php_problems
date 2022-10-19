<?php
include '../config/sesion.php';
include 'class.php';
?>

<html>
    <head>
       <?php include '../config/head.php' ;?>
       <style type="text/css">
           form#caja{
               width: 35%;
               margin: 0 auto;
               margin-top: 20px;
               margin-bottom: 20px
           }
           form#finalizar{
           width: 40%;
           margin: 0 auto;
           border: 3px #000 solid;
           padding: 20px;
           border-radius: 10px;
           -moz-border-radius:10px;
           -webkit-border-radius: 10px;
           }
           
           </style>
    </head>
    <body>
   
        <?php include '../config/menu.php' ;?>
        <br>
        <h1 class="text-center">APERTURA DE CAJA</h1>
        <hr>
        
        <form id="finalizar" action="formulariogastos.php" method="POST">
             <input type="hidden" name="idusuario" value="<?php echo $_SESSION['idusu']; ?>">
            <div class="form-group">
                <label for="detalle">Detalle de Gasto</label>
                <input type="text"  class="form-control" id="detalle" name="detalle" required="">
            </div>
             <div class="form-group">
                <label for="totalgastos">Total: </label>
                <input type="number" step="any"  class="form-control" id="totalgastos" name="totalgastos" required="">
            </div>
             <div class="text-center">
                 <button type="submit" class="btn btn-primary">Registrar</button>  
                 <a class="btn btn-danger" href="index.php?pagina=1">Cancelar</a>
             </div>
                                              
        </form>
        <?php
       if(isset ($_POST['detalle'])) {
                   $objetoGasto=new gastos();
                   $objetoGasto->apertura($_POST['detalle'],$_POST['totalgastos']);
               }
               ?>
    </body>
</html>
