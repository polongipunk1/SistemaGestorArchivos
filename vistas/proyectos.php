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
                    <div id="tablaProyectos"></div>
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
				<form action="" id="frmProyectos" autocomplete="off" method="POST" onsubmit="return agregarProyecto()">
                <h5 class="text-center">Datos del residente</h5>                
                <div class="form-row">                    
                    <div class="form-group col-md-5">
                        <label for="nomResidente"><b class="text-danger mr-1">*</b>Nombre:</label>
                        <input type="text" class="form-control" name="nomResidente" id="nomResidente"
                        placeholder="Ingrese nombre completo del residente" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="emailResidente"><b class="text-danger mr-1">*</b>Correo electrónico:</label>
                        <input type="email" class="form-control" name="emailResidente" id="emailResidente"
                        placeholder="Correo electrónico del residente" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="matricula"><b class="text-danger mr-1">*</b>Matrícula:</label>
                        <input type="text" class="form-control" name="matricula" id="matricula"
                        placeholder="Matrícula" pattern = "[0-9]+" MaxLength = "8" MinLength = "8" required>
                    </div>                                        
                    <div class="form-group col-md-6">
                        <label for="carrera"><b class="text-danger mr-1">*</b>Carrera:</label>
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
                        <label for="" class="text-info" style="font-weight: bold;">
                        <b class="text-danger mr-1">*</b>Categoría disponible para guardar el proyecto:</label>
                        <div id="categoriasLoad"></div>                                           
                    </div>
                    <div class="form-group col-md-2">
                        <label for="semestre"><b class="text-danger mr-1">*</b>Semestre:</label>
                        <select name="semestre" id="semestre" class="form-control">                            
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                        </select>
                    </div>	
                    <div class="form-group col-md-5">
						<label for="fechaInicio"><b class="text-danger mr-1">*</b>Fecha de inicio de la residencia:</label>
						<input type="text" class="form-control readonly" name="fechaInicio" id="fechaInicio" required>
					</div>					
					<div class="form-group col-md-5">
						<label for="fechaTermino"><b class="text-danger mr-1">*</b>Fecha de término de la residencia:</label>
						<input type="text" class="form-control readonly" name="fechaTermino" id="fechaTermino" required>
					</div>                    
				</div>
                <h5 class="text-center">Datos del proyecto</h5> 
                <div class="form-group">
					<label for="nomProyecto"><b class="text-danger mr-1">*</b>Nombre:</label>
					<input type="text" class="form-control" name="nomProyecto" id="nomProyecto" 
                    placeholder="Ingrese el nombre del proyecto" required>
				</div>
				<div class="form-group">
					<label for="responsable"><b class="text-danger mr-1">*</b>Responsable del proyecto (Asesor externo):</label>
					<input type="text" class="form-control" name="responsable" id="responsable"
                    placeholder="Ingrese el nombre del responsable del proyecto" required>
				</div>				
				<div class="form-group">
					<label for="caracteristicas"><b class="text-danger mr-1">*</b>Características:</label>
					<textarea type="text" class="form-control" name="caracteristicas" id="caracteristicas" rows="2"
                    placeholder="Ingrese las características del proyecto" required></textarea>
				</div>
				<div class="form-group">
					<label for="objetivo"><b class="text-danger mr-1">*</b>Objetivo:</label>
					<input type="text" class="form-control" name="objetivo" id="objetivo"
                    placeholder="Ingrese el objetivo del proyecto" required>
				</div>
                <div class="form-group">
					<label for="justificacion"><b class="text-danger mr-1">*</b>Justificación:</label>
					<input type="text" class="form-control" name="justificacion" id="justificacion"
                    placeholder="Ingrese la justificación del proyecto" required>
				</div>
                <div class="form-group">
					<label for="descripcion"><b class="text-danger mr-1">*</b>Descripción del proyecto:</label>
					<textarea type="text" class="form-control" name="descripcion" id="descripcion"
                    placeholder="Ingrese la justificación del proyecto" required></textarea>
				</div>
                <h5 class="text-center">Datos de la empresa o institución</h5>                
                <div class="form-group">
                        <label for="nomEmpresa"><b class="text-danger mr-1">*</b>Nombre:</label>
                        <input type="text" class="form-control" name="nomEmpresa" id="nomEmpresa"
                        placeholder="Ingrese el nombre de la empresa o institución" required>
                </div>                                                       
                <div class="form-group">
                        <label for="direccion"><b class="text-danger mr-1">*</b>Dirección:</label>
                        <input type="text" class="form-control" name="direccion" id="direccion"
                        placeholder="Ingrese la dirección de la empresa" required>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="emailEmpresa"><b class="text-danger mr-1">*</b>Correo:</label>
                        <input type="email" class="form-control" name="emailEmpresa" id="emailEmpresa"
                        placeholder="Ingrese el correo de la empresa" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefono"><b class="text-danger mr-1">*</b>Teléfono:</label>
                        <input type="text" class="form-control" name="telefono" id="telefono"
                        placeholder="10-14 digítos" pattern = "[0-9]+" MaxLength = "14" MinLength = "10" required>
                    </div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary" id="btnGuardarProyecto">Guardar</button>				
                </div>                                                   		                                           
				</form>                                              
			</div>			
		</div>
	</div>
