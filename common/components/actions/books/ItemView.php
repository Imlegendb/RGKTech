<?
	
namespace common\components\actions\books;

use common\components\MBooks;
use common\models\Book;
use Yii;

class ItemView extends MBooks
{
    public $view = 'view';
    
    public function run($id)
    {
        $model = $this->_model->getByID($id);
        
        if($model === null)
            throw new \yii\web\HttpException(404, self::ERROR_NOT_FOUND);

        return $this->controller->render($this->view, array("model" => $model));
    }
}

?>