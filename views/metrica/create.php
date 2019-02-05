<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Distrito */

$this->title = 'Crear Indicador';
?>
<?= $this->render('_tabs',['metrica' => $metrica]) ?>
    <h1 style="text-align: center;"><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'indicadores' => $indicadores,
		'periodicidades' => $periodicidades,
    ]) ?>