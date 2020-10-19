<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">    
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/estilos.css">

    <title>Registro</title>
</head>
<body>
<div class="container">                                                        
        <div class="row ">            
            <div class="col-sm-4"></div>
            <div class="col-sm-4 mt-3 shadow-form mb-3">            
            <img class="avatar" src="img/avatar.png" alt="">            
            <h3 class="text-center mb-4">Registro de usuario</h3>
                <form id="frmRegistro">
                    <label for="nombre" class="font-weight-bold">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre" required>                    
                    <label for="apellidos" class="font-weight-bold">Apellidos:</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control" placeholder="Ingrese su apellidos" required>
                    <label for="fechaNacimiento" class="font-weight-bold">Fecha de nacimiento:</label>
                    <input type="date" name="fechaNacimiento" id="fechaNacimiento" class="form-control" required>
                    <label for="correo" class="font-weight-bold">Correo electrónico:</label>
                    <input type="email" name="correo" id="correo" class="form-control" placeholder="Ingrese un correo electrónico" required>
                    <label for="matricula" class="font-weight-bold">Matrícula:</label>
                    <input type="text" name="matricula" id="matricula" class="form-control" placeholder="Ingrese su matrícula institucional" pattern = "[0-9]+" required>
                    <label for="usuario" class="font-weight-bold">Nombre de usuario:</label>
                    <input type="text" name="usuario" id="usuario" class="form-control" placeholder="Ingrese un nombre de usuario" required>
                    <label for="password" class="font-weight-bold">Contraseña:</label>
                    <input type="password" name="password" id="password" class="form-control" placeholder="Ingrese una contraseña" required>
                    <div class="form-group">
                        <div class="col-md-12 pt-3 text-center ">
                        <a href="registro.php" class="btn btn-success mt-2 mb-2"><li class="fas fa-sign-in-alt"></li> Entrar</a>  
                        <button type="submit" value="Registrarse" class="btn btn-primary mt-2 mb-2">Registrarse</button>
                        </div>
                    </div>
                    </div>
                    </div>                       
                </form>
            </div>            
        </div>
    </div>  
</body>
</html>