</div>            



<!-- Modal para ACTUALIZAR PROYECTO-->
<div class="modal fade" id="modalActualizarProyecto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">

    <div class="modal-header alert-success">
				<h4 class="modal-title" id="exampleModalLabel">Información del proyecto</h4>                
				<button type="button" class="close text-danger" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="frmActualizarProyecto" method="POST" onsubmit="return actualizaProyecto()">
                <input type="text" id="idProyecto" name="idProyecto" hidden>                
                <h5 class="text-center">Datos del residente</h5>                
                <div class="form-row">                    
                    <div class="form-group col-md-5">
                        <label for="nomResidenteU"><b class="text-danger mr-1">*</b>Nombre:</label>
                        <input type="text" class="form-control" name="nomResidenteU" id="nomResidenteU"
                        placeholder="Ingrese nombre completo del residente" required>
                    </div>
                    <div class="form-group col-md-5">
                        <label for="emailResidenteU"><b class="text-danger mr-1">*</b>Correo electrónico:</label>
                        <input type="email" class="form-control" name="emailResidenteU" id="emailResidenteU"
                        placeholder="Correo electrónico del residente" required>
                    </div>
                    <div class="form-group col-md-2">
                        <label for="matriculaU"><b class="text-danger mr-1">*</b>Matrícula:</label>
                        <input type="text" class="form-control" name="matriculaU" id="matriculaU"
                        placeholder="Matrícula" pattern = "[0-9]+" MaxLength = "8" MinLength = "8" required>
                    </div>                                        
                    <div class="form-group col-md-6">
                        <label for="carreraU"><b class="text-danger mr-1">*</b>Carrera:</label>
                        <select name="carreraU" id="carreraU" class="form-control">
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
                        <label for="" class="text-info" style="font-weight: bold;">
                        <b class="text-danger mr-1">*</b>Categoría disponible para guardar el proyecto:</label>                        
                        <div id="categoriasLoadU"></div>
                        <input id="nombreCategoria" class="form-control mb-1 text-center" readonly>                  
                    </div>
                    <div class="form-group col-md-2">
                        <label for="semestreU"><b class="text-danger mr-1">*</b>Semestre:</label>
                        <select name="semestreU" id="semestreU" class="form-control">                            
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                        </select>
                    </div>	
                    <div class="form-group col-md-5">
						<label for="fechaInicioU"><b class="text-danger mr-1">*</b>Fecha de inicio de la residencia:</label>
						<input type="text" class="form-control readonly" name="fechaInicioU" id="fechaInicioU" required>
					</div>					
					<div class="form-group col-md-5">
						<label for="fechaTerminoU"><b class="text-danger mr-1">*</b>Fecha de término de la residencia:</label>
						<input type="text" class="form-control readonly" name="fechaTerminoU" id="fechaTerminoU" required>
					</div>                    
				</div>
                <h5 class="text-center">Datos del proyecto</h5> 
                <div class="form-group">
					<label for="nomProyectoU"><b class="text-danger mr-1">*</b>Nombre:</label>
					<input type="text" class="form-control" name="nomProyectoU" id="nomProyectoU" 
                    placeholder="Ingrese el nombre del proyecto" required>
				</div>
				<div class="form-group">
					<label for="responsableU"><b class="text-danger mr-1">*</b>Responsable del proyecto (Asesor externo):</label>
					<input type="text" class="form-control" name="responsableU" id="responsableU"
                    placeholder="Ingrese el nombre del responsable del proyecto" required>
				</div>				
				<div class="form-group">
					<label for="caracteristicasU"><b class="text-danger mr-1">*</b>Características:</label>
					<textarea type="text" class="form-control" name="caracteristicasU" id="caracteristicasU" rows="2"
                    placeholder="Ingrese las características del proyecto" required></textarea>
				</div>
				<div class="form-group">
					<label for="objetivoU"><b class="text-danger mr-1">*</b>Objetivo:</label>
					<input type="text" class="form-control" name="objetivoU" id="objetivoU"
                    placeholder="Ingrese el objetivo del proyecto" required>
				</div>
                <div class="form-group">
					<label for="justificacionU"><b class="text-danger mr-1">*</b>Justificación:</label>
					<input type="text" class="form-control" name="justificacionU" id="justificacionU"
                    placeholder="Ingrese la justificación del proyecto" required>
				</div>
                <div class="form-group">
					<label for="descripcionU"><b class="text-danger mr-1">*</b>Descripción del proyecto:</label>
					<textarea type="text" class="form-control" name="descripcionU" id="descripcionU"
                    placeholder="Ingrese la justificación del proyecto" required></textarea>
				</div>
                <h5 class="text-center">Datos de la empresa o institución</h5>                
                <div class="form-group">
                        <label for="nomEmpresaU"><b class="text-danger mr-1">*</b>Nombre:</label>
                        <input type="text" class="form-control" name="nomEmpresaU" id="nomEmpresaU"
                        placeholder="Ingrese el nombre de la empresa o institución" required>
                </div>                                                       
                <div class="form-group">
                        <label for="direccionU"><b class="text-danger mr-1">*</b>Dirección:</label>
                        <input type="text" class="form-control" name="direccionU" id="direccionU"
                        placeholder="Ingrese la dirección de la empresa" required>
                    </div>
                <div class="form-row">
                    <div class="form-group col-md-9">
                        <label for="emailEmpresaU"><b class="text-danger mr-1">*</b>Correo:</label>
                        <input type="email" class="form-control" name="emailEmpresaU" id="emailEmpresaU"
                        placeholder="Ingrese el correo de la empresa" required>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="telefonoU"><b class="text-danger mr-1">*</b>Teléfono:</label>
                        <input type="text" class="form-control" name="telefonoU" id="telefonoU"
                        placeholder="10-14 digítos" pattern = "[0-9]+" MaxLength = "14" MinLength = "10" required>
                    </div>
                </div>
                    <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-warning" id="btnActualizarProyecto">Actualizar</button>				
                </div>                                                   		                                           
				</form>                                              
			</div>			

    </div>
  </div>
