<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProyectoSeguimiento */
/* @var $form ActiveForm */
?>
<div class="site-proyecto_seguimiento">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'id_sistema') ?>
        <?= $form->field($model, 'fecha') ?>
        <?= $form->field($model, 'reporte') ?>
        <?= $form->field($model, 'avance') ?>
        <?= $form->field($model, 'usuario') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- site-proyecto_seguimiento -->
