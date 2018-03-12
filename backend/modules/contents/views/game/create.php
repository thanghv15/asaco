<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\modules\contents\models\Game */

$this->title = 'Thêm mới trò chơi';
$this->params['breadcrumbs'][] = ['label' => 'Games', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="game-create col-md-12" style="margin-top:20px;" >

    <fieldset style="border: 1px solid #0093DD; border-radius: 10px; ">
		<legend style="text-align: center;  color: #0093DD; font-size: 15px;border-bottom: 0px; width: auto;"><h3 class="add-color-content-header"><?= Html::encode($this->title) ?></h3></legend>
		<div class="mapping-content-updateform">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
    	</div>
	</fieldset>


</div>
