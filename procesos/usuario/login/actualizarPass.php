<?php
 
 require_once "../../../clases/Usuario.php";

 $email = $_POST['email'];
 $password = sha1($_POST['password']);
 $usuarioObj = new Usuario();
 $datos = array("email" => $email,
                   "password" => $password);

 echo $usuarioObj->actualizaPassword($datos);

?>