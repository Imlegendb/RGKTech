<?php
	
namespace frontend\widgets;
use frontend\models\BookFilter;
use Yii;

class WBookFilter extends \yii\bootstrap\Widget
{
	public $model;
	
    public function init()
    {
	    parent::init();
    }

    public function run() 
    {
	    if($this->model == null)
	    	$this->model = new BookFilter();
	    	
        return $this->render('books/filter', ["model" => $this->model]);
    }
}