<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
use kartik\file\FileInput;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;
use backend\modules\product\models\Product_type;
use backend\components\ComponentBase;
use backend\modules\users\models\User;

$components = new ComponentBase();
$base_url = $components->Base_url();
$base_url_image = $components->Base_url_images();
if ($model->image_preset) {
    $image = $base_url_image.'public/images/product_type/'.$model->image_preset;
}else{
    $image = '';
}

$product_type = new Product_type();


$list_category = $product_type->get_list_cate_form();

if ($model->id) {
    $level_cate = $product_type->get_level_cate($model->id);
}
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
/* @var $model backend\modules\product\models\Product_type */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-type-form">

    <?php $form = ActiveForm::begin(['id' => 'product-type-form','enableAjaxValidation' => true]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Tiêu đề<span class="required_data"> *</span>') ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true])->label('Mã<span class="required_data"> *</span>') ?>
    
    <?php if ((isset($level_cate) && $level_cate == 2) || !isset($level_cate)){ ?>
        <div class="col-xs-12 padding-right-0  padding-left-0">
            <?= $form->field($model,'parent_id',['options' => ['class' => 'col-xs-6 padding-left-0']])->widget(Select2::classname(), [
                    'data' => ArrayHelper::map($list_category, 'id', 'title'),
                    'language' => 'vi',
                    'options' => ['placeholder' => '--- Danh mục cha ---'],
                    'pluginOptions' => [
                    'allowClear' => true
                    ],
                ])->label('Danh mục menu cha');
            ?>
        </div>
    <?php } ?>
   

    <?= $form->field($model, 'publish')->checkbox() ?>

    <?php echo $form->field($model, 'is_top')->checkbox() ?>
    
    <div class="col-xs-12 padding-right-0 padding-left-0">
        <?= $form->field($model, 'orders',['options' => ['class' => 'col-xs-2 padding-left-0']])->textInput()->label('Thứ tự hiển thị') ?>
    </div>
    
    <?php //echo '<label id = "image" class="control-label">Ảnh đại diện</label><i> (Kích thước đề nghị: Rộng: 270px - Cao: 230px) </i>'; ?>
    
    <?php  
    //if ($model->isNewRecord) {  
    //         echo $form->field($model, 'image_preset')->widget(FileInput::classname(),[
    //         'options' => ['accept' => 'image/*'],
    //         'language'=>'vi',
    //         'pluginOptions' => [
    //             'previewSettings'=>  ['image'=> ['width' =>"270px", 'height'=> "230px"]],
    //             'overwriteInitial'=>true,
    //             'showUpload' => false,
    //             'fileActionSettings'=>[
    //                 'showZoom'=>false,
    //                 'showDrag'=> false,
    //             ],
    //             'browseLabel' => 'Chọn ảnh',
    //             'removeLabel' => 'Xóa',
    //             'removeClass' => 'btn btn-default',
    //             'browseClass' => 'btn btn-default',
    //             'showCaption' => false,
    //             'layoutTemplates' => [
    //                 'size' => '',
    //             ],
    //         ],
    //     ])->label(false);
    //      }else {
    //     echo $form->field($model, 'image_preset')->widget(FileInput::classname(),[
    //         'options' => ['accept' => 'image/*'],
    //         'language'=>'vi',
    //         'pluginOptions' => [
    //             'previewSettings'=>  ['image'=> ['width' =>"270px", 'height'=> "230px"]],
    //             'initialPreview' => [
    //                 $image ? Html::img($image,['class'=>'file-preview-image','style'=>['width'=>'270px', 'height'=>'230px']]) : null ],
    //             'overwriteInitial'=>true,
    //             'showUpload' => false,
    //             'fileActionSettings'=>[
    //                 'showZoom'=>false,
    //                 'showDrag'=> false,
    //             ],
    //             'browseLabel' => 'Chọn ảnh',
    //             'removeLabel' => 'Xóa',
    //             'removeClass' => 'btn btn-default',
    //             'browseClass' => 'btn btn-default',
    //             'showCaption' => false,
    //             'layoutTemplates' => [
    //                 'size' => '',
    //             ],
    //         ],
    //     ])->label(false);
    // }
    ?>
    

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
        ])->label('Mô tả') ?>

     <?php
      // $form->field($model, 'body')->widget(CKEditor::className(), [
    //         'options' => ['rows' => 4],
    //          'clientOptions' => [
    //             'toolbarGroups' => [
    //                 ['name' => 'clipboard', 'groups' => ['clipboard', 'undo' ]],
    //                 ['name' => 'editing', 'groups' => ['find', 'selection', 'spellchecker' ]],
    //                 ['name' => 'basicstyles', 'groups' => ['basicstyles', 'cleanup' ]],
    //                 ['name' => 'paragraph', 'groups' => ['list', 'indent', 'blocks', 'align', 'bidi' ]],
    //                 ['name' => 'links'],
    //                 ['name' => 'insert'],
    //                 '/',
    //                 ['name' => 'styles'],
    //                 ['name' => 'colors'],
    //                 ['name' => 'tools'],
    //                 ['name' => 'others']
    //             ],
    //         ],
    //     ])->label('Nội dung') ?>
    <div class="col-xs-12 padding-right-0 padding-left-0">
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
    <div class="col-xs-12 padding-right-0 mar_top_10">
        <div class="form-group pull-right ">
            <?= Html::submitButton($model->isNewRecord ? 'Tạo mới' : 'Cập nhật', ['id' => 'create-btn-new','class' => $model->isNewRecord ? 'btn btn-primary' : 'btn btn-primary']) ?>
            <?= Html::a('Trở lại', ['index'],  ['class' => $model->isNewRecord ? 'btn btn-default' : 'btn btn-default']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
