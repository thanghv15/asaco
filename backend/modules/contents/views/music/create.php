<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\categorys\models\Type_album */

$this->title = 'Thêm mới bài hát';
$this->params['breadcrumbs'][] = ['label' => 'Type Albums', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="province-create col-md-9" style="margin-left: 12%; margin-top:20px;">
	<fieldset style="border: 1px solid #0093DD; border-radius: 10px; ">
		<legend style="text-align: center;  color: #0093DD; font-size: 15px;border-bottom: 0px; width: auto;"><h3 class="add-color-content-header"><?= Html::encode($this->title) ?></h3></legend>
		<div class="mapping-content-updateform">
            <?= $this->render('_form', [
                'model' => $model,
            ]) ?>
        </div>
	</fieldset>
</div>