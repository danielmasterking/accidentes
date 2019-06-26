<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GestionRiesgo */

$this->title = 'Accidentado-'.$model->nombre.'-'.$model->fecha_accidente;

?>
<div class="gestion-riesgo-view">

    <h1 class="text-center"><?= Html::encode($this->title) ?></h1>

    <div class="table-responsive">
    <table class="table table-striped" border="1">
      <tr>
        <th>Nombre:</th>
        <td><?= $model->nombre?></td>

        <th>Edad:</th>
        <td><?= $model->edad?></td>

        
      </tr>

      <tr>
        <th>Sexo:</th>
        <td><?= $model->sexo?></td>

        <th>Cargo:</th>
        <td><?= $model->cargo?></td>
      </tr>

      <tr>
        <th>Fecha accidente:</th>
        <td><?= $model->fecha_accidente?></td>

        <th>Dias de incapacidad:</th>
        <td><?= $model->dias_incapacidad?></td>
      </tr>

      <tr>
        <th>Usuario Crea:</th>
        <td ><?= $model->usuario?></td>

        <th>Salario:</th>
        <td ><?='$ '.number_format($model->salario, 0, '.', '.').' COP'?></td>
      </tr>
     
        
    </table>
    </div>

    <h1 class="text-center">Detalle</h1>
    <div class="table-responsive">
    <table class="table table-striped " border="1">
        <thead>
            <tr>
                <th></th>
                <th>Temas</th>
                
                <th>Respuestas</th>
                
            </tr>
        </thead>
        <tbody>
            <?php 
            $orden=1;
            $horas_perdidas_trabajador=0;
            $pararon_proceso_personas=null;
            $salario_personas_parararon=0;
            $horas_personas_pararon=0;
            $paro_proceso_persona=null;
            $tiempo_invertido_accidente=0;
            $sumatoria_salario_equipo=0;
            foreach($consulta as $row){
                $horas_perdidas_trabajador=$row->id_consulta==14?(int)$row->observaciones:$horas_perdidas_trabajador;
                $pararon_proceso_personas=$row->id_consulta==36?$row->observaciones:$pararon_proceso_personas;
                $salario_personas_parararon=$row->id_consulta==38?$row->observaciones:$salario_personas_parararon;
                $horas_personas_pararon=$row->id_consulta==39?$row->observaciones:$horas_personas_pararon;
                $paro_proceso_persona=$row->id_consulta==41?$row->observaciones:$paro_proceso_persona;
                $tiempo_invertido_accidente=$row->id_consulta==44?$row->observaciones:$tiempo_invertido_accidente;
                $sumatoria_salario_equipo=$row->id_consulta==45?$row->observaciones:$sumatoria_salario_equipo;
                $se_contrato_remplazo=$row->id_consulta==46?$row->observaciones:$se_contrato_remplazo;
            ?>

            <tr>
                <td><b><?= $orden?>.</b></td>
                <td><?= $row->consulta->descripcion?></td>
                
                <td><?= $row->observaciones?></td>
                


            </tr>
            <?php 
                $orden++;
                }
            ?>
        </tbody>
    </table>
    </div>

    <h1 class="text-center">Consolidado</h1>

    <table class="table table-striped" border="1">
        <tr>
            <th>
                Costo de tiempo perdido trabajador accidentado
            </th>
            <td>
                <?php  
                    $costo_tiempo_perdido_accidentado=((($model->salario/30)/8)*$horas_perdidas_trabajador);
                    echo '$ '.number_format($costo_tiempo_perdido_accidentado, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>
        <tr>
            <th>
                Costo de tiempo perdido de trabajadores que pararon sus procesos
            </th>
            <td>
                <?php 

                    if($pararon_proceso_personas=='S'){
                        $costo_tiempo_perdido_personas_pararon=((($salario_personas_parararon/30)/8)*$horas_personas_pararon);

                        echo '$ '.number_format($costo_tiempo_perdido_personas_pararon, 0, '.', '.').' COP';
                    }else{

                        echo '$ 0 COP';
                    }

                ?>
            </td>
        </tr>
        <tr>
            <th>
                Costo de tiempo de paro del proceso
            </th>
            <td>
                <?php 
                    if ($paro_proceso_persona=='S') {
                       $costo_tiempo_paro_proceso=((($model->salario/30)/8)*$horas_perdidas_trabajador);
                       echo '$ '.number_format($costo_tiempo_paro_proceso, 0, '.', '.').' COP';
                    }else{

                        echo '$ 0 COP';
                    }


                ?>
            </td>
        </tr>
        <tr>
            <th>
                Costo de tiempo invertido para la investigación del accidente
            </th>
            <td>
                <?php 
                  if ($tiempo_invertido_accidente!=0 && $sumatoria_salario_equipo) {
                     
                    $costos_invertido_investigacion=(($sumatoria_salario_equipo/30)/8)*$tiempo_invertido_accidente;

                    echo '$ '.number_format($costos_invertido_investigacion, 0, '.', '.').' COP';
                  }else{
                    echo '$ 0 COP';
                  }
                ?>
            </td>
        </tr>

        <tr>
            <th>
               Costo de remplazo del trabajador accidentado
            </th>
            <td>
                <?php 
                  if($se_contrato_remplazo=="S"){
                    $costos_remplazo=($model->dias_incapacidad-1)*($model->salario/30);

                    echo '$ '.number_format($costos_remplazo, 0, '.', '.').' COP';
                  }else{
                    echo '$ 0 COP';
                  }
                ?>
            </td>
        </tr>

        <tr>
            <th>
               Costo de tiempo empleado en formar el nuevo trabajador
            </th>
            <td>
                <?php 
                  $costo_tiempo_formacion=($model->salario/30)+50000;
                  echo '$ '.number_format($costo_tiempo_formacion, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>
        <tr>
            <th>
               Costo de tiempo perdido
            </th>
            <td>
                <?php 
                  $costo_tiempo_perdido=($costo_tiempo_perdido_accidentado+$costo_tiempo_perdido_personas_pararon+$costo_tiempo_paro_proceso+$costos_invertido_investigacion+$costos_remplazo+$costo_tiempo_formacion);
                  echo '$ '.number_format($costo_tiempo_perdido, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>
        <tr>
            <th>
               Costo por daños materiales de materia prima
            </th>
            <td>
                <?php 
                 $costos_materia_prima=$row->id_consulta==48?$row->observaciones:0;

                 echo '$ '.number_format($costos_materia_prima, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>

        <tr>
            <th>
               Costo por daños materiales de maquinaria
            </th>
            <td>
                <?php 
                 $costos_maquinaria=$row->id_consulta==49?$row->observaciones:0;

                 echo '$ '.number_format($costos_maquinaria, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>

        <tr>
            <th>
               Costo por daños materiales de bienes
            </th>
            <td>
                <?php 
                 $costos_bienes=$row->id_consulta==50?$row->observaciones:0;

                 echo '$ '.number_format($costos_bienes, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>

        <tr>
            <th>
               Costo por daños materiales de propiedad de terceros
            </th>
            <td>
                <?php 
                 $costos_propiedad_terceros=$row->id_consulta==51?$row->observaciones:0;

                 echo '$ '.number_format($costos_propiedad_terceros, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>

        <tr>
            <th>
               Costo por daños materiales
            </th>
            <td>
                <?php 
                 $costos_materiales=($costos_materia_prima+$costos_maquinaria+$costos_bienes+$costos_propiedad_terceros);

                 echo '$ '.number_format($costos_materiales, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>
        <tr>
            <th>
               Costo por sanciones y/o penalizaciones
            </th>
            <td>
                <?php 
                    $costos_sanciones_ambientales=$row->id_consulta==53?$row->observaciones:0;
                    $costos_sanciones_sst=$row->id_consulta==54?$row->observaciones:0;
                    $costos_sanciones_laborales=$row->id_consulta==55?$row->observaciones:0;

                    $costos_sanciones_total=($costos_sanciones_ambientales+$costos_sanciones_sst+$costos_sanciones_laborales);
                    echo '$ '.number_format($costos_sanciones_total, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>

        <tr>
            <th>
               Costos de los materiales usados en la atención de la emergencia
            </th>
            <td>
                <?php 
                    $costos_materiales_atencion=$row->id_consulta==58?$row->observaciones:0;
                    echo '$ '.number_format($costos_materiales_atencion, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>

        <tr>
            <th>
               Costo de transporte al centro de atención más cercano
            </th>
            <td>
                <?php 
                    $fue_trasladado=$row->id_consulta==59?$row->observaciones:'N';
                    if($fue_trasladado=='S'){
                        $costo_trasporte=$row->id_consulta==60?$row->observaciones:0;
                        echo '$ '.number_format($costo_trasporte, 0, '.', '.').' COP';
                    }else{
                        echo '$ 0 COP';
                    }
                    
                ?>
            </td>
        </tr>
        <tr>
            <th>
               Gastos generales
            </th>
            <td>
                <?php 
                   $gastos_generales=($costos_sanciones_total+$costos_materiales_atencion+$costo_trasporte);
                   echo '$ '.number_format($gastos_generales, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>
        <tr class="info">
            <th>
               COSTO TOTAL
            </th>
            <td>
                <?php 
                   $costo_total=($costo_tiempo_perdido+$costos_materiales+$gastos_generales);
                   echo '$ '.number_format($costo_total, 0, '.', '.').' COP';
                ?>
            </td>
        </tr>
    </table>

</div>
