<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\modules\product\models\Product_type;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\components\ComponentBase;
use kartik\date\DatePicker;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
/* @var $this yii\web\View */
/* @var $model backend\modules\categorys\models\Type_album */
/* @var $form yii\widgets\ActiveForm */
$components = new ComponentBase();
$base_url = $components->Base_url();
?>

<div class="type-album-form">
    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'url')->widget(FileInput::classname(), [
    'options' => ['accept' => 'audio/*'],
    ]) ?>
    <div class="col-xs-12 padding-left-0 padding-right-0">
        <?= $form->field($model, 'cate_id',['options' => ['class' => 'col-xs-6  padding-left-0']])->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Product_type::find()->all(),'id', 'title'),
        'language' => 'vi',
        'options' => ['placeholder' => '--- Lựa chọn danh mục ---'],
        'pluginOptions' => [
        'allowClear' => true
        ],
        ])->label('Lựa chọn danh mục (*)');
        ?>
        <?= $form->field($model, 'authors', ['options' => ['class' => 'col-xs-6  padding-right-0']])->textInput(['maxlength' => true]) ?>
    </div>
    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'options' => ['rows' => 6],
        'preset' => 'basic'
    ]) ?>
    <div class="col-xs-12 padding-right-0">
        <div class="form-group pull-right">
            <?= Html::submitButton($model->isNewRecord ? 'Lưu' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
            <?= Html::a('Trở lại', ['index'], ['class' => 'btn btn-default']) ?>
        </div>
     </div>
    <?php ActiveForm::end(); ?>
</div>
