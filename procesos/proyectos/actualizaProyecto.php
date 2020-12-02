<?php
        
    require_once "../../clases/Proyectos.php";
    $proyectos = new Proyectos();                

    $datos = array( 
        "idProyecto" => $_POST['idProyecto'],                    
        "nomResidenteU" => $_POST['nomResidenteU'],
        "emailResidenteU" => $_POST['emailResidenteU'],
        "matriculaU" => $_POST['matriculaU'],        
        "carreraU" => $_POST['carreraU'],
        "semestreU" => $_POST['semestreU'],
        "fechaInicioU" => $_POST['fechaInicioU'],
        "fechaTerminoU" => $_POST['fechaTerminoU'],
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