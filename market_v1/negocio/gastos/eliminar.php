<?php
   include 'class.php';
   if(isset($_GET['idgastos'])){
       $eliminar = new gastos();
       $eliminar->eliminar($_GET['idgastos']);
   }
   ?>