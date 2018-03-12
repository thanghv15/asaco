<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\modules\product\models\ProductsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="products-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'title_en') ?>

    <?= $form->field($model, 'title_fr') ?>

    <?php // echo $form->field($model, 'description') ?>

    <?php // echo $form->field($model, 'description_en') ?>

    <?php // echo $form->field($model, 'description_fr') ?>

    <?php // echo $form->field($model, 'desc') ?>

    <?php // echo $form->field($model, 'desc_en') ?>

    <?php // echo $form->field($model, 'desc_fr') ?>

    <?php // echo $form->field($model, 'body') ?>

    <?php // echo $form->field($model, 'body_en') ?>

    <?php // echo $form->field($model, 'body_fr') ?>

    <?php // echo $form->field($model, 'body2') ?>

    <?php // echo $form->field($model, 'body2_en') ?>

    <?php // echo $form->field($model, 'body2_fr') ?>

    <?php // echo $form->field($model, 'body3') ?>

    <?php // echo $form->field($model, 'body3_en') ?>

    <?php // echo $form->field($model, 'body3_fr') ?>

    <?php // echo $form->field($model, 'image_preset') ?>

    <?php // echo $form->field($model, 'image_url') ?>

    <?php // echo $form->field($model, 'image_title') ?>

    <?php // echo $form->field($model, 'image_alt') ?>

    <?php // echo $form->field($model, 'is_new') ?>

    <?php // echo $form->field($model, 'is_promotion') ?>

    <?php // echo $form->field($model, 'is_seller') ?>

    <?php // echo $form->field($model, 'is_hot') ?>

    <?php // echo $form->field($model, 'is_stock') ?>

    <?php // echo $form->field($model, 'list_price') ?>

    <?php // echo $form->field($model, 'input_price') ?>

    <?php // echo $form->field($model, 'sell_price') ?>

    <?php // echo $form->field($model, 'warranty') ?>

    <?php // echo $form->field($model, 'orders') ?>

    <?php // echo $form->field($model, 'publish')->checkbox() ?>

    <?php // echo $form->field($model, 'show_price')->checkbox() ?>

    <?php // echo $form->field($model, 'slug') ?>

    <?php // echo $form->field($model, 'tags') ?>

    <?php // echo $form->field($model, 'seo_title') ?>

    <?php // echo $form->field($model, 'seo_keyword') ?>

    <?php // echo $form->field($model, 'seo_description') ?>

    <?php // echo $form->field($model, 'categories_id') ?>

    <?php // echo $form->field($model, 'sub_categories_id') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <?php // echo $form->field($model, 'create_by') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'update_by') ?>

    <?php // echo $form->field($model, 'hightlight') ?>

    <?php // echo $form->field($model, 'provider_id') ?>

    <?php // echo $form->field($model, 'xuat_xu') ?>

    <?php // echo $form->field($model, 'bao_hanh') ?>

    <?php // echo $form->field($model, 'mau_sac') ?>

    <?php // echo $form->field($model, 'chat_lieu') ?>

    <?php // echo $form->field($model, 'kich_thuoc') ?>

    <?php // echo $form->field($model, 'so_luong') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
