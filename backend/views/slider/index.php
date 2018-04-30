<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\SliderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Слайды';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить слайд', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
			'stitle',
            'stext:ntext',
            //'simg_path',
            //'slink',
			[
            'label' => 'Фото',
            'format' => 'raw',
			'headerOptions' => ['width' => '400'],
            'value' => function($data){
                return Html::img('@frontendWebroot/uploads/slides/' .$data->simg_path, [
                    'alt'=>'',
                    'style' => 'width:100%;'
                ]);
            },
			 'contentOptions'=>['style'=>''] 
            ],

            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия', 
            'headerOptions' => ['width' => '10'],
            'template' => '{view} {update} {delete}{link}',
            ],
        ],
    ]); ?>
	</div>
</div>
