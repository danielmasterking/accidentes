<?php

namespace app\models;

use Yii;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "consultas_gestion".
 *
 * @property integer $id
 * @property string $descripcion
 * @property string $estado
 */
class ConsultasGestion extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'consultas_gestion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['descripcion','dependiente','habilitar_si_no','tipo_campo'], 'required'],
            [['id'], 'integer'],
            [['descripcion'], 'string'],
            [['estado'], 'string', 'max' => 1],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'descripcion' => 'Descripcion',
            'estado' => 'Estado',
            'dependiente' => 'Pregunta dependiente',
            'habilitar_si_no' => 'Habilitar respuesta SI y NO',
            'tipo_campo' => 'Tipo de campo',
        ];
    }

    public static function List_consulta_gestion(){
        $preguntas=ConsultasGestion::find()->where('estado="A"')->orderBy(['id' => SORT_ASC])->all();
        //$list=ArrayHelper::map($preguntas,'id','descripcion');
        $list=[0=>'No dependiente'];

        foreach ($preguntas as $key => $value) {
            $list[(int)$value->id]=$value->descripcion;
        }

        //array_unshift($list, "No dependiente");
        return $list;
    }
}
