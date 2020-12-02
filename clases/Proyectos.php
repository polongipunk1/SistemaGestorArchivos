<?php

require_once "Conexion.php";

 class Proyectos extends Conectar{
     //Metodo para guardar proyecto
     public function agregarProyecto($datos) {
        $conexion = Conectar::conexion();

        $sql = "INSERT INTO t_proyectos (id_usuario,id_categoria,nomResidente,emailResidente,matricula,carrera,
        semestre,fechaInicio,fechaTermino,nomProyecto,responsable,caracteristicas,objetivo,justificacion,
        descripcion,nomEmpresa,telefono,direccion,emailEmpresa)
        VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

        $query = $conexion->prepare($sql);
        $query->bind_param("iissssissssssssssss",
                    $datos['idUsuario'],
                    $datos['idCategoria'],
                    $datos['nomResidente'],
                    $datos['emailResidente'],
                    $datos['matricula'],        
                    $datos['carrera'],
                    $datos['semestre'],
                    $datos['fechaInicio'],
                    $datos['fechaTermino'],
                    $datos['nomProyecto'],
                    $datos['responsable'],
                    $datos['caracteristicas'],
                    $datos['objetivo'],
                    $datos['justificacion'],
                    $datos['descripcion'],
                    $datos['nomEmpresa'],
                    $datos['telefono'],
                    $datos['direccion'],
                    $datos['emailEmpresa']);

        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
        
        
    }

    public function obtenerProyecto($idProyecto){
        $conexion = Conectar::conexion();        

        $sql = "SELECT 
        categorias.nombre AS categoria, proyectos.*
        FROM
        t_proyectos AS proyectos
            INNER JOIN
        t_categorias AS categorias ON proyectos.id_categoria = categorias.id_categoria
            AND proyectos.id_proyecto = '$idProyecto'";        

        $result = mysqli_query($conexion, $sql);        
        $proyecto = mysqli_fetch_array($result);

        $datos = array("idProyecto" => $proyecto['id_proyecto'],
                        "idCategoria" => $proyecto['id_categoria'],
                        "categoria" => $proyecto['categoria'],
                        "nomResidente" => $proyecto['nomResidente'],
                        "emailResidente" => $proyecto['emailResidente'],
                        "matricula" => $proyecto['matricula'],
                        "carrera" => $proyecto['carrera'],
                        "semestre" => $proyecto['semestre'],
                        "fechaInicio" => $proyecto['fechaInicio'],
                        "fechaTermino" => $proyecto['fechaTermino'],
                        "nomProyecto" => $proyecto['nomProyecto'],
                        "responsable" => $proyecto['responsable'],
                        "caracteristicas" => $proyecto['caracteristicas'],
                        "objetivo" => $proyecto['objetivo'],
                        "justificacion" => $proyecto['justificacion'],
                        "descripcion" => $proyecto['descripcion'],
                        "nomEmpresa" => $proyecto['nomEmpresa'],
                        "telefono" => $proyecto['telefono'],
                        "direccion" => $proyecto['direccion'],
                        "emailEmpresa" => $proyecto['emailEmpresa']);
        
        return $datos;
    }

    public function actualizarProyectos($datos){
        $conexion = Conectar::conexion();

        $sql = "UPDATE t_proyectos SET                        
                        nomResidente = ?,
                        emailResidente = ?,
                        matricula = ?,
                        carrera = ?,
                        semestre = ?,
                        fechaInicio = ?,
                        fechaTermino = ?,
                        nomProyecto = ?,
                        responsable = ?,
                        caracteristicas = ?,
                        objetivo = ?,
                        justificacion = ?,
                        descripcion = ?,
                        nomEmpresa = ?,
                        telefono = ?,
                        direccion = ?,
                        emailEmpresa = ?
                        WHERE id_proyecto = ?";

        $query = $conexion->prepare($sql);
        $query->bind_param("ssssissssssssssssi",                                                        
                            $datos['nomResidenteU'],
                            $datos['emailResidenteU'],
                            $datos['matriculaU'],        
                            $datos['carreraU'],
                            $datos['semestreU'],
                            $datos['fechaInicioU'],
                            $datos['fechaTerminoU'],
                            $datos['nomProyectoU'],
                            $datos['responsableU'],
                            $datos['caracteristicasU'],
                            $datos['objetivoU'],
                            $datos['justificacionU'],
                            $datos['descripcionU'],
                            $datos['nomEmpresaU'],
                            $datos['telefonoU'],
                            $datos['direccionU'],
                            $datos['emailEmpresaU'],
                            $datos['idProyecto']);
        
        $respuesta = $query->execute();
        $query->close();
        return $respuesta;
    }
 }

?>