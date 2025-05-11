<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    <title>Login</title>
</head>
<body>
    <form action="<?php echo base_url('tareas/insert'); ?>" method="POST">
    <div class="form-floating mb-3">
        <input type="text" class="form-control" id="floatingUsuario" name="usuario" placeholder="JoeDoe">
        <label for="floatingUsuario">Usuario</label>
    </div>
    <div class="form-floating">
        <input type="password" class="form-control" id="floatingpassword" name="contra" placeholder="123">
        <label for="floatingpassword">Cotraseña</label>
    </div>
</form>
</body>
</html>