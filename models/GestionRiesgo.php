<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "gestion_riesgo".
 *
 * @property integer $id
 * @property string $id_centro_costo
 * @property string $fecha
 * @property string $fecha_visita
 * @property string $observacion
 */
class GestionRiesgo extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'gestion_riesgo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cedula','nombre','edad','sexo','cargo','fecha_accidente','dias_incapacidad'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'cedula' => 'Cedula',
            'nombre' => 'Nombre',
            'edad' => 'Edad',
            'sexo'=>'Sexo',
            'cargo'=>'Cargo',
            'fecha_accidente'=>'Fecha Accidente',
            'dias_incapacidad'=>'Dias de incapacidad'
            
        ];
    }


    
}
