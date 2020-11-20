<?php

 include_once "../clases/Conexion.php";
 $conexion = Conectar::conexion();
 $idUsuario = $_SESSION['idUsuario'];
 $sql = "SELECT id_usuario, nombre FROM t_usuarios WHERE id_usuario='$idUsuario'";
 $result = $conexion->query($sql);
 $row = $result->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0 shrink-to-fit=no">    
    <link rel="stylesheet" href="../librerias/bootstrap4/bootstrap.min.css">
    <link rel="stylesheet" href="../librerias/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../librerias/fontawesome/css/all.css">
    <link rel="stylesheet" href="../librerias/datatable/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../css/estilos.css">    
    <title>Gestor</title>
    
</head>
<body class="color-body">
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark static-top bgnav sticky-top">
  <div class="container">
    <a class="navbar-brand" href="inicio.php">
          <img src="../img/logo.png" alt="" width="50px">          
        </a>
        <h5 class="text-info sh-usr">Hola <?php echo utf8_decode($row['nombre']); ?> </h5>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ml-auto layout">
        <li class="nav-item active">
          <a class="nav-link" href="inicio.php"><span class="fas fa-home mr-1"></span>Inicio
                <span class="sr-only">(current)</span>
              </a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="categorias.php"><span class="far fa-folder mr-1"></span>Categorías</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="gestor.php"><span class="fas fa-file mr-1"></span>Archivos</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="formatoProyecto.php"><span class="fas fa-file-alt mr-1"></span>Proyectos</a>
        </li>          
        <li class="nav-item">
          <a class="nav-link text-danger" href="../procesos/usuario/salir.php" style="font-weight: bold;"><strong><span class="icono fas fa-power-off text-danger mr-1"></span>Salir</strong></a>
        </li>
      </ul>
    </div>
  </div>
</nav>