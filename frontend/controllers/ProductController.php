<?php

namespace frontend\controllers;

class ProductController extends \yii\web\Controller
{
	public $layout = 'product';
	
    public function actionView()
    {
        return $this->render('view');
    }

}
