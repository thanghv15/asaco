<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\modules\categorys\models\Type_albumSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="type-album-search">
    <?php $form = ActiveForm::begin(
        [
            'action' => ['index'],
            'method' => 'get',
            'options' => ['class' => 'form-horizontal'],
        ]
    ); ?>
    <div style="margin-top: 10px">
        <?= $form->field($model, 'search_text', ['options' => ['class' => 'col-xs-4']])->textInput(['placeholder' => 'Nhập tên bài hát'])->label(false) ?>
    </div>
</div>
<div class="form-group">
    <?= Html::submitButton('Tìm kiếm', ['class' => 'btn btn-primary']) ?>
</div>
<?php ActiveForm::end(); ?>
