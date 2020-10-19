<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/all.css">
    
    <title>Login</title>    
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="img/logo.png" id="icon" alt="User Icon" />
      <h1>Sistema Gestor de Archivos</h1>
    </div>

    <!-- Login Form prueba bien commit -->
    <form>
      <input type="text" id="login" class="fadeIn second" name="login" placeholder="username" required>
      <input type="password" id="password" class="fadeIn third" name="login" placeholder="password" required>
      <a href="registro.php" class="btn btn-outline-danger mt-3 mb-2"><li class="fas fa-address-card"></li> Registrarse</a>
      <button type="submit" class="btn btn-success mt-3 mb-2"><li class="fas fa-sign-in-alt"></li> Entrar</button>    
    </form>
  </div>
</div>
</body>
</html>