<?php ob_start();

require_once "../../clases/Conexion.php";

$idProyecto = $_GET['id'];
    $c = new Conectar();
    $conexion = $c->conexion();    
    $sql = "SELECT * FROM t_proyectos WHERE id_proyecto = '$idProyecto'";
	$result = mysqli_query($conexion, $sql);
	
	while($mostrar = mysqli_fetch_array($result)){
		$idProyecto = $mostrar['id_proyecto'];
        $nomResidente = $mostrar['nomResidente'];
        $fechaInicio = $mostrar['fechaInicio'];
        $fechaTermino = $mostrar['fechaTermino'];

?>

<html>
<link rel="stylesheet" href="http://localhost/SistemaGestor/librerias/bootstrap4/bootstrap.min.css">

<body>
    <table class="table">
        <thead>
            <tr>
                <th width="30%" class="text-center" style="border: solid 4px green;">
                    <img src="estadoMex.png" width="200px">
                </th>
                <th width="40%" class="text-center" style="font-size: 14px; border: solid 4px green; margin">
                    <p>INFORMACIÓN DEL PROYECTO DE RESIDENCIAS PROFESIONALES</p>
                </th>
                <th width="30%" class="text-center" style="border: solid 4px green;">
                    <img src="tesh.png" width="180px" style="margin-bottom: 6px;">
                </th>
            </tr>
        </thead>
    </table>    
    <table class="table table-sm" style="border-collapse: collapse;">
        <tbody style="padding: 5px;">
            <tr>
                <td colspan="4">
                    <p style="text-align: center; font-size: 16px; font-weight: bold;">Datos del Residente</p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="font-size: 13px; text-align: justify;"><b>Nombre del
                            residente:</b>&nbsp;
                        <u> <?php echo $mostrar['nomResidente'] ?> </u>
                    </p>
                </td>
                <td>
                    <p style="font-size: 13px; text-align: right;"><b>Matrícula:</b>&nbsp;
                        <u> <?php echo $mostrar['matricula'] ?> </u>
                    </p>
                </td>
                <td>
                    <p style="font-size: 13px; text-align: right;"><b>Semestre:</b>&nbsp;
                        <u> <?php echo $mostrar['semestre'] ?> </u>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="font-size: 13px; text-align: left;"><b>Carrera:</b>&nbsp;
                        <u> <?php echo $mostrar['carrera'] ?> </u>
                    </p>
                </td>
                <td colspan="2">
                    <p style="font-size: 13px; text-align: right;"><b>Email:</b>&nbsp;
                        <u> <?php echo $mostrar['emailResidente'] ?> </u>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="2">
                    <p style="font-size: 13px; text-align: left;"><b>Fecha de inicio de residencia:</b>&nbsp;
                        <u>
                            <?php 
                                $fIni = explode("-", $fechaInicio);
                                $fIni = $fIni[2] . "-" . $fIni[1] . "-" . $fIni[0];
                                echo $fIni
                            ?>
                        </u>
                    </p>
                </td>
                <td colspan="2">
                    <p style="font-size: 13px; text-align: right;"><b>Fecha de término de residencia:</b>&nbsp;
                        <u>
                            <?php 
                                $fTer = explode("-", $fechaTermino);
                                $fTer = $fTer[2] . "-" . $fTer[1] . "-" . $fTer[0];
                                echo $fTer
                            ?>
                        </u>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="text-align: center; font-size: 16px; font-weight: bold;">Datos del Proyecto</p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="font-size: 13px; text-align: justify;">
                        <b>Nombre del proyecto:</b>&nbsp;
                        <u> <?php echo $mostrar['nomProyecto'] ?> </u>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="font-size: 13px; text-align: justify;">
                        <b>Nombre del asesor externo:</b>&nbsp;
                        <u> <?php echo $mostrar['responsable'] ?> </u>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="font-size: 13px; text-align: justify;">
                        <b>Características:</b>&nbsp;
                        <u> <?php echo $mostrar['caracteristicas'] ?> </u>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="font-size: 13px; text-align: justify;">
                        <b>Objetivo:</b>&nbsp;
                        <u> <?php echo $mostrar['objetivo'] ?> </u>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="font-size: 13px; text-align: justify;">
                        <b>Justificación:</b>&nbsp;
                        <u> <?php echo $mostrar['justificacion'] ?> </u>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="font-size: 13px; text-align: justify;">
                        <b>Descripción:</b>&nbsp;
                        <u> <?php echo $mostrar['descripcion'] ?> </u>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="text-align: center; font-size: 16px; font-weight: bold;">
                        Datos de la Empresa o Institución
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="font-size: 13px; text-align: justify;">
                        <b>Nombre:</b>&nbsp;
                        <u> <?php echo $mostrar['nomEmpresa'] ?> </u>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <p style="font-size: 13px; text-align: justify;">
                        <b>Dirección:</b>&nbsp;
                        <u> <?php echo $mostrar['direccion'] ?> </u>
                    </p>
                </td>
            </tr>
            <tr>
                <td colspan="3">
                    <p style="font-size: 13px; text-align: justify;">
                        <b>Email:</b>&nbsp;
                        <u> <?php echo $mostrar['emailEmpresa'] ?> </u>
                    </p>
                </td>
                <td>
                    <p style="font-size: 13px; text-align: justify;">
                        <b>Teléfono:</b>&nbsp;
                        <u> <?php echo $mostrar['telefono'] ?> </u>
                    </p>
                </td>
            </tr>
        </tbody>
    </table>
    <script src="http://localhost/SistemaGestor/librerias/jquery-3.5.1.min.js"></script>
    <script src="http://localhost/SistemaGestor/librerias/bootstrap4/popper.min.js"></script>
    <script src="http://localhost/SistemaGestor/librerias/bootstrap4/bootstrap.min.js"></script>
</body>

</html>

<?php
    }
?>


<?php
require_once 'autoload.inc.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$options = new Options();
$options->set('isRemoteEnabled',TRUE);
$pdf = new DOMPDF($options);
$pdf->set_paper("letter", "portrait");
$pdf->load_html(ob_get_clean());
$pdf->render();
$pdf->stream('Reporte - ' . $nomResidente . '.pdf');
?>