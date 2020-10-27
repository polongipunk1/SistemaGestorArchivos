<?php

require_once "Conexion.php";

 class Usuario extends Conectar {
     public function agregarUsuario($datos) {
		 $conexion = Conectar::conexion();

		 if(self::buscarUsuarioRepetido($datos['usuario'])){
			 return 2;
		 }else{
			$sql = "INSERT INTO t_usuarios (nombre, apellidos, carrera, semestre, email, no_empleado, telefono, usuario, password)
			VALUES (?,?,?,?,?,?,?,?,?)";

            $query = $conexion->prepare($sql);
            $query->bind_param('sssisssss', $datos['nombre'],
					   $datos['apellidos'],
					   $datos['carrera'],
					   $datos['semestre'],
					   $datos['email'],
					   $datos['no_empleado'],
					   $datos['telefono'],
					   $datos['usuario'],
					   $datos['password']);

            $exito = $query->execute();
            $query->close();
            return $exito;
		 }
		 
	 }
	 
	 public function buscarUsuarioRepetido($usuario){
		$conexion = Conectar::conexion();

		$sql = "SELECT usuario FROM t_usuarios WHERE usuario = '$usuario'";
		$result = mysqli_query($conexion, $sql);

		$datos = mysqli_fetch_array($result);

		if($datos['usuario'] != "" || $datos['usuario'] == $usuario){
			return 1;
		}else{
			return 0;
		}
	 }
 }
?>