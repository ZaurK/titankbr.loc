<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Slider */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="slider-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'stitle')->textInput(['maxlength' => true]) ?>
	
    <?= $form->field($model, 'stext')->textarea(['rows' => 6])->label('Текст на слайде (максимум 3 строки - остальное обрежет, строки отличаются по цвету и размеру.)') ?>

    <!--<?= $form->field($model, 'slink')->textInput(['maxlength' => true]) ?>-->
	
	<?= $form->field($uploadForm, 'imageFile')->fileInput()->label('Фото в формате .jpg, .jpeg, .png. Для нормального отображения загружайте картинки 1163px на 365px., изображение в любом случае будет подгоняться под такой размер.') ?>
	<?php
    if(isset($model->simg_path) && file_exists(Yii::getAlias('@uploads', $model->simg_path)))
    { 
        echo Html::img('@frontendWebroot/uploads/slides/' . $model->simg_path, ['style'=>'max-width:50%']);
    } 
    ?>

    <div class="form-group"><br>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
