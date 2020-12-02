<?php
        
    require_once "../../clases/Proyectos.php";
    $proyectos = new Proyectos();

    $idCategoria = $_POST['categoriasArchivosU'];        

    $fechaInicioU = explode("-", $_POST['fechaInicioU']);
    $fechaInicioU = $fechaInicioU[2] . "-" . $fechaInicioU[1] . "-" . $fechaInicioU[0];

    $fechaTerminoU = explode("-", $_POST['fechaTerminoU']);
    $fechaTerminoU = $fechaTerminoU[2] . "-" . $fechaTerminoU[1] . "-" . $fechaTerminoU[0];

    $datos = array( 
        "idProyecto" => $_POST['idProyecto'],            
        "idCategoria" => $idCategoria,
        "nomResidenteU" => $_POST['nomResidenteU'],
        "emailResidenteU" => $_POST['emailResidenteU'],
        "matriculaU" => $_POST['matriculaU'],        
        "carreraU" => $_POST['carreraU'],
        "semestreU" => $_POST['semestreU'],
        "fechaInicioU" => $fechaInicioU,
        "fechaTerminoU" => $fechaTerminoU,
        "nomProyectoU" => $_POST['nomProyectoU'],
        "responsableU" => $_POST['responsableU'],
        "caracteristicasU" => $_POST['caracteristicasU'],
        "objetivoU" => $_POST['objetivoU'],
        "justificacionU" => $_POST['justificacionU'],
        "descripcionU" => $_POST['descripcionU'],
        "nomEmpresaU" => $_POST['nomEmpresaU'],
        "telefonoU" => $_POST['telefonoU'],
        "direccionU" => $_POST['direccionU'],
        "emailEmpresaU" => $_POST['emailEmpresaU'] 
    );

    echo $proyectos->actualizarProyectos($datos);   

?>