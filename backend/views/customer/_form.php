<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Customer */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'ctitle')->textInput(['maxlength' => true]) ?>

    <!--<?= $form->field($model, 'cimg_path')->textInput(['maxlength' => true]) ?>-->

	<?= $form->field($uploadForm, 'imageFile')->fileInput()->label('Фото в формате .jpg, .jpeg, .png. При загрузке изображение автоматически обрезается исходя из центра в отношении 27/12 для ширины/высоты.') ?>
	<?php
    if(isset($model->cimg_path) && file_exists(Yii::getAlias('@uploads', $model->cimg_path)))
    { 
        echo Html::img('@frontendWebroot/uploads/customers/' . $model->cimg_path, ['style'=>'max-width:50%']);
    } 
    ?>

    <div class="form-group"><br>
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
