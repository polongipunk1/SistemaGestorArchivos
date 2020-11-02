<?php

    require_once "Conexion.php";

    class Gestor extends Conectar{
        public function agregaRegistroArchivo(){
            $conexion = Conectar::conexion();        
        }
    }

?>