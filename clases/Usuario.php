<?php

require_once "Conexion.php";

 class Usuario extends Conectar {
	 //Metodo para Registrar usuario
     public function agregarUsuario($datos) {
		 $conexion = Conectar::conexion();

		 if(self::buscarUsuarioRepetido($datos['usuario'])){
			 return 2;
		 }else{
			$sql = "INSERT INTO t_usuarios (nombre, apellidos, carrera, email, no_empleado, telefono, usuario, password)
			VALUES (?,?,?,?,?,?,?,?)";

            $query = $conexion->prepare($sql);
            $query->bind_param('ssssssss', $datos['nombre'],
					   $datos['apellidos'],
					   $datos['carrera'],					   
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
	 //Metodo para Validar usuario repetido al registrarse
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
	 //Metodo para Iniciar sesion
	 public function login($usuario, $password){
		$conexion = Conectar::conexion();

		$sql = "SELECT count(*) as existeUsuario FROM t_usuarios WHERE usuario = '$usuario' AND password = '$password'";
		$result = mysqli_query($conexion, $sql);

		$respuesta = mysqli_fetch_array($result)['existeUsuario'];

		if($respuesta > 0){
			$_SESSION['usuario'] = $usuario;
			
			$sql = "SELECT id_usuario FROM t_usuarios WHERE usuario = '$usuario' AND password = '$password'";
			$result = mysqli_query($conexion, $sql);
			$idUsuario = mysqli_fetch_row($result)[0];

			$_SESSION['idUsuario'] = $idUsuario;

			return 1;
		}else{
			return 0;
		}
	 }
 }
?>