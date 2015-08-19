<?php

namespace common\models;
use yii\data\Sort;
use yii\data\Pagination;
use Yii;

/**
 * Book model
 *
 * @property integer $id
 * @property string $name
 * @property string $date_create
 * @property string $date_update
 * @property string $preview
 * @property string $date
 * @property integer $author_id
 */
 
class Book extends \yii\db\ActiveRecord
{
    const STATUS_DELETED = 0;
    const STATUS_ACTIVE = 10;
    
    public $formatDate;
    
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%books}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['date_create', 'date_update', 'date', 'author_id'], 'integer'],
            [['preview'], 'string'],
            ['formatDate', 'date', 'format' => 'php:d.m.Y', 'timestampAttribute' => 'date'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => '#',
            'name' => 'Название книжки',
            'preview' => 'Обложка',
            'author_id' => 'Автор',
            'date' => 'Дата выпуска',
            'date_create' => 'Дата добавления',
            'date_update' => 'Дата последнего обновления',
            'formatDate' => 'Дата выпуска',
        ];
    }
    
	public function beforeSave($insert)
	{
	    if (parent::beforeSave($insert)) 
	    {
		    if($insert)
	        	$this->date_create = time();
	        	
	        $this->date_update = time();
	        
	        return true;
	    } 
	    else 
	    {
	        return false;
	    }
	}
	
	public function afterFind() 
	{
		parent::afterFind();
		
		$this->formatDate = date('d.m.Y', $this->date);
	}
	
	public function getList($arFilter = array())
	{
		if(!empty($arFilter))
		{
			$arWhere = array();

			foreach($arFilter as $key => $one)
			{
				$arWhere[$key] = trim($one); 
			}
		}
		
	    $sort = new Sort([
	        'attributes' => [
	            'id' => ['label' => '#'],
	            'name' => ['label' => 'Название книжки'],
	            'preview' => ['label' => 'Обложка'],
			    'authorname' => [
			        'asc' => ['au.firstname' => SORT_ASC, 'au.lastname' => SORT_ASC],
			        'desc' => ['au.firstname' => SORT_DESC, 'au.lastname' => SORT_DESC],
			        'default' => SORT_DESC,
			        'label' => 'Автор книжки',
			    ],
	            'date' => ['label' => 'Дата выпуска'],
	            'date_create' => ['label' => 'Дата создания'],
	        ],
	    ]);

	    $query = self::find()
			->joinWith([
			    'author' => function ($q) {
			        $q->from('{{%authors}} au');
			    },
			])
			->where(['status' => self::STATUS_ACTIVE]);
	        
	        
	    if(isset($arWhere["author_id"]) && intval($arWhere["author_id"]) > 0)
	    	$query->andWhere(['and', ['author_id' => $arWhere["author_id"]]]);
	    	
	    if(isset($arWhere["name"]) && strlen($arWhere["name"]) > 0)
	    	$query->andWhere(['and', ['name' => $arWhere["name"]]]);
	    	
	    if(isset($arWhere["date_start_int"]) && intval($arWhere["date_start_int"]) > 0)
	    	$query->andWhere(['>', 'date', $arWhere["date_start_int"]]);
	    	
	    if(isset($arWhere["date_end_int"]) && intval($arWhere["date_end_int"]) > 0)
	    	$query->andWhere(['<', 'date', $arWhere["date_end_int"]]);
	        
	    $countQuery = clone $query;
	    $pages = new Pagination(['totalCount' => $countQuery->count()]);
	    $pages->pageSize = 10;
	    
		$models = $query->offset($pages->offset)
	        ->limit($pages->limit)
	        ->orderBy($sort->orders)
	        ->all();


		return array('models' => $models, 'sort' => $sort, 'pages' => $pages);
	}
	
	public function getByID($id = 0)
	{
		if(intval($id) == 0)
			return false;
			
		return self::findOne($id);
	}

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAuthor()
    {
        return $this->hasOne(Author::className(), ['id' => 'author_id']);
    }
}