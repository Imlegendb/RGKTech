<?php
	
namespace frontend\widgets;
use Yii;

class WBookUpdate extends \yii\bootstrap\Widget
{
	public $model;
	
    public function init()
    {
	    parent::init();
    }

    public function run() 
    {
	    return $this->render('books/update', ['model' => $this->model]);
    }
}