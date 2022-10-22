<!doctype HTML>

<html>

<head>
    <meta charset="utf-8">
    <title>Sistema de Gesti&oacute;n</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>
    <h1 class="text-center">Inicio de Sesi&oacute;n</h1>
    <form action="validar.php" method="POST" style="width: 50%; margin: 0 auto;">
        <div class="form-group">
            <label for="usuario">Usuario</label>
            <input type="text" class="form-control" id="usuario" name="usuario" aria-describedby="usuarioHelp">
            <small id="usuarioHelp" class="form-text text-muted">We'll never share your usuario with anyone else.</small>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Contrase&ntilde;a</label>
            <input type="password" class="form-control" name="password" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Entrar</button>
    </form>
</body>

</html>