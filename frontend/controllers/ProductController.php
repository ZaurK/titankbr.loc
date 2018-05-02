<?php

namespace frontend\controllers;

use frontend\models\Product;

class ProductController extends \yii\web\Controller
{
	public $layout = 'product';
	   
    public function actionIndex()
    {
		//$model = Product::find()->where(['id'=>$_GET['id']])->one();
        //return $this->render('index', ['model'=>$model]);
    }

   public function actionView($id)
    {
          return $this->render('view', [
            'model' => $this->findModel($id),			
        ]);
    }

	protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
