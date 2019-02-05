<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyecto_finalizar".
 *
 * @property integer $id
 * @property integer $id_sistema
 * @property integer $id_proyecto
 * @property integer $sala_control
 * @property string $fecha_sala_control
 * @property string $email_sala_control
 * @property integer $ordenes_compra
 * @property string $fecha_ajuste_final
 * @property integer $facturacion
 * @property string $fecha_entrega
 */
class ProyectoFinalizar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyecto_finalizar';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_sistema', 'id_proyecto', 'sala_control', 'fecha_sala_control', 'email_sala_control', 'ordenes_compra', 'fecha_ajuste_final', 'facturacion', 'fecha_entrega'], 'required'],
            [['id_sistema', 'id_proyecto', 'sala_control', 'ordenes_compra', 'facturacion'], 'integer'],
            [['fecha_sala_control', 'fecha_ajuste_final', 'fecha_entrega'], 'safe'],
            [['email_sala_control'], 'string', 'max' => 50],
            [['id_sistema'], 'unique'],
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
            'id_proyecto' => 'Id Proyecto',
            'sala_control' => 'Sala Control',
            'fecha_sala_control' => 'Fecha Sala Control',
            'email_sala_control' => 'Email Sala Control',
            'ordenes_compra' => 'Ordenes Compra',
            'fecha_ajuste_final' => 'Fecha Ajuste Final',
            'facturacion' => 'Facturacion',
            'fecha_entrega' => 'Fecha Entrega',
        ];
    }
}
