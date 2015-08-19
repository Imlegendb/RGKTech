<? 
	
use frontend\assets\AppAsset;
use yii\helpers\Html; 
use yii\helpers\Url; 
use frontend\widgets\WBookList; 
use yii\widgets\Pjax; 

AppAsset::register($this);

?>


<? $this->title = 'Список книг'; ?>

<? Pjax::begin(['linkSelector' => '.open-detail, .remove', 'enablePushState' => false]); ?>
	<?= WBookList::widget(['modelFilter' => $modelFilter, 'models' => $models, 'sort' => $sort, 'pages' => $pages, 'openID' => $openID]);?>
<? Pjax::end(); ?>
