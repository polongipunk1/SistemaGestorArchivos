<?php

    session_start();
    require_once "../../clases/Conexion.php";
    $idUsuario = $_SESSION['idUsuario'];
    $conexion = new Conectar();
    $conexion = $conexion->conexion();

?>

<div class="row">
    <div class="col-sm-12">
      <div class="table-responsive">
        <table class="table table-hover table-dark" id="tablaCategoriasDataTable">
          <thead>
            <tr>
              <th>Nombre</th>
              <th>Fecha</th>
              <th>Editar</th>
              <th>Eliminar</th>              
            </tr>
          </thead>          
          <tbody>

          <?php
              
              $sql = "SELECT id_categoria,nombre, fechaInsert 
                      FROM t_categorias WHERE id_usuario = '$idUsuario'";
              $result = mysqli_query($conexion, $sql);

              while($mostrar = mysqli_fetch_array($result)){
                  $idCategoria = $mostrar['id_categoria'];
          ?>

          <tr>
            <td> <?php echo $mostrar['nombre'] ?> </td>
            <td> <?php echo $mostrar['fechaInsert'] ?></td>
            <td style="text-align: center;">
              <span class="btn btn-warning btn-sm"
                    data-toggle="modal" data-target="#modalActualizarCategoria"
                    onclick="obtenerDatosCategoria('<?php echo $idCategoria ?>')">
                <span class="fas fa-edit"></span>
              </span>
            </td>            
            <td style="text-align: center;">
              <span class="btn btn-danger btn-sm" 
                    onclick="eliminarCategoria('<?php echo $idCategoria ?>')">
                <span class="fas fa-trash-alt"></span>
              </span>
            </td>
          </tr>

        <?php
              }
        ?>

          </tbody>
        </table>
      </div>
    </div>
  </div>
    
  <script type="text/javascript">
  $(document).ready(function(){
 $('#tablaCategoriasDataTable').DataTable({
   "language": idioma_español
 });
  });
  var idioma_español = {
    "sProcessing":     "Procesando...",
    "sLengthMenu":     "Mostrar _MENU_ registros",
    "sZeroRecords":    "No se encontraron resultados",
    "sEmptyTable":     "Ningún dato disponible en esta tabla",
    "sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix":    "",
    "sSearch":         "Buscar:",
    "sUrl":            "",
    "sInfoThousands":  ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst":    "Primero",
        "sLast":     "Último",
        "sNext":     "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
  }
  </script>