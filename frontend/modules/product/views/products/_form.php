<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\product\models\Products */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_en')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title_fr')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'description_fr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'desc_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'desc_fr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body_fr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body2')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body2_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body2_fr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body3')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body3_en')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'body3_fr')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image_preset')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image_url')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image_title')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'image_alt')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'is_new')->textInput() ?>

    <?= $form->field($model, 'is_promotion')->textInput() ?>

    <?= $form->field($model, 'is_seller')->textInput() ?>

    <?= $form->field($model, 'is_hot')->textInput() ?>

    <?= $form->field($model, 'is_stock')->textInput() ?>

    <?= $form->field($model, 'list_price')->textInput() ?>

    <?= $form->field($model, 'input_price')->textInput() ?>

    <?= $form->field($model, 'sell_price')->textInput() ?>

    <?= $form->field($model, 'warranty')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'orders')->textInput() ?>

    <?= $form->field($model, 'publish')->checkbox() ?>

    <?= $form->field($model, 'show_price')->checkbox() ?>

    <?= $form->field($model, 'slug')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tags')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'seo_title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_keyword')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'seo_description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'categories_id')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sub_categories_id')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'create_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'create_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'update_time')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'update_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'hightlight')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'provider_id')->textInput() ?>

    <?= $form->field($model, 'xuat_xu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bao_hanh')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mau_sac')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'chat_lieu')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'kich_thuoc')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'so_luong')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
