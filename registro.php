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
                <form id="frmRegistro" method="POST" onsubmit="return agregarUsuarioNuevo()">
                    <label for="nombre" class="font-weight-bold">Nombre:</label>
                    <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Ingrese su nombre"
                        required>
                    <label for="apellidos" class="font-weight-bold">Apellidos:</label>
                    <input type="text" name="apellidos" id="apellidos" class="form-control"
                        placeholder="Ingrese sus apellidos" required>
                    <label for="carrera" class="font-weight-bold">Carrera:</label>
                    <select name="carrera" id="carrera" class="form-control">
                        <option value="Ingeniería Civil">Ingeniería Civil</option>
                        <option value="Licenciatura en Biología">Licenciatura en Biología</option>
                        <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales
                        </option>
                        <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                        <option value="Licenciatura en Administración">Licenciatura en Administración</option>
                        <option value="Ingeniería Mecatrónica">Ingeniería Mecatrónica</option>
                        <option value="Gastronomía">Gastronomía</option>
                    </select>
                    <label for="email" class="font-weight-bold">Correo electrónico:</label>
                    <input type="email" name="email" id="email" class="form-control"
                        placeholder="Ingrese un correo electrónico" required>
                    <label for="no_empleado" class="font-weight-bold">No. de empleado:</label>
                    <input type="text" name="no_empleado" id="no_empleado" class="form-control"
                        placeholder="Ingrese su número de empleado" required>
                    <label for="telefono" class="font-weight-bold">Teléfono celular:</label>
                    <input type="text" name="telefono" id="telefono" class="form-control" placeholder="10 digitos"
                        pattern="[0-9]+" MaxLength="10" MinLength="10" required>
                    <label for="usuario" class="font-weight-bold">Nombre de usuario:</label>
                    <input type="text" name="usuario" id="usuario" class="form-control"
                        placeholder="Ingrese un nombre de usuario" required>
                    <label for="password" class="font-weight-bold">Contraseña:</label>
                    <input type="password" name="password" id="password" class="form-control"
                        placeholder="Ingrese una contraseña" required>
                    <div class="form-group">
                        <div class="col-md-12 pt-3 text-center ">
                            <a href="index.php" class="btn btn-success mt-2 mb-2">
                                <li class="fas fa-sign-in-alt"></li> Entrar
                            </a>
                            <button value="Registrarse" class="btn btn-primary mt-2 mb-2">Registrarse</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="librerias/jquery-3.5.1.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>

    <script type="text/javascript">
    function agregarUsuarioNuevo() {
        $.ajax({
            method: "POST",
            data: $('#frmRegistro').serialize(),
            url: "procesos/usuario/registro/agregarUsuario.php",
            success: function(respuesta) {
                respuesta = respuesta.trim();

                if (respuesta == 1) {
                    $("#frmRegistro")[0].reset();
                    swal("Registro exitoso!!", "Ha sido registrado con éxito", "success");
                } else if (respuesta == 2) {
                    swal("Este usuario ya existe, por favor ingrese otro")
                } else {
                    swal("Registro fallido", "Verifique los campos", "error");
                }
            }
        });
        return false;
    }
    </script>
</body>

</html>