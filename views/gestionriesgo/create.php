<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\GestionRiesgo */

$this->title = 'Crear Nuevo';
$this->params['breadcrumbs'][] = ['label' => 'Gestion Riesgos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<link rel="stylesheet" type="text/css" href="<?php echo $this->theme->baseUrl; ?>/assets/css/bootstrap-datetimepicker.min.css">
<div class="gestion-riesgo-create">

    <div class="page-header">
      <h1><?= Html::encode($this->title) ?></h1>
    </div>

    <?php 

        $flashMessages = Yii::$app->session->getAllFlashes();
        if ($flashMessages) {
            foreach($flashMessages as $key => $message) {
                echo "<div class='alert alert-" . $key . " alert-dismissible' role='alert'>
                        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>
                        $message
                    </div>";   
            }
        }
    ?>

    <?= $this->render('_form', [
        'model' => $model,
        'consultas'=>$consultas,
        //'list_respuestas'=>$list_respuestas
        'respuestas'=>$respuestas
    ]) ?>

</div>
<script type="text/javascript">
    function activar_dependientes(id,objeto){

        if($(objeto).val()=='S'){
            $('.depende'+id).show('slow/400/fast', function() {
                
            });
        }else{

            $('.depende'+id).hide('slow/400/fast', function() {
                
            });
        }
    }
</script>



