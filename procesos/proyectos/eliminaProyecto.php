<?php

    session_start();
    require_once "../../clases/Proyectos.php";
    $Proyectos = new Proyectos();

    echo $Proyectos->eliminarProyecto($_POST['idProyecto']);

?>