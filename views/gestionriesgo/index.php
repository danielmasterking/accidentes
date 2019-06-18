<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\GestionRiesgoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Gestion de Accidentes';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="https://code.highcharts.com/highcharts.src.js"></script>
<div class="gestion-riesgo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('<i class="fa fa-plus"></i> Nuevo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <div class="row">
        <div class="col-md-4">
            <div id="container" ></div>
        </div>
        <div class="col-md-4">
            <div id="container2" ></div>
        </div>
    </div>
    
    <table class="table table-striped my-data" >
        <thead>
            <tr>
                <th></th>
                <th>Id</th>
                <th>Nombre</th>
                <th>Cedula</th>
                <th>Edad</th>
                <th>Sexo</th>
                <th>Cargo</th>
                <th>Fecha Accidente</th>
                <th>Dias incapacidad</th>
                <th>Usuario crea</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($model as $row): ?>
                <tr>
                    <td>
                        <a href="" class="btn btn-info btn-xs"><i class="fa fa-eye"></i></a>
                    </td>
                    <td><?= $row->id?></td>
                    <td><?= $row->nombre?></td>
                    <td><?= $row->cedula?></td>
                    <td><?= $row->edad?></td>
                    <td><?= $row->sexo?></td>
                    <td><?= $row->cargo?></td>
                    <td><?= $row->fecha_accidente?></td>
                    <td><?= $row->dias_incapacidad?></td>
                    <td><?= $row->usuario?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    
</div>
<script type="text/javascript">
   Highcharts.chart('container', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Numero de accidentes por mes'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad por mes'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '<b>Total:{point.y:.1f}</b>'
    },
    series: [{
        name: 'Population',
        data: <?= $json_mes?>,
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});

   ////////////////////////////////////////////////////////////////////////////////////////////////////
    Highcharts.chart('container2', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Numero de dias perdidos por accidentes de trabajo'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        type: 'category',
        labels: {
            rotation: -45,
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad por mes'
        }
    },
    legend: {
        enabled: false
    },
    tooltip: {
        pointFormat: '<b>Total:{point.y:.1f}</b>'
    },
    series: [{
        name: 'Population',
        data: <?= $json_dias?>,
        dataLabels: {
            enabled: true,
            rotation: -90,
            color: '#FFFFFF',
            align: 'right',
            format: '{point.y:.1f}', // one decimal
            y: 10, // 10 pixels down from the top
            style: {
                fontSize: '13px',
                fontFamily: 'Verdana, sans-serif'
            }
        }
    }]
});
</script>