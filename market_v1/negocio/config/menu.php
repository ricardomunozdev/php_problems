<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container">
    <a class="navbar-brand" href="#">Market</a>
    <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarsExample07" aria-controls="navbarsExample07" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="navbarsExample07">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item">
          <a class="nav-link" href="../caja/">Caja</a>
        </li>
        <li class="nav-item active">
          <a class="nav-link" href="../usuarios/index.php?pagina=1">Usuarios</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../facturas/index.php?pagina=1">Facturas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../rubros/">Rubros</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../productos/index.php?pagina=1">Productos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../ventas/">Ventas</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="../gastos/index.php?pagina=1">Gastos</a>
        </li>
        <li class="nav-item">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        </li>

        <?php session_start(); ?>
        <li class="nav-item dropdown float-right">
          <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-expanded="false"><?php
                                                                                                    if (isset($_SESSION['user'])) {
                                                                                                      echo $_SESSION['nom'];
                                                                                                    }
                                                                                                    ?></a>
          <div class="dropdown-menu">
            <!-- 
            <a class="dropdown-item" href="#">Action</a>
            <a class="dropdown-item" href="#">Another action</a>
            -->
            <p>
              <?php
              if (isset($_SESSION['user'])) {
                echo 'Bienvenido: ';
                echo $_SESSION['nom'];
              }
              ?>
            </p>

            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#"><?php
                                              if (isset($_SESSION['user'])) {
                                                echo '<a class="dropdown-item" href="../config/salir.php" class="btn btn-danger">Salir</a>';
                                              }
                                              ?></a>
          </div>
        </li>
      </ul>
      <!-- <form class="form-inline my-2 my-md-0">
        <input class="form-control" type="text" placeholder="Search" aria-label="Search">
      </form> -->
    </div>
  </div>
</nav>