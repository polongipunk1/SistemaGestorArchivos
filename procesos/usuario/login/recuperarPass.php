<?php
 
 require_once "../../../clases/Usuario.php";

 $email = $_POST['email'];
 $usuarioObj = new Usuario();

 echo $usuarioObj->bucarCorreo($email);

?>