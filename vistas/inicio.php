<?php
 session_start();
 if(isset($_SESSION['usuario'])){
    include "header.php";
    ?>


<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4 text-center">
            <span class="icono fas fa-university" style="color: #068a87;"></span>
            Banco de proyectos
            <span class="icono fas fa-university" style="color: #068a87;"></span>
        </h1>
        <hr>
        <div class="row">
            <div class="col-sm-12">
                <div id="tablaBancoProyectos"></div>
            </div>
        </div>
    </div>
</div>


<!-- Modal DETALLE PROYECTO-->
<div class="modal fade" id="modalDetalleProyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header alert-info">
                <h4 class="modal-title" id="exampleModalLabel">Detalle del proyecto</h4>
                <button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="frmDetalleProyecto">
                    <input type="text" id="idProyecto" name="idProyecto" hidden>
                    <h5 class="text-center">Datos del residente</h5>
                    <div class="form-row">
                        <div class="form-group col-md-5">
                            <label for="nomResidenteU">Nombre:</label>
                            <input type="text" class="form-control" name="nomResidenteU" id="nomResidenteU" readonly>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="emailResidenteU">Correo electrónico:</label>
                            <input type="email" class="form-control" name="emailResidenteU" id="emailResidenteU"
                                readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="matriculaU">Matrícula:</label>
                            <input type="text" class="form-control" name="matriculaU" id="matriculaU" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="carreraU">Carrera:</label>
                            <input name="carreraU" id="carreraU" class="form-control" readonly>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="" class="alert-warning" style="font-weight: bold;" id="categoriasArchivosU">
                                Categoría del proyecto:</label>
                            <input id="nombreCategoria" class="form-control mb-1" readonly>
                        </div>
                        <div class="form-group col-md-2">
                            <label for="semestreU">Semestre:</label>
                            <input name="semestreU" id="semestreU" class="form-control" readonly>

                        </div>
                        <div class="form-group col-md-5">
                            <label for="fechaInicioU">Fecha de inicio de la
                                residencia:</label>
                            <input type="text" class="form-control readonly" name="fechaInicioU" id="fechaInicioU"
                                readonly>
                        </div>
                        <div class="form-group col-md-5">
                            <label for="fechaTerminoU">Fecha de término de la
                                residencia:</label>
                            <input type="text" class="form-control readonly" name="fechaTerminoU" id="fechaTerminoU"
                                readonly>
                        </div>
                    </div>
                    <h5 class="text-center">Datos del proyecto</h5>
                    <div class="form-group">
                        <label for="nomProyectoU">Nombre:</label>
                        <input type="text" class="form-control" name="nomProyectoU" id="nomProyectoU" readonly>
                    </div>
                    <div class="form-group">
                        <label for="responsableU">Responsable del proyecto (Asesor
                            externo):</label>
                        <input type="text" class="form-control" name="responsableU" id="responsableU" readonly>
                    </div>
                    <div class="form-group">
                        <label for="caracteristicasU">Características:</label>
                        <textarea type="text" class="form-control" name="caracteristicasU" id="caracteristicasU"
                            readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label for="objetivoU">Objetivo:</label>
                        <textarea type="text" class="form-control" name="objetivoU" id="objetivoU" readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label for="justificacionU">Justificación:</label>
                        <textarea type="text" class="form-control" name="justificacionU" id="justificacionU"
                            readonly></textarea>
                    </div>
                    <div class="form-group">
                        <label for="descripcionU">Descripción del proyecto:</label>
                        <textarea type="text" class="form-control" name="descripcionU" id="descripcionU"
                            readonly></textarea>
                    </div>
                    <h5 class="text-center">Datos de la empresa o institución</h5>
                    <div class="form-group">
                        <label for="nomEmpresaU">Nombre:</label>
                        <input type="text" class="form-control" name="nomEmpresaU" id="nomEmpresaU" readonly>
                    </div>
                    <div class="form-group">
                        <label for="direccionU">Dirección:</label>
                        <input type="text" class="form-control" name="direccionU" id="direccionU" readonly>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-9">
                            <label for="emailEmpresaU">Correo:</label>
                            <input type="email" class="form-control" name="emailEmpresaU" id="emailEmpresaU" readonly>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefonoU">Teléfono:</label>
                            <input type="text" class="form-control" name="telefonoU" id="telefonoU" readonly>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>


<?php
    include "footer.php";
 }else{
     header("location:../index.php");
 }
?>


<script src="../js/proyectos.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    $('#tablaBancoProyectos').load("proyectos/tablaBancoProyectos.php");
});
</script>