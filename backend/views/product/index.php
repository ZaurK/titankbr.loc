<?php

use yii\helpers\Html;

use yii\grid\GridView;
use yii\helpers\Url;
use backend\models\Product;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продукция';
$this->params['breadcrumbs'][] = $this->title;
?>
<ul class="nav nav-tabs">
  <li><a href="<?=Url::toRoute(['category/index']) ?>">Категории</a></li>
  <li class="active"><a href="<?=Url::toRoute(['product/index']) ?>">Продукция</a></li>
</ul>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить продукт', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

	<div class="table-responsive">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
			
            
            'ptitle',
			[
              'attribute'=>'cat_id',
              'label'=>'Категория',
              'format'=>'text', // Возможные варианты: raw, html
              'content'=>function($data){
                  return $data->getCatName();
              },
              'filter' => Product::getCatsList()
            ],
			/*
			[
                'attribute'=>'category.ctitle',
                'label'=>'Категория',                                
            ],
			*/
            //'pdescription:ntext',
			'price',
            //'img_path',
			[
            'label' => 'Фото',
            'format' => 'raw',
			'headerOptions' => ['width' => '200'],
            'value' => function($data){
                return Html::img('@frontendWebroot/uploads/images/' .$data->img_path, [
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
