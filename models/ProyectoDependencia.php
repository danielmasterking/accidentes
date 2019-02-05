<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyecto_dependencia".
 *
 * @property integer $id
 * @property string $codigo_dependencia
 * @property string $fecha_creacion
 * @property integer $fecha_apertura
 * @property string $usuario
 */
class ProyectoDependencia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyecto_dependencia';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['codigo_dependencia', 'fecha_creacion', 'fecha_apertura', 'usuario'], 'required'],
            [['fecha_creacion'], 'safe'],
            [['fecha_apertura'], 'integer'],
            [['codigo_dependencia', 'usuario'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'codigo_dependencia' => 'Codigo Dependencia',
            'fecha_creacion' => 'Fecha Creacion',
            'fecha_apertura' => 'Fecha Apertura',
            'usuario' => 'Usuario',
        ];
    }
}
