<? use yii\helpers\Html; ?>
<? use yii\helpers\Url; ?>
<? use frontend\widgets\WBookView;  ?>
<? use frontend\widgets\WBookFilter;  ?>

<?= WBookFilter::widget(['model' => $modelFilter]);?>

<table class="table table-striped">
	<thead>
	<tr>
		<th><?= $sort->link("id") ?></th>
		<th><?= $sort->link("name") ?></th>
		<th><?= $sort->link("preview") ?></th>
		<th><?= $sort->link("authorname") ?></th>
		<th><?= $sort->link("date") ?></th>
		<th><?= $sort->link("date_create") ?></th>
		<th>Кнопки действий</th>
	</tr>
	</thead>
	<tbody>
		<? foreach($models as $one): ?>
			<tr>
				<th scope="row"><?= Html::encode($one->id) ?></th>
				<td><?= Html::encode($one->name) ?></td>
				<td>
					<a class="example-image-link" href="<?= Html::encode($one->preview) ?>" data-lightbox="example-2">
						<?= Html::img($one->preview, ['class' => 'img-responsive', 'width' => 50]); ?>
					</a>
				</td>
				<td><?= Html::encode($one->author->firstname.' '.$one->author->lastname) ?></td>
				<? Yii::$app->formatter->locale = 'ru-RU'; ?>
				<td><?= \Yii::$app->formatter->asDate($one->date); ?></td>
				<td><?= \Yii::$app->formatter->asRelativeTime($one->date_create); ?></td>
				<td>
					<a class="btn btn-xs btn-warning" href="<?= Url::toRoute(['/books/edit', 'id' => $one->id]) ?>"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span></a>
					<a class="btn btn-xs btn-default open-detail" href="<?= Url::current(['openID' => $one->id]) ?>"><span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span></a>
					<a class="btn btn-xs btn-danger remove" href="<?= Url::toRoute(['/books/remove', 'id' => $one->id]) ?>"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></a>
				</td>
			</tr>
		<? endforeach; ?>
	</tbody>
</table>

<?= \yii\widgets\LinkPager::widget([
    'pagination' => $pages,
]);	
?>

<?= WBookView::widget(['id' => $openID]);?>