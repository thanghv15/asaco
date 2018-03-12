<?php

namespace backend\modules\contents\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\modules\contents\models\Images;

/**
 * ImagesSearch represents the model behind the search form about `backend\modules\contents\models\Images`.
 */
class ImagesSearch extends Images
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'type', 'create_time', 'create_by', 'update_time', 'update_by'], 'integer'],
            [['title', 'code', 'url', 'description', 'authors'], 'safe'],
            [['search_text'],'trim'],
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
        $query = Images::find();

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
            'type' => 4,
        ]);

        $query->andFilterWhere(['like', 'title', $this->search_text]);
        return $dataProvider;
    }
}
