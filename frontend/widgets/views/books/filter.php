<? use yii\widgets\ActiveForm; ?>
<? use yii\helpers\Url; ?>
<? use yii\helpers\Html; ?>
<? use yii\helpers\ArrayHelper; ?>
<? use common\models\Author; ?>

<? 

$form = ActiveForm::begin([
    'method' => 'post',
    'options' => [
        'class' => '',
        //'data-pjax' => '',
    ],
    'id' => 'book-filter'
]); 

?>

	<div class="row">
		<div class="col-xs-6">
			
			<div class="row">
				<div class="col-xs-6">
					<?= $form->field($model, 'author_id', ['template' => '{label}<br/>{input}'])->dropDownList(ArrayHelper::map(Author::find()->asArray()->orderBy('firstname')->all(), 'id', 'firstname'), ['multiple' => false, 'data-placeholder' => 'fdsfsd', 'class' => 'form-control', 'prompt' => 'Выберите автора'])->hint("test") ?>
				</div>
				<div class="col-xs-6">
					<?= $form->field($model, 'name')->textInput(['placeholder' => 'Остров Свободы']) ?>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-6">
					<?= $form->field($model, 'date_start')->textInput(['placeholder' => '01/01/2000']) ?>
				</div>
				<div class="col-xs-6">
					<?= $form->field($model, 'date_end')->textInput(['placeholder' => '01/01/1990']) ?>
				</div>
			</div>
			
			<?= $form->field($model, 'doFilter')->hiddenInput(['value' => 1])->label(false); ?>
	
		</div>
		<div class="col-xs-6">
			<div class="text-right">
				<?= Html::submitButton(Yii::t('app', 'Искать'), ['class' => 'btn btn-primary btn-lg']) ?>
			</div>
		</div>
	</div>

<? ActiveForm::end(); ?>