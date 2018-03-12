<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\file\FileInput;
use backend\modules\product\models\Product_type;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model backend\modules\contents\models\Baigiang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="baigiang-form">

    <?php $form = ActiveForm::begin(['enableAjaxValidation' => true]); ?>

    <?= $form->field($model, 'cate_id')->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Product_type::find()->all(),'id', 'title'),
        'language' => 'vi',
        'options' => ['placeholder' => '--- Lựa chọn danh mục ---'],
        'pluginOptions' => [
        'allowClear' => true
        ],
        ])->label('Lựa chọn danh mục<span class="required_data"> *</span>');
    ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => 255])->label('Tên video bài học<span class="required_data"> *</span>') ?>

    <?= $form->field($model, 'url')->textInput(['maxlength' => 255])->label('KeyID video youtube<span class="required_data"> *</span>') ?>

    <?= $form->field($model, 'authors')->textInput(['maxlength' => 255])->label('Tác giả') ?>

    <?= $form->field($model, 'description')->textArea(['maxlength' => 2000])->label('Mô tả') ?>

    <div>
      	<div class="form-group pull-right">
	        <?= Html::submitButton($model->isNewRecord ? 'Lưu' : 'Cập nhật', ['class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
	        <?= Html::a('Trở lại', ['index'], ['class' => 'btn btn-default']) ?>
      	</div>
     </div>

    <?php ActiveForm::end(); ?>

</div>
