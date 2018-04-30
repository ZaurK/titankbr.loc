<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */

$this->title = $model->stitle;
$this->params['breadcrumbs'][] = ['label' => 'Слайды', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этот элемент?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
			'stitle',
            'stext:ntext',
            //'simg_path',
            'slink',
			[
            'label' => 'Фото',
            'format' => 'raw',
            'value' => function($data){
                return Html::img('@frontendWebroot/uploads/slides/' .$data->simg_path, [
                    'alt'=>'',
                    'style' => 'width:50%;'
                ]);
            },
			 'contentOptions'=>['style'=>'max-width: 200px;'] 
            ],
        ],
    ]) ?>

</div>
