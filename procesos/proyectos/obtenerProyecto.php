<?php

    require_once "../../clases/Proyectos.php";
    $Proyectos = new Proyectos();

    echo json_encode($Proyectos->obtenerProyecto($_POST['idProyecto']));

?>