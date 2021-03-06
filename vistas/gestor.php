<?php 
  
  session_start();
  if(isset($_SESSION['usuario'])){
  
  include "header.php";

?>

<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">Gestor de archivos</h1>
        <!-- Button trigger modal AGREGAR ARCHIVOS -->
        <span class="btn btn-success" data-toggle="modal" data-target="#modalAgregarArchivos">
            <span class="fas fa-plus-circle mr-2"></span>Agregar archivos
        </span>
        <hr>
        <div id="tablaGestorArchivos"></div>
    </div>
</div>


<!-- Modal para AGREGAR ARCHIVOS-->
<div class="modal fade" id="modalAgregarArchivos" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Subir archivos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="frmArchivos" enctype="multipart/form-data" method="post">
                    <label for="">Categoría:</label>
                    <div id="categoriasLoad"></div>
                    <label for="">Selecciona archivos:</label>
                    <input type="file" name="archivos[]" id="archivos[]" class="form-control" multiple="">
                </form>
                <p class="alert-danger"><b>Nota:&nbsp;</b>tamaño máximo soportado 480 MB.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarArchivos">Guardar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal para VISUALIZAR LOS ARCHIVOS-->
<div class="modal fade" id="visualizarArchivo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Vista previa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="archivoObtenido"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>

<?php include "footer.php"; ?>

<script src="../js/gestor.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#tablaGestorArchivos').load("gestor/tablaGestor.php");
    $('#categoriasLoad').load("categorias/selectCategorias.php");

    $('#btnGuardarArchivos').click(function() {
        agregarArchivosGestor();
    });
});
</script>

<?php
  }else{
    header("location:../index.php");
  }
?>