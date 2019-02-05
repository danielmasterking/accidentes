<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyecto_seguimiento".
 *
 * @property integer $id
 * @property integer $id_sistema
 * @property string $fecha
 * @property string $reporte
 * @property string $avance
 * @property string $usuario
 */
class ProyectoSeguimiento extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyecto_seguimiento';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sistema', 'fecha', 'reporte', 'avance', 'usuario'], 'required'],
            [['id_sistema'], 'integer'],
            [['fecha'], 'safe'],
            [['reporte'], 'string'],
            [['avance', 'usuario'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_sistema' => 'Id Sistema',
            'fecha' => 'Fecha',
            'reporte' => 'Reporte',
            'avance' => 'Avance',
            'usuario' => 'Usuario',
        ];
    }
}
