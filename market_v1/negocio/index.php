<!doctype HTML>

<html>

<head>
    <meta charset="utf-8">
    <title>Sistema de Gesti&oacute;n</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.css">
</head>

<body>
    <h1 class="text-center">Inicio de Sesi&oacute;n</h1>
    <form action="validar.php" method="POST" style="width: 50%; margin: 0 auto; border: 3px #2285af solid; padding:  20px;
              border-radius: 10px; webkit-border-radius: 10px; moz-border-radius: 10px">
        <div>
            <label>Usuario</label>
            <input type="text" class="form-control" name="usuario" placeholder="Ingrese Usuario" required="required">
        </div>
        <div>
            <label>Contrase&ntilde;a</label>
            <input type="password" class="form-control" name="password" placeholder="Ingrese Contrase&ntilde;a" required>
        </div><br>
        <div>
            <button type="submit" class="btn btn-primary">ENTRAR</button>
        </div>
    </form>
</body>

</html>