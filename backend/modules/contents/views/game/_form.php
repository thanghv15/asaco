<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\components\ComponentBase;
use backend\modules\product\models\Product_type;
use kartik\select2\Select2;
use dosamigos\ckeditor\CKEditor;
use backend\modules\users\models\User;

$components = new ComponentBase();
$base_url = $components->Base_url();

$users = new User();
if($model->create_by){
    $name_creater = $users->get_user_name($model->create_by);
}
else
{
    $name_creater = '';
}
if($model->update_by){
    $name_editer = $users->get_user_name($model->update_by);
}
else
{
    $name_editer = '';
}

/* @var $this yii\web\View */
/* @var $model backend\modules\contents\models\Word */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="word-form">

    <?php $form = ActiveForm::begin(['id' => 'word_form','enableAjaxValidation' => true,'options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Tên trò chơi<span class="required_data"> *</span>') ?>
    
    <div class="col-xs-12 padding-left-0 padding-right-0">
        <?= $form->field($model, 'cate_id',['options' => ['class' => 'col-xs-6  padding-right-0 padding-left-0']])->widget(Select2::classname(), [
        'data' => ArrayHelper::map(Product_type::find()->all(),'id', 'title'),
        'language' => 'vi',
        'options' => ['placeholder' => '--- Lựa chọn danh mục ---'],
        'pluginOptions' => [
        'allowClear' => true
        ],
        ])->label('Lựa chọn danh mục');
        ?>
        <?= $form->field($model, 'url',['options' => ['class' => 'col-xs-6  padding-right-0 ']])->textInput(['maxlength' => true]) ?>
    </div>
   
 
  

    <div class="col-md-12 mar_top_10 none_padding">
    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
            'options' => ['rows' => 4],
             'clientOptions' => [
                'toolbarGroups' => [
                     ['filebrowserUploadUrl' => 'site/url'],
                    ['name' => 'clipboard', 'groups' => ['clipboard', 'undo' ]],
                    ['name' => 'editing', 'groups' => ['find', 'selection', 'spellchecker' ]],
                    ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup' ]],
                    ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi' ]],
                    ['name' => 'links'],
                    ['name' => 'insert'],
                    '/',
                    ['name' => 'styles'],
                    ['name' => 'colors'],
                    ['name' => 'tools'],
                    ['name' => 'others']
                ],
            ],
        ]) ?>
    </div>
    <?php 
    if (!$model->isNewRecord) { ?>
    <div class="col-xs-12">
        <div class="col-xs-6 padding-left-0">
            <label class="control-label">Người tạo</label>
            <input type="text" class="form-control" name="" disabled value="<?= $name_creater?>">
        </div>
        <div class="col-xs-6 padding-left-0 padding-right-0">
            <label class="control-label">Thời gian tạo</label>
            <input type="text" class="form-control" name="" disabled value="<?= ($model->create_time != '') ? date('d/m/Y', $model->create_time) : ''; ?>">
        </div>
        <div class="col-xs-6 padding-left-0">
            <label class="control-label">Người cập nhật</label>
            <input type="text" class="form-control" name="" disabled value="<?= $name_editer ?>">
        </div>
        <div class="col-xs-6 padding-left-0 padding-right-0">
            <label class="control-label">Thời gian cập nhật</label>
            <input type="text" class="form-control" name="" disabled value="<?= ($model->update_time != '') ? date('d/m/Y', $model->update_time) : '';?> ">
        </div>
    </div>
       
    <?php } ?>
    <div class="col-md-12 none_padding mar_top_10">
        <div class="form-group pull-right">
            <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['id' => 'create-btn-new','class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
            <?= Html::a('Trở lại', ['index'],  ['class' => $model->isNewRecord ? 'btn btn-default' : 'btn btn-default']) ?>
        </div>
    </div>
    <?php ActiveForm::end(); ?>


</div>