<?php

namespace common\modules\books\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\modules\books\models\Catalog;

/**
 * BookCatalogSearch represents the model behind the search form about `common\modules\books\models\Catalog`.
 */
class CatalogSearch extends Catalog
{
    public $authors;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['authors'], 'safe'],
            [['title', 'date_publication', 'created_at', 'updated_at'], 'safe'],
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
        $query = Catalog::find()->distinct();

        $query->joinWith(['authors']);
        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort'=> [
                'defaultOrder' => ['id'=>SORT_DESC],
                'attributes' => [
                    'id',
                    'date_publication',
                    'title',
                    'authors' => [
                        'asc' => ['books_authors.full_name' => SORT_ASC],
                        'desc' => ['books_authors.full_name' => SORT_DESC],
                    ]
                ]
            ],
            'pagination' => [
                'pageSize' => \common\modules\books\Module::getInstance()->defaultCatalogPerPage,
            ],

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
            'date_publication' => $this->date_publication,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,

        ]);


        $query->andFilterWhere(['like', 'books_authors.full_name', $this->authors]);
        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
