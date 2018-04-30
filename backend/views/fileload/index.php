<?php
/* @var $this yii\web\View */
use Yii;
use yii\helpers\Html;

$this->title = 'Загрузка прайс-листа';
$this->params['breadcrumbs'][] = ['label' => 'Прайс', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>

<?= $this->render('@backend/views/layouts/flash')?>

   <div class="fileload-create">
       <h1><?= Html::encode($this->title) ?></h1>
   </div>

