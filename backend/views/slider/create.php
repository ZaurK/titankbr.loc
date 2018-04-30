<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\Slider */

$this->title = 'Добавить слайд';
$this->params['breadcrumbs'][] = ['label' => 'Слайды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
		'uploadForm' => $uploadForm,
    ]) ?>

</div>
