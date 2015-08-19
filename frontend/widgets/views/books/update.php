<? use yii\widgets\ActiveForm; ?>
<? use yii\helpers\Url; ?>
<? use yii\helpers\Html; ?>
<? use yii\helpers\ArrayHelper; ?>
<? use common\models\Author; ?>

<? $form = ActiveForm::begin(); ?>

<?= $form->field($model, 'name') ?>
<?= $form->field($model, 'preview') ?>

<?= $form->field($model, 'formatDate')->widget(\yii\jui\DatePicker::classname(), [
    'language' => 'ru',
    'dateFormat' => 'dd.MM.yyyy',
]) ?>

<?= $form->field($model, 'author_id', ['template' => '{label}{input}'])->dropDownList(ArrayHelper::map(Author::find()->asArray()->orderBy('firstname')->all(), 'id', 'firstname'), ['multiple' => false, 'data-placeholder' => 'fdsfsd', 'class' => 'form-control'])->hint("test") ?>


<?= Html::submitButton(Yii::t('app', 'Отправить'), ['class' => 'btn btn-primary']) ?>

<? ActiveForm::end(); ?>