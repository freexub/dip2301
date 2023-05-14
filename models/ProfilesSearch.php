<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Profiles;

/**
 * ProfilesSearch represents the model behind the search form of `app\models\Profiles`.
 */
class ProfilesSearch extends Profiles
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'type_id'], 'integer'],
            [['sname', 'name', 'fname', 'birthday', 'adress', 'iin', 'date_update', 'date_create'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Profiles::find();

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
            'user_id' => $this->user_id,
            'birthday' => $this->birthday,
            'type_id' => $this->type_id,
            'date_update' => $this->date_update,
            'date_create' => $this->date_create,
        ]);

        $query->andFilterWhere(['like', 'sname', $this->sname])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'fname', $this->fname])
            ->andFilterWhere(['like', 'adress', $this->adress])
            ->andFilterWhere(['like', 'iin', $this->iin]);

        return $dataProvider;
    }
}
