<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HelpRespuestas */

$this->title = 'Create Help Respuestas';
$this->params['breadcrumbs'][] = ['label' => 'Help Respuestas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="help-respuestas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
