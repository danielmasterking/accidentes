<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Distrito */

$this->title = 'Formulario de visita mensual';
?>
 <?= $this->render('_tabs',['mensual' => $mensual]) ?>

<?php if(isset($done) && $done === '200'):?>
   
   <p style="text-align: center;" class="alert alert-success">Visita mensual actualizada de forma satisfactoria.</p>
   
<?php endif;?>

   <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
                'model' => $model,
				'dependencias' => $dependencias,
				'marcasUsuario' => $marcasUsuario,
				'distritosUsuario' => $distritosUsuario,
				'zonasUsuario' => $zonasUsuario,
    ]) ?>