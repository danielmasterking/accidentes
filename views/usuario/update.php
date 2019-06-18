<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Distrito */

$this->title = 'Actualizar Usuario: '.$model->usuario;
?>
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
                'model' => $model,
				'roles' => $roles,
				'roles_actuales' => $roles_actuales,
				'empresas_actuales' => $empresas_actuales,
				'empresas' => $empresas,
    ]) ?>