<?php

namespace app\modules\admin\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\admin\models\Page;

/**
 * PageSearch represents the model behind the search form about `app\modules\admin\models\Page`.
 */
class PageSearch extends Page
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['page_id', 'page_owner', 'show_breadcrumb', 'featured'], 'integer'],
            [['page_name', 'page_content', 'page_status', 'slug', 'meta_description', 'meta_keywords', 'layout', 'sidebar', 'page_date_created', 'page_date_modified', 'page_type', 'allow_comments', 'featured_image'], 'safe'],
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
        $query = Page::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'page_id' => $this->page_id,
            'page_owner' => $this->page_owner,
            'show_breadcrumb' => $this->show_breadcrumb,
            'page_date_created' => $this->page_date_created,
            'page_date_modified' => $this->page_date_modified,
            'featured' => $this->featured,
        ]);

        $query->andFilterWhere(['like', 'page_name', $this->page_name])
            ->andFilterWhere(['like', 'page_content', $this->page_content])
            ->andFilterWhere(['like', 'page_status', $this->page_status])
            ->andFilterWhere(['like', 'slug', $this->slug])
            ->andFilterWhere(['like', 'meta_description', $this->meta_description])
            ->andFilterWhere(['like', 'meta_keywords', $this->meta_keywords])
            ->andFilterWhere(['like', 'layout', $this->layout])
            ->andFilterWhere(['like', 'sidebar', $this->sidebar])
            ->andFilterWhere(['like', 'page_type', $this->page_type])
            ->andFilterWhere(['like', 'allow_comments', $this->allow_comments])
            ->andFilterWhere(['like', 'featured_image', $this->featured_image]);

        return $dataProvider;
    }
}
