<?php
namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;

/**
 * Author model
 *
 * @property integer $id
 * @property string $firstname
 * @property string $lastname
 */
class Author extends \yii\db\ActiveRecord
{
	
	public $displayName;
	
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%authors}}';
    }

    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            TimestampBehavior::className(),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [

        ];
    }
    
	public function afterFind() 
	{
		parent::afterFind();
		
		$this->displayName = $this->firstname . ' ' . $this->lastname;
	}


}
