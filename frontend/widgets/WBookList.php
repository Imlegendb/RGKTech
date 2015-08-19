<?php
	
namespace frontend\widgets;
use Yii;

class WBookList extends \yii\bootstrap\Widget
{
	public $models;
	public $sort;
	public $pages;
	
	public $openID;
	
	public $modelFilter;
	
    public function init()
    {
	    parent::init();
    }

    public function run() 
    {
	    return $this->render('books/list', ['modelFilter' => $this->modelFilter, 'models' => $this->models, 'sort' => $this->sort, 'pages' => $this->pages, 'openID' => $this->openID]);
    }
}