<?php

 session_start();
 require_once "../../clases/Proyectos.php";

 $idCategoria = $_POST['categoriasArchivos'];
 $idUsuario = $_SESSION['idUsuario'];

 $fechaInicio = explode("-", $_POST['fechaInicio']);
 $fechaInicio = $fechaInicio[2] . "-" . $fechaInicio[1] . "-" . $fechaInicio[0];

 $fechaTermino = explode("-", $_POST['fechaTermino']);
 $fechaTermino = $fechaTermino[2] . "-" . $fechaTermino[1] . "-" . $fechaTermino[0];

 $datos = array (
        "idUsuario" => $idUsuario,
        "idCategoria" => $idCategoria,
        "nomResidente" => $_POST['nomResidente'],
        "emailResidente" => $_POST['emailResidente'],
        "matricula" => $_POST['matricula'],        
        "carrera" => $_POST['carrera'],
        "semestre" => $_POST['semestre'],
        "fechaInicio" => $fechaInicio,
        "fechaTermino" => $fechaTermino,
        "nomProyecto" => $_POST['nomProyecto'],
        "responsable" => $_POST['responsable'],
        "caracteristicas" => $_POST['caracteristicas'],
        "objetivo" => $_POST['objetivo'],
        "justificacion" => $_POST['justificacion'],
        "descripcion" => $_POST['descripcion'],
        "nomEmpresa" => $_POST['nomEmpresa'],
        "telefono" => $_POST['telefono'],
        "direccion" => $_POST['direccion'],
        "emailEmpresa" => $_POST['emailEmpresa']        
        );
              
        $proyectos = new Proyectos();
        echo $proyectos->agregarProyecto($datos);            
       
?>