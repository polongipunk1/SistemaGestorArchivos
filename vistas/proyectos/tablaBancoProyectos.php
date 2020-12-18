<?php
    
    session_start();
    require_once "../../clases/Conexion.php";
    $c = new Conectar();
    $conexion = $c->conexion();
    $idUsuario = $_SESSION['idUsuario'];

    $sql = "SELECT
                proyectos.id_proyecto as idProyecto,
                usuario.nombre as nombreUsuario,
                categorias.nombre as categoria,    
                proyectos.nomResidente as nombreResidente,
                proyectos.matricula as matricula,
                proyectos.nomProyecto as nombreProyecto,
                proyectos.responsable as nombreResponsable,
                proyectos.insert as fecha
            FROM
                t_proyectos AS proyectos
                    INNER JOIN
                t_usuarios AS usuario ON proyectos.id_usuario = usuario.id_usuario
                    INNER JOIN
                t_categorias AS categorias ON proyectos.id_categoria = categorias.id_categoria";

    $result = mysqli_query($conexion, $sql);

?>


<div class="row">
    <div class="col-sm-12">
        <div class="table-responsive">
            <table class="table table-hover table-dark text-center" id="tablaProyectosDataTable">
                <thead>
                    <tr>
                        <th>Matrícula</th>
                        <th>Residente</th>
                        <th>Categoría</th>
                        <th>Nombre del proyecto</th>
                        <th>Asesor Externo</th>
                        <th>Detalle</th>                                                
                    </tr>
                </thead>
                <tbody>

                    <?php
                        while($mostrar = mysqli_fetch_array($result)){
                            $idProyecto = $mostrar['idProyecto'];            
                    ?>

                    <tr>
                        <td> <?php echo $mostrar['matricula'] ?> </td>
                        <td> <?php echo $mostrar['nombreResidente'] ?> </td>
                        <td> <?php echo $mostrar['categoria'] ?> </td>
                        <td> <?php echo $mostrar['nombreProyecto'] ?> </td>
                        <td> <?php echo $mostrar['nombreResponsable'] ?> </td>
                        <td>
                            <span class="btn btn-info btn-sm"
                                onclick="obtenerDatosProyecto('<?php echo $idProyecto ?>')" data-toggle="modal"
                                data-target="#modalDetalleProyecto">
                                <span class="fas fa-eye"></span>
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
$(document).ready(function() {
    $('#tablaProyectosDataTable').DataTable({
        "language": idioma_español
    });
});
var idioma_español = {
    "sProcessing": "Procesando...",
    "sLengthMenu": "Mostrar _MENU_ registros",
    "sZeroRecords": "No se encontraron resultados",
    "sEmptyTable": "Ningún dato disponible en esta tabla",
    "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
    "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
    "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
    "sInfoPostFix": "",
    "sSearch": "Buscar:",
    "sUrl": "",
    "sInfoThousands": ",",
    "sLoadingRecords": "Cargando...",
    "oPaginate": {
        "sFirst": "Primero",
        "sLast": "Último",
        "sNext": "Siguiente",
        "sPrevious": "Anterior"
    },
    "oAria": {
        "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
        "sSortDescending": ": Activar para ordenar la columna de manera descendente"
    },
    "buttons": {
        "copy": "Copiar",
        "colvis": "Visibilidad"
    }
}
</script>