<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Saleoff */

$this->title = 'Create Saleoff';
$this->params['breadcrumbs'][] = ['label' => 'Saleoffs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="saleoff-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
