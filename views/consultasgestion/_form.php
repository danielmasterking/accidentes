<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\ConsultasGestion;
use app\models\SelectConsultaGestion;

/* @var $this yii\web\View */
/* @var $model app\models\ConsultasGestion */
/* @var $form yii\widgets\ActiveForm */


if( isset(Yii::$app->session['permisos-exito']) ){

  $permisos = Yii::$app->session['permisos-exito'];

}


?>

<div class="consultas-gestion-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-4">
             <?= $form->field($model, 'descripcion')->textInput([]) ?>

        </div>

        <div class="col-md-4">
            <?= $form->field($model, 'orden')->textInput() ?>
        </div>

        <div class="col-md-4">
            <?php echo $form->field($model, 'tipo_campo')->dropDownList(
            ['text' => 'texto', 'number' => 'numero', 'date' => 'Fecha','select'=>'Lista desplegable'],
            ['onchange'=>'agregar_select(this)']
            ); ?>
        </div>
    </div>

    <div class="row" id="contenedor-select" style="<?= !$model->isNewRecord && $model->tipo_campo=='select'?'':'display: none;'; ?>">
       
        <div class="col-md-4">
            <div class="contacts">
                <label>Valores lista desplegable:</label>
                    <?php if($model->isNewRecord): ?>
                    <div class="form-group multiple-form-group input-group">
                       
                        <input type="text" name="options[]" class="form-control">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-add">+</button>
                        </span>
                    </div>
                    <?php else: $options=SelectConsultaGestion::ObtenerOptions($model->id);?>
                    <?php foreach($options as $op): ?>
                        <div class="form-group multiple-form-group input-group">
                       
                        <input type="text" name="options[]" class="form-control" value="<?= $op->valor?>">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-danger btn-remove">-</button>
                        </span>
                    </div>
                    <?php endforeach; ?>
                    <div class="form-group multiple-form-group input-group">
                       
                        <input type="text" name="options[]" class="form-control">
                        <span class="input-group-btn">
                            <button type="button" class="btn btn-success btn-add">+</button>
                        </span>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    

    <div class="row">
        
        <div class="col-md-6">
             <?php echo $form->field($model, 'dependiente')->dropDownList(
            ConsultasGestion::List_consulta_gestion()
            ); ?>

        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'habilitar_si_no')->radioList(array(1=>'si',0=>'No')); ?>
        </div>
    </div>

   
  

  
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <?php if( !isset($actualizar) ):?>
    <div class="col-md-12">
    	<table class="table table striped">
    		<thead>
    			<tr>
    				<th></th>
                    <th>Orden</th>
    				<th>Descripcion</th>
    			</tr>
    		</thead>
    		<tbody>
    			<?php 

    			foreach($consulta as $row):
    			?>
    			<tr>	
    				<td>
					
					<?php
					
					if($permisos != null){
										
						if(in_array("administrador", $permisos) ){
						   
						  echo Html::a('<i class="fa fa-edit"></i>',Yii::$app->request->baseUrl.'/consultasgestion/update?id='.$row->id,['class'=>'btn btn-primary btn-xs']);
						  echo Html::a('<i class="fa fa-trash"></i>',Yii::$app->request->baseUrl.'/consultasgestion/delete?id='.$row->id,['data-method'=>'post','data-confirm' => 'Está seguro de eliminar elemento','class'=>'btn btn-danger btn-xs']);

                          if($row->estado=="A"){
                            echo Html::a('<i class="fa fa-hand-point-down"></i> Desactivar',Yii::$app->request->baseUrl.'/consultasgestion/cambiar-estado?id='.$row->id.'&estado=I',['data-method'=>'post','data-confirm' => 'Está seguro de desactivar este tema','class'=>'btn btn-warning btn-xs']);
                          }else{
                            echo Html::a('<i class="fa fa-hand-point-up"></i> Activar',Yii::$app->request->baseUrl.'/consultasgestion/cambiar-estado?id='.$row->id.'&estado=A',['data-method'=>'post','data-confirm' => 'Está seguro de activar este tema','class'=>'btn btn-success btn-xs']);
                          }
		  
						}
						 
					}
					?>
					</td>

    				<!-- <td><?php //echo $row->id ?></td> -->
                    <td><?= $row->orden ?></td>
    				<td><?= $row->descripcion ?></td>
    				
    			</tr>
    		<?php endforeach;?>
    		</tbody>
    	</table>
    </div>
    <?php endif;?>

</div>
