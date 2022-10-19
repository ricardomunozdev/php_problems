<!doctype HTML>

<html>
    <head>
        <meta charset="utf-8">
        <title>Sistema de Gestion</title>
        <link rel="stylesheet" type="text/css" href="bootstrap.css">
        <link rel="stylesheet" type="text/css" href="css/estilos.css">
    </head>
    <body>
        <h1 class="text-center">Inicio de Sesion</h1>
        <form action="validar.php" method="POST" style="width: 50%; margin: 0 auto; border: 3px #2285af solid; padding:  20px;
              border-radius: 10px; webkit-border-radius: 10px; moz-border-radius: 10px">
            <div>
                <label>Usuario</label>
                <input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario" required="">
            </div>
            <div>
                <label>Contraseña</label>
                <input type="password" class="form-control" name="password" placeholder="Ingrese Contraseña" required="">
            </div><br>
            <div>
                <button type="submit" class="btn btn-primary">ENTRAR</button>
            </div>
        </form>
    </body>
</html>