</div>



<?php
include "footer.php";
?>

<!--Dependencias de PROYECTOS, todas la funciones JS de PROYECTOS-->
<script src="../js/proyectos.js"></script>
<script type="text/javascript">

/*Funcion para agregar proyecto*/
function agregarProyecto(){
    $.ajax({        
        method:"POST",        
        data: $('#frmProyectos').serialize(),
        url: "../procesos/proyectos/guardarProyecto.php",      
        success:function(respuesta){
            console.log(respuesta);
            respuesta = respuesta.trim();

            if(respuesta == 1){
                $('#frmProyectos')[0].reset();
                $('#tablaProyectos').load("proyectos/tablaProyectos.php");
                swal("Proyecto guardado con éxito!!", "El proyecto se ha guardado satisfactoriamente", "success");            
            }else{
                swal("Error al guardar el proyecto", "Debe llenar todos los campos", "error");
            }
        }
        });
        return false;
    }

    /*Funcion para editar proyecto*/
    function actualizaProyecto(){
        $.ajax({
        method:"POST",
        data:$('#frmActualizarProyecto').serialize(),
        url:"../procesos/proyectos/actualizaProyecto.php",
        success:function(respuesta){
            respuesta = respuesta.trim();
            console.log(respuesta);
            if(respuesta == 1){                
                $('#tablaProyectos').load("proyectos/tablaProyectos.php");
                swal("Proyecto actualizado con éxito!!", "El proyecto se actualizo correctamente", "success"); 
            }else{
                swal("Error al actualizar proyecto", "Debe llenar todos los campos", "error");
            }
        }
    });
        return false;
    }

    /*Script para la carga de las tablas y el select de categorias*/
    $(document).ready(function(){              
        $('#tablaProyectos').load("proyectos/tablaProyectos.php");
        $('#categoriasLoad').load("categorias/selectCategorias.php");        
        $('#categoriasLoadU').load("categorias/selectCategoriasU.php");        
    });

    /*script para el readonly de los campos de fecha (no ingresar datos)*/
    $(".readonly").keydown(function(e){
        e.preventDefault();
    });

    /*Script para delimitar las fechas del calendario*/
    $(function(){
        var fechaA = new Date();
        var yyyy = fechaA.getFullYear()+1;

        $("#fechaInicio").datepicker({            
            changeMonth: true,
            changeYear: true,
            yearRange: '2020:' + yyyy,
            dateFormat: "dd-mm-yy"
        });

        $("#fechaInicioU").datepicker({            
            changeMonth: true,
            changeYear: true,
            yearRange: '2020:' + yyyy,
            dateFormat: "dd-mm-yy"
        });

        $("#fechaTermino").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '2020:' + yyyy,
            dateFormat: "dd-mm-yy"
        });

        $("#fechaTerminoU").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: '2020:' + yyyy,
            dateFormat: "dd-mm-yy"
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