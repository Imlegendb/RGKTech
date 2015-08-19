<?

namespace common\components\actions\books;

use common\components\MBooks;
use common\models\Book;
use yii\helpers\Url;
use Yii;

class ItemUpdate extends MBooks
{
    public $view = 'update';

    public function run($id)
    {
        $model = $this->_model->getByID($id);

        if($model === null)
            throw new \yii\web\HttpException(404, self::ERROR_NOT_FOUND);
        if(Yii::$app->request->isPost)
        {
	        if ($model->load($_POST) && $model->save()) 
	        {
                \Yii::$app->getSession()->setFlash('success', self::SUCCESS_UPDATE);
                return $this->controller->goBack();
		    }

        }

        return $this->controller->render($this->view, array("model" => $model));
    }
}

?>