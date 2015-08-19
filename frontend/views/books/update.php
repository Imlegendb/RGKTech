<? 
	
use frontend\assets\AppAsset;
use yii\helpers\Html; 
use yii\helpers\Url; 
use frontend\widgets\WBookUpdate; 

AppAsset::register($this);
	
?>

<? $this->title = 'Редактирование книги'; ?>

<?= WBookUpdate::widget(['model' => $model]);?>
