<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\GestionRiesgo;

/**
 * GestionRiesgoSearch represents the model behind the search form about `app\models\GestionRiesgo`.
 */
class GestionRiesgoSearch extends GestionRiesgo
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_centro_costo'], 'integer'],
            [['fecha'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = GestionRiesgo::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'id_centro_costo' => $this->id_centro_costo,
            'fecha' => $this->fecha,
        ]);

        return $dataProvider;
    }
}
