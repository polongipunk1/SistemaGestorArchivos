<?php

session_start();

if(isset($_SESSION['usuario'])){
    include "header.php";
    ?>

    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">Proyectos de residencia</h1>
            <div class="row">
            <!-- Button trigger modal -->
                <div class="col-sm-4">
                    <span class="btn btn-success" data-toggle="modal" data-target="#modalAgregaProyecto">
                        <span class="fas fa-file-signature mr-2"></span>Generar nuevo proyecto
                    </span>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-sm-12">
                    <div id="tablaProyectos">

                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal para AGREGAR NUEVO PROYECTO-->
<div class="modal fade" id="modalAgregaProyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header alert-success">
				<h4 class="modal-title" id="exampleModalLabel">Información del proyecto</h4>
				<button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="" id="frmProyectos" autocomplete="off">
                <h5 class="text-center">Datos del residente</h5>
                <div class="form-row">                    
                    <div class="form-group col-md-5">
                        <label for="nombreResidente">Nombre:</label>
                        <input type="text" class="form-control" id="nombreResidente"
                        placeholder="Ingrese nombre completo del residente" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="correoResidente">Correo electrónico:</label>
                        <input type="text" class="form-control" id="correoResidente"
                        placeholder="Correo electrónico del residente" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="matricula">Matrícula:</label>
                        <input type="text" class="form-control" id="matricula"
                        placeholder="Matrícula" pattern = "[0-9]+" MaxLength = "8" required>
                    </div>                                        
                    <div class="form-group col-md-6">
                        <label for="carrera">Carrera:</label>
                        <select name="carrera" id="carrera" class="form-control">
                            <option value="Ingeniería Civil">Ingeniería Civil</option>
                            <option value="Licenciatura en Biología">Licenciatura en Biología</option>
                            <option value="Ingeniería en Sistemas Computacionales">Ingeniería en Sistemas Computacionales</option>
                            <option value="Ingeniería Industrial">Ingeniería Industrial</option>
                            <option value="Licenciatura en Administración">Licenciatura en Administración</option>
                            <option value="Ingeniería Mecatrónica">Ingeniería Mecatrónica</option>
                            <option value="Gastronomía">Gastronomía</option>
                        </select>
					</div>
                    <div class="form-group col-md-6">
                        <label for="">Categoría donde desea guardar el proyecto:</label>
                        <div id="categoriasLoad"></div>                    
                    </div>
                    <div class="form-group col-md-2">
                        <label for="semestre">Semestre:</label>
                        <select name="semestre" id="semestre" class="form-control">                            
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                        </select>
                    </div>	
                    <div class="form-group col-md-5">
						<label for="fInicio">Fecha de inicio de la residencia:</label>
						<input type="text" class="form-control" id="fInicio" readonly required>
					</div>					
					<div class="form-group col-md-5">
						<label for="fTermino">Fecha de término de la residencia:</label>
						<input type="text" class="form-control" id="fTermino" readonly required>
					</div>                    
				</div>
                <h5 class="text-center">Datos del proyecto</h5> 
                <div class="form-group">
					<label for="nombreProyecto">Nombre:</label>
					<input type="text" class="form-control" id="nombreProyecto" 
                    placeholder="Ingrese el nombre del proyecto" required>
				</div>
				<div class="form-group">
					<label for="responsable">Responsable del proyecto (Nombre del docente):</label>
					<input type="text" class="form-control" id="responsable"
                    placeholder="Ingrese el nombre del responsable del proyecto" required>
				</div>				
				<div class="form-group">
					<label for="caracteristicas">Características:</label>
					<textarea type="text" class="form-control" id="caracteristicas" rows="2"
                    placeholder="Ingrese las características del proyecto" required></textarea>
				</div>
				<div class="form-group">
					<label for="objetivo">Objetivo:</label>
					<input type="text" class="form-control" id="objetivo"
                    placeholder="Ingrese el objetivo del proyecto" required>
				</div>
                <div class="form-group">
					<label for="justificacion">Justificación:</label>
					<input type="text" class="form-control" id="justificacion"
                    placeholder="Ingrese la justificación del proyecto" required>
				</div>
                <div class="form-group">
					<label for="descripcion">Descripción del proyecto:</label>
					<textarea type="text" class="form-control" id="descripcion"
                    placeholder="Ingrese la justificación del proyecto" required></textarea>
				</div>
                <h5 class="text-center">Datos de la empresa o institución</h5>
                <div class="form-row"> 
                    <div class="form-group col-md-10">
                        <label for="nombreEmpresa">Nombre:</label>
                        <input type="text" class="form-control" id="nombreEmpresa"
                        placeholder="Ingrese el nombre de la empresa o institución" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono"
                        placeholder="10 dígitos" pattern = "[0-9]+" MaxLength = "10" MinLength = "10" required>
                    </div>                    
                </div>
                <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" id="direccion"
                        placeholder="Ingrese la dirección de la empresa" required>
                    </div>
                    <div class="form-group">
                        <label for="direccion">Correo:</label>
                        <input type="text" class="form-control" id="direccion"
                        placeholder="Ingrese el correo de la empresa" required>
                    </div>                    		                                           
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" id="btnGuardarProyecto">Guardar</button>				
			</div>
		</div>
	</div>
</div>            

<!-- Modal para EDITAR CATEGRORÍA-->
<div class="modal fade" id="modalActualizarInfoProyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Actualizar información del proyecto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <form action="" id="frmActualizaInfoProyecto">
              <input type="text" id="idCategoria" name="idCategoria" hidden>
              <label for="">Ingrese el nuevo nombre de la categoría:</label>
              <input type="text" id="categoriaU" name="categoriaU" class="form-control">
          </form>      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal" id="btnCerrarUpdateCategoria">Cerrar</button>
        <button type="button" class="btn btn-warning" id="btnActualizaInfoProyecto">Actualizar</button>
      </div>
    </div>
  </div>
</div>
 

<?php
include "footer.php";
?>

<!--Dependencias de PROYECTOS, todas la funciones JS de PROYECTOS-->
<script src="../js/categorias.js"></script>
<script type="text/javascript">

    $(function(){
        var fechaA = new Date();
        var yyyy = fechaA.getFullYear()+1;

        $("#fInicio").datepicker({            
            changeMonth: true,
            changeYear: true,
            yearRange: '2020:' + yyyy,
            dateFormat: "dd-mm-yy"
        });

        $("#fTermino").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '2020:' + yyyy,
            dateFormat: "dd-mm-yy"
        });
    });

    $(document).ready(function(){
       // $('#tablaProyectos').load("categorias/tablaCategoria.php");
        $('#categoriasLoad').load("categorias/selectCategorias.php");

        $('#btnGuardarProyecto').click(function(){
            agregarCategoria();
        });

        $('#btnActualizaInfoProyecto').click(function(){
            actualizaCategoria();
        });
    });

    /*DatePicker en español*/
    $.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '< Ant',
    nextText: 'Sig >',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    weekHeader: 'Sm',
    dateFormat: 'dd/mm/yy',
    firstDay: 1,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
    };
    $.datepicker.setDefaults($.datepicker.regional['es']);

</script>

<?php
}else{
    header("location:../index.php");
}
?>