<?php

    require_once "Conexion.php";

    class Gestor extends Conectar{
        public function agregaRegistroArchivo($datos){
            $conexion = Conectar::conexion();
            $sql = "INSERT INTO t_archivos (id_usuario,id_categoria,nombre,tipo,ruta) VALUES (?,?,?,?,?)";
            $query = $conexion->prepare($sql);
            $query->bind_param("iisss", $datos['idUsuario'],
                                        $datos['idCategoria'],
                                        $datos['nombreArchivo'],
                                        $datos['tipo'],
                                        $datos['ruta']);
            $respuesta = $query->execute();
            $query->close();

            return $respuesta;
        }
    }

?>