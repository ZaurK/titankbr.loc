<?php

namespace frontend\controllers;

use frontend\models\Category;

class CategoryController extends \yii\web\Controller
{
	
	public $layout = 'category';
	
    public function actionIndex()
    {
		$model = Category::find()->where(['id'=>$_GET['id']])->one();
        return $this->render('index', ['model'=>$model]);
    }
	
	 /**
     * Displays a single Category model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {		
        return $this->render('view', [
            'model' => $this->findModel($id),			
        ]);
    }
	
	 /**
     * Finds the Category model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Category the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Category::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

}
