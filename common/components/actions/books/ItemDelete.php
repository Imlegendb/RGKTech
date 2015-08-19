<?

namespace common\components\actions\books;

use common\components\MBooks;
use common\models\Book;
use Yii;


class ItemDelete extends MBooks
{
    public function run($id = 0)
    {
        if(intval($id) == 0)
            throw new \yii\web\HttpException(400, self::ERROR_REQUEST);
        
        $model = $this->_model->getByID($id);

        if($model === null)
            throw new \yii\web\HttpException(404, self::ERROR_NOT_FOUND);

        if($model->delete())
        {
            \Yii::$app->getSession()->setFlash('success', self::SUCCESS_DELETE);
            return $this->controller->goBack();
        }

    }
}

?>