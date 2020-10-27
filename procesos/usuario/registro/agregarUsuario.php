<?php

 require_once "../../../clases/Usuario.php";
 
 $password = sha1($_POST['password']);
 $datos = array (
        "nombre" => $_POST['nombre'],
        "apellidos" => $_POST['apellidos'],
        "carrera" => $_POST['carrera'],
        "semestre" => $_POST['semestre'],
        "email" => $_POST['email'],
        "no_empleado" => $_POST['no_empleado'],
        "telefono" => $_POST['telefono'],
        "usuario" => $_POST['usuario'],
        "password" => $password        
        );

 $usuario = new Usuario();
 echo $usuario->agregarUsuario($datos);

?>