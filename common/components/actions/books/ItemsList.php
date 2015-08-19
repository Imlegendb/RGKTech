<?
	
namespace common\components\actions\books;

use common\components\MBooks;
use common\models\Book;
use frontend\models\BookFilter;
use Yii;

class ItemsList extends MBooks
{
    public $view = 'list';
    public $arFilter = array();

    public function run($openID = 0)
    {
	    if(Yii::$app->request->isPost && $_POST["BookFilter"]["doFilter"] == 1)
	    	$mfilter = $this->runFilter();
	    
        $arData = $this->_model->getList($this->arFilter);

        return $this->controller->render($this->view, array('modelFilter' => $mfilter, "models" => $arData["models"], "sort" => $arData["sort"], "pages" => $arData["pages"], 'openID' => intval($openID)));
    }
    
    public function runFilter()
    {
	    $mfilter = new BookFilter();
	    
	    if($mfilter->load($_POST) && $mfilter->validate())
	    {
			$this->arFilter = $mfilter->attributes;
			\Yii::$app->getSession()->setFlash('success', self::SUCCESS_FILTER);
	    }	
	    
	    return $mfilter;
    }

}
?>