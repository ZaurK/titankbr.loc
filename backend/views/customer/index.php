<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\CustomerSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'ctitle',
            //'cimg_path',
			[
            'label' => 'Фото',
            'format' => 'raw',
			'headerOptions' => ['width' => '300'],
            'value' => function($data){
                return Html::img('@frontendWebroot/uploads/customers/' .$data->cimg_path, [
                    'alt'=>'',
                    'style' => 'max-width:100%;'
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
