<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Usuario */
/* @var $form yii\widgets\ActiveForm */

$ids_roles = array();

if(isset($roles_actuales)){

    foreach ($roles_actuales as $key => $value) {
        
		$ids_roles [] = $value['rol_id'];
    }

}

$ids_zonas = array();

if(isset($zonas_actuales)){

    foreach ($zonas_actuales as $key => $value) {
        
		$ids_zonas [] = $value['zona_id'];
    }

}

$ids_distritos = array();

if(isset($distritos_actuales)){

    foreach ($distritos_actuales as $key => $value) {
        
		$ids_distritos [] = $value['distrito_id'];
    }

}

$ids_marcas = array();

if(isset($marcas_actuales)){

    foreach ($marcas_actuales as $key => $value) {
        
		$ids_marcas [] = $value['marca_id'];
    }

}

$ids_empresas = array();

if(isset($empresas_actuales)){

    foreach ($empresas_actuales as $key => $value) {
        
		$ids_empresas [] = $value['nit'];
    }

}


$areas = $model->area;
$areas_array = explode('-',$areas);

//0 --> Seguridad
//1 --> Riesgos
//2 --> Administracion
//3 --> Estructural
//4 --> Salud

$checked_seguridad = '';
$checked_riesgos = '';
$checked_administracion = '';
$checked_estructural = '';
$checked_salud = '';

if( array_key_exists(0,$areas_array) ){
	
	if($areas_array[0] != 'X'){
		
		$checked_seguridad = 'checked';
		
	}
	
}

if( array_key_exists(1,$areas_array) ){
	
	if($areas_array[1] != 'X'){
		
		$checked_riesgos = 'checked';
		
	}
	
}

if( array_key_exists(2,$areas_array) ){
	
	if($areas_array[2] != 'X'){
		
		$checked_administracion = 'checked';
		
	}
	
}

if( array_key_exists(3,$areas_array) ){
	
	if($areas_array[3] != 'X'){
		
		$checked_estructural = 'checked';
		
	}
	
}

if( array_key_exists(4,$areas_array) ){
	
	if($areas_array[4] != 'X'){
		
		$checked_salud = 'checked';
		
	}
	
}



?>

<div class="usuario-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar', ['class' => 'btn btn-primary btn-lg']) ?>
    </div>

    <?= $form->field($model, 'usuario')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nombres')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'apellidos')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
	
	<?= $form->field($model, 'cargo')->textInput(['maxlength' => true]) ?>
	
	<div class="col-md-12">
  
     <div class="col-md-6">
     
      <?= $form->field($model, 'area')->dropDownList(['Seguridad' => 'Seguridad', 
                                                     'Riesgos' => 'Riesgos',
                             'Administracion' => 'Administracion']) ?>     
     
     </div>
     <?php  if($model->ambas_areas == 'N'):?>
     
     <div class="col-md-6">
     
          <input type="checkbox" name="tipo-area" /> Seguridad y Riegos

     </div>
     
     <?php  else:?>

     <div class="col-md-6">
     
        <input type="checkbox" name="tipo-area" checked="checked"/> Seguridad y Riegos
     
     </div>
     
     <?php  endif;?>
  </div>
    <?= $form->field($model, 'estado')->dropDownList(['A' => 'Activo', 'I' => 'Inactivo']) ?>
	
	    <div class="roles">

          <table class="table">

              <thead>

                   <th></th>
                   <th>Roles</th> 
                  
              </thead>

              <tbody>

                 <?php foreach($roles as $value):?>

                      <?php if(isset($roles_actuales) && count($roles_actuales) > 0 
                               && in_array($value->id, $ids_roles)):?>


                            <tr>

                                <td><?= Html::checkBox('roles_array[]',true, ['value' => $value->id ])?></td>
                                <td><?=$value->nombre ?></td>
                             </tr>

                      <?php else:?>


                            <tr>

                                <td><?= Html::checkBox('roles_array[]',false, ['value' => $value->id])?></td>
                                <td><?=$value->nombre ?></td>
                             </tr>




                       <?php endif;?>        
                   


                 <?php endforeach; ?>   

                  

              </tbody>
              

          </table>

    </div>
	
	 
	
	
	 <div class="Empresas">

          <table class="table">

              <thead>

                   <th></th>
                   <th>Empresas</th> 
                  
              </thead>

              <tbody>

                 <?php foreach($empresas as $value):?>

                      <?php if(isset($empresas_actuales) && count($empresas_actuales) > 0 
                               && in_array($value->nit, $ids_empresas)):?>


                            <tr>

                                <td><?= Html::checkBox('empresas_array[]',true, ['value' => $value->nit ])?></td>
                                <td><?=$value->nombre ?></td>
                             </tr>

                      <?php else:?>


                            <tr>

                                <td><?= Html::checkBox('empresas_array[]',false, ['value' => $value->nit ])?></td>
                                <td><?=$value->nombre ?></td>
                             </tr>




                       <?php endif;?>        
                   


                 <?php endforeach; ?>   

                  

              </tbody>
              

          </table>

    </div>		



    <?php ActiveForm::end(); ?>

</div>
