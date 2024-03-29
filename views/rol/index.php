<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $searchModel app\models\RolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Roles';

?>
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>
	
	<div class="form-group">

	<?= Html::a('<i class="fa fa-plus"></i>',Yii::$app->request->baseUrl.'/rol/create',['class'=>'btn btn-primary']) ?>
		
	</div>	
    
	 <table  class="display my-data" data-page-length='20' cellspacing="0" width="100%">
	 
       <thead>

       <tr>
           
           <th></th>
           <th>Nombre</th>
           
       </tr>
           

       </thead>	 
	   
	   <tbody>
	   
             <?php foreach($roles as $rol):?>	  
			   
              <tr>			   
			   <td><?php
                echo Html::a('<i class="fa fa-pencil fa-fw"></i>',Yii::$app->request->baseUrl.'/rol/update?id='.$rol->id);
                echo Html::a('<i class="fa fa-plus fa-fw"></i>',Yii::$app->request->baseUrl.'/rol/permisos?id='.$rol->id,['title' => 'Agregar Permisos']);
				echo Html::a('<i class="fa fa-remove"></i>',Yii::$app->request->baseUrl.'/rol/delete?id='.$rol->id,['data-method'=>'post']);

                    ?>
				</td>
                
     			<td><?= $rol->nombre?></td>
              </tr>
        	 <?php endforeach; ?>			 
	   
	   </tbody>
	 
	 </table>