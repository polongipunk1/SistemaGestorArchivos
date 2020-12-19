<html lang="es" class="h-100">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">
    <link rel="stylesheet" href="librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="librerias/fontawesome/css/all.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Recuperar Contraseña</title>
</head>

<body id="body-password">
    <div class="container h-100">
        <div class="row justify-content-center h-100">
            <div class="col-md-6 align-self-center mt-3 shadow-form mb-3" style="opacity: 0.8;">
                <img class="avatar" src="img/candado.png" alt="">
                <h3 class="text-center mb-4 sombraR">Recuperar contraseña</h3>
                <form id="frmRecuperarPassword" method="POST" onsubmit="return consultarCorreo()" class="text-center">
                    <div class="form-row justify-content-center">
                        <div class="form-group col-md-8">
                            <label for="email" class="font-weight-bold">Correo electrónico:</label>
                            <input type="email" name="email" id="email" class="form-control text-center"
                                placeholder="Ingrese su correo electrónico" required>
                        </div>
                        <div class="form-group col-md-8">
                            <label for="password" class="font-weight-bold" id="lblpassword">Contraseña nueva:</label>
                            <input type="password" name="password" id="password" class="form-control text-center"
                                placeholder="Ingrese una nueva contraseña">
                        </div>
                    </div>
                    <a href="index.php" class="btn btn-outline-primary mt-2 mb-2">
                        <span class="fas fa-sign-in-alt mr-2"></span>Entrar
                    </a>
                    <button type="submit" class="btn btn-success" id="btnValidar">Validar</button>
                    <button type="submit" class="btn btn-warning" id="btnActualizar"
                        onclick="actualizarPassword()">Actualizar</button>
                </form>
                <h6 class="text-center alert-danger mt-2"><b>NOTA:&nbsp;</b>Debe ingresar el correo con el cual se
                    registro previamente en el
                    sistema.</h6>
            </div>
        </div>
    </div>

    <script src="librerias/jquery-3.5.1.min.js"></script>
    <script src="librerias/sweetalert.min.js"></script>
    <script type="text/javascript">
    $(document).ready(function() {
        $("#lblpassword").hide();
        $("#password").hide();
        $("#btnActualizar").hide();
        $("#password").prop('disabled', true);
        $('#password').prop('required', true);
    });

    function consultarCorreo() {
        $.ajax({
            method: "POST",
            data: $('#frmRecuperarPassword').serialize(),
            url: "procesos/usuario/login/recuperarPass.php",
            success: function(respuesta) {
                console.log(respuesta);
                respuesta = respuesta.trim();

                if (respuesta == 1) {
                    //$("#frmRecuperarPassword")[0].reset();                    
                    swal("Correo válido", "Asigne una nueva contraseña", "success");
                    $("#email").prop('readonly', true);
                    $("#lblpassword").show();
                    $("#password").show();
                    $("#btnValidar").hide();
                    $("#btnActualizar").show();
                    $("#password").prop('disabled', false);
                } else {
                    swal("No se encontro el correo", "", "error");
                }
            }
        });
        return false;
    }

    function actualizarPassword() {
        //email = $("#email").val();
        //password = $("#password").val();
        //console.log(email);
        //console.log(password);
        if (password == "") {
            swal("Ingrese una contraseña", "", "warning");
        } else {
            $.ajax({
                method: "POST",
                data: "email=" + email + "&password=" + password,
                url: "procesos/usuario/login/actualizarPass.php",
                success: function(respuesta) {
                    console.log(respuesta);
                    respuesta = respuesta.trim();

                    if (respuesta == 1) {
                        $("#frmRecuperarPassword")[0].reset();
                        swal("Contraseña actualizada correctamente", "", "success");
                        $("#lblpassword").hide();
                        $("#password").hide();
                        $("#btnActualizar").hide();
                        $("#email").prop('readonly', false);
                        $("#btnValidar").show();
                    } else {
                        swal("Error al actualizar contraseña", "", "error");
                    }
                }
            });
            return false;
        }
    }
    </script>
</body>

</html>