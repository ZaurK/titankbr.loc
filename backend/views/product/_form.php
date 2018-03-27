<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use backend\models\Category;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">

     <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
	
	<?php
    $categories = ArrayHelper::map(Category::find()->all(), 'id', 'ctitle');
    echo $form->field($model, 'cat_id')->dropDownList($categories, ['prompt' => 'Выберите категорию']);
    ?>

    <?= $form->field($model, 'ptitle')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pdescription')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'img_path')->textInput(['maxlength' => true]) ?>
	
	

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
	
	
	
	
	
	
	
</div>
