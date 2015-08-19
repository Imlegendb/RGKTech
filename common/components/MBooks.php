<?
	
namespace common\components;
use common\models\Book;
use Yii;

abstract class MBooks extends \yii\base\Action
{
    public $view = "";
    public $_model;
    
    const SUCCESS_CREATE = "Книга была успешно добавлена";
    const SUCCESS_UPDATE = "Книга успешно отредактирована";
    const SUCCESS_DELETE = "Книга успешно удалена";
    const SUCCESS_FILTER = "Поиск успешно завершен";
    
    const ERROR_NOT_FOUND = "Книга не найдена";
    const ERROR_REQUEST = "Неверный запрос";
    const ERROR_PERMISSION = "Нет доступа";
    
    public function init()
    {
	    parent::init();
	    $this->_model = new Book();
    }
}
?>