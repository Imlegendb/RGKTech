<? use yii\helpers\Html; ?>
<? use yii\helpers\Url; ?>

<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="book-detail">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
				<h4 class="modal-title" id="myLargeModalLabel"><?= Html::encode($model->name) ?></h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-xs-3">
						<?= Html::img($model->preview, ['width' => 200]) ?>
					</div>
					<div class="col-xs-9">
						<div class="param">
							<h4>Дата выхода книги</h4>
							<?= \Yii::$app->formatter->asTime($model->date, "php:d/m/Y H:i"); ?>
						</div>
						<div class="param">
							<h4>Дата добавления в базу</h4>
							<?= \Yii::$app->formatter->asTime($model->date_create, "php:d/m/Y H:i"); ?>
						</div>
						<div class="param">
							<h4>Автор</h4>
							<?= Html::encode($model->author->displayName) ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>