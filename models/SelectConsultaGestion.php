<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "select_consulta_gestion".
 *
 * @property integer $id
 * @property string $valor
 * @property integer $id_consulta
 */
class SelectConsultaGestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'select_consulta_gestion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['valor', 'id_consulta'], 'required'],
            [['id', 'id_consulta'], 'integer'],
            [['valor'], 'string', 'max' => 200],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'valor' => 'Valor',
            'id_consulta' => 'Id Consulta',
        ];
    }

    public static function ObtenerOptions($id){
        $query=SelectConsultaGestion::find()->where('id_consulta='.$id)->all();

        return $query;
    }
}
