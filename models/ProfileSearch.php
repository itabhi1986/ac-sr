<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Profile;
use yii\db\Query;

/**
 * ProfileSearch represents the model behind the search form about `app\models\Profile`.
 */
class ProfileSearch extends Profile
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'category'], 'integer'],
            [['name', 'public_email', 'gravatar_email', 'gravatar_id', 'location', 'website', 'bio', 'mobile', 'description', 'address', 'state', 'city', 'zipcode', 'profile_slug'], 'safe'],
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
        $query = Profile::find();
        
       
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
            'category' => $this->category,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'public_email', $this->public_email])
            ->andFilterWhere(['like', 'gravatar_email', $this->gravatar_email])
            ->andFilterWhere(['like', 'gravatar_id', $this->gravatar_id])
            ->andFilterWhere(['like', 'location', $this->location])
            ->andFilterWhere(['like', 'website', $this->website])
            ->andFilterWhere(['like', 'bio', $this->bio])
            ->andFilterWhere(['like', 'mobile', $this->mobile])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'state', $this->state])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'zipcode', $this->zipcode])
            ->andFilterWhere(['like', 'profile_slug', $this->profile_slug]);

        return $dataProvider;
    }
    
    public function customSearch($q)
    {
            
        $connection = \Yii::$app->db;
        $data = $connection->createCommand("select * from profile where match(name,description,address) against ('".$q."' in boolean mode)");
    	$data = $data->queryAll();             
        
        $profiledata = $connection->createCommand("select id,category_slug from category");
    	$profiledata = $profiledata->queryAll();
        $pdata = array();
        foreach($profiledata as $pkey=>$pvalue)
        {
            $pdata[$pvalue['id']]= $pvalue['category_slug'];
        }
        $returnData = array();
        
        if(count($data)>0)
        {
            foreach($data as $key=>$value)
            {
                if(array_key_exists($value['category'], $pdata))
                {
                    
                   $value['category_slug']=$pdata[$value['category']];
                    
                }
             $returnData[]=$value;  
            }
        }        
        return $returnData;
    }
}
