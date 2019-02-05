<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyecto_usuarios".
 *
 * @property integer $id
 * @property integer $id_proyecto
 * @property string $usuario
 */
class ProyectoUsuarios extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'proyecto_usuarios';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_proyecto', 'usuario'], 'required'],
            [['id', 'id_proyecto'], 'integer'],
            [['usuario'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_proyecto' => 'Id Proyecto',
            'usuario' => 'Usuario',
        ];
    }
}
