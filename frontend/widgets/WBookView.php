<?php
	
namespace frontend\widgets;
use common\models\Book;
use Yii;

class WBookView extends \yii\bootstrap\Widget
{
	public $model;
	public $id;
	
    public function init()
    {
	    parent::init();
    }

    public function run() 
    {
	    if($this->model == null && intval($this->id) == 0)
	    	return; // nothing to display
	    	
	    if($this->model == null && intval($this->id) > 0)
	    {
		    $mdl = new Book;
		    $this->model = $mdl->getByID($this->id);
	    }
	    	
	    return $this->render('books/view', ['model' => $this->model]);
    }
}