<?php
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

    <?= $form->field($model, 'loadFile')->fileInput()->label('Файл прайс-листа') ?>

    <button>Загрузить</button>

<?php ActiveForm::end() ?>