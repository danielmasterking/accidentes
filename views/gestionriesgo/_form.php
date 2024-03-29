<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\SelectConsultaGestion;


date_default_timezone_set ( 'America/Bogota');
$fecha = date('Y-m-d');
$orden = 1;

?>

<div class="gestion-riesgo-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
    	<div class="col-md-4">
    		<?= $form->field($model, 'fecha')->textInput([
    			'value'=>$fecha,'readonly'=>true,
			

    		]) ?>
    	</div>

    	<div class="col-md-4">
		    <?= $form->field($model, 'nombre')->textInput([
    			
			

    		]) ?>
		</div>

		<div class="col-md-4">
			<?= $form->field($model, 'cedula')->textInput([
    			
			

    		]) ?>
		</div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<?= $form->field($model, 'edad')->textInput([
    			
			

    		]) ?>
    	</div>

    	<div class="col-md-4">
		    <?php echo $form->field($model, 'sexo')->dropDownList(
			['M' => 'Masculino', 'F' => 'Femenino']
			); ?>
		</div>

		<div class="col-md-4">
			<?= $form->field($model, 'cargo')->textInput([
    			
			

    		]) ?>
		</div>
    </div>

    <div class="row">
    	<div class="col-md-4">
    		<?= $form->field($model, 'fecha_accidente')->textInput([
    			'type'=>'date'
			

    		]) ?>
    	</div>

    	

		<div class="col-md-4">
			<?= $form->field($model, 'dias_incapacidad')->textInput([
    			
				'type'=>'number'

    		]) ?>
		</div>

        <div class="col-md-4">
            <?= $form->field($model, 'salario')->textInput([
                
                'type'=>'number'

            ]) ?>
        </div>
    </div>

    
    <?php  

    	foreach($consultas as $row_con):
    ?>

	<div class="panel panel-primary <?= $row_con->dependiente!=0 ?'depende'.$row_con->dependiente:'' ?>" style="<?= $row_con->dependiente!=0 ?'display: none;':''?>" >
  		<div class="panel-body">
		    <div class="row" >
				<div class="col-md-12">
					<p>&nbsp;</p>
						 

					<input type="hidden" name="preguntas[]" value="<?= $row_con->id ?>">

					<p>

					<strong style="font-size: 15px;"><?= $orden?> </strong>

					<b style="font-size: 15px;"><?= '. '.$row_con->descripcion?></b> 

					

					</p>
						  
				</div>

				
			</div>


			
			<br>

			<div class="row" >
				<div class="col-md-12">
					<?php if(!$row_con->habilitar_si_no): ?>
					<?php if($row_con->tipo_campo!='select'){ //echo"entra en el if";?>
					<input type="<?= $row_con->tipo_campo?>" name="observacion[]" class="form-control" id="obs<?= $orden?>">
					<?php }else{// echo"entra en el else";?>
						<select class="form-control"  name="observacion[]" id="obs<?= $orden?>">
							<option value="">Selecciona una opcion</option>
							<?php  
								$options=SelectConsultaGestion::ObtenerOptions($row_con->id);
								foreach($options as $op):
							?>
							<option value="<?= $op->valor ?>"><?= $op->valor ?></option>
						<?php endforeach; ?>
						</select>
					<?php }?>
					<?php else: ?>
						<select class="form-control" name="observacion[]"  id="obs<?= $orden?>" onchange="activar_dependientes(<?= $row_con->id?>,this);">
							<option value="">Selecciona una respuesta</option>
							<option value="S">SI</option>
							<option value="N">NO</option>
						</select>

					<?php endif; ?>
				</div>

				
			</div>
			
			
		</div>
	</div>

    <?php   
     $orden++;
     endforeach; 
    ?>



    <br>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>


    <?php ActiveForm::end(); ?>



</div>


<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog " role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ayuda_header" >Modal title</h4>
      </div>
      <div class="modal-body" id="body_ayuda">
        ...
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>



<!-- Modal Respuestas-->
<div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="ayuda_header_resp" >Modal title</h4>
      </div>
      <div class="modal-body" id="body_ayuda_resp">
        ...
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>




<script type="text/javascript">
	

	function plan_accion(orden){

		var desc=$('#resp'+orden+' option:selected').text();

		if (desc=='No cumple ' || desc=='En proceso') {
			$('#plan_accion'+orden).show('slow/400/fast', function() {
				
			});

			$('#obs'+orden).attr('required','required');
			

			$('#planes'+orden).attr('required','required');

			

		}else{
			$('#plan_accion'+orden).hide('slow/400/fast', function() {
				
			});

			 $('#obs'+orden).removeAttr('required');

			

			 $('#planes'+orden).removeAttr('required');

			
		}

	} 


	function ayuda(id,titulo){

		$("#ayuda_header").html(titulo);
		$.ajax({
            url:"<?php echo Yii::$app->request->baseUrl . '/gestionriesgo/ayuda'; ?>",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                id: id,
                
            },
            beforeSend:  function() {
                $('#body_ayuda').html('Cambiando... <i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>');
            },
            success: function(data){
                //alert(data.respuesta);
                if (data.respuesta==null) {
                	$("#body_ayuda").html("<h3>No tiene ayuda asignada</h3>");	
                }else{
                	$("#body_ayuda").html(data.respuesta);
                }
            }
        });

	}

	function ayuda_resp(id,titulo){

		$("#ayuda_header_resp").html(titulo);
		$.ajax({
            url:"<?php echo Yii::$app->request->baseUrl . '/gestionriesgo/ayuda_resp'; ?>",
            type:'POST',
            dataType:"json",
            cache:false,
            data: {
                id: id,
                
            },
            beforeSend:  function() {
                $('#body_ayuda_resp').html('Cambiando... <i class="fa fa-spinner fa-spin fa-1x fa-fw"></i>');
            },
            success: function(data){
                	//console.log(data);
                	var resp1=data.respuesta1==null?'Sin texto asignado':data.respuesta1;
                	var resp2=data.respuesta2==null?'Sin texto asignado':data.respuesta2;
                	var resp3=data.respuesta3==null?'Sin texto asignado':data.respuesta3;

                	$("#body_ayuda_resp").html(
                		//'<div class="col-md-12">'+
                		'<table class="table table-striped table-bordered">'+
                		'<thead>'+
                		'<tr>'+
                		'<th>Cumple</th>'+
                		'<th>No Cumple</th>'+
                		'<th>En Proceso</th>'+
                		'</tr>'+
                		'</thead>'+
                		'<tbody>'+
                		'<tr>'+
                		'<td>'+resp1+'</td>'+
                		'<td>'+resp2+'</td>'+
                		'<td>'+resp3+'</td>'+
                		'</tr>'+
                		'</tbody>'+
                		'</table>'
                		//+'</div>'
                		

                	);
                
            }
        });

	}

</script>