<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Controller;
use backend\models\Fileload;
use yii\web\UploadedFile;

class FileloadController extends Controller
{
	 /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
		    'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'update', 'view', 'create', 'delete'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
					
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $model = new Fileload();
        $dir = Yii::getAlias('@uploads') . '/files/';
		$name = 'price_titankbr';
		
        if (Yii::$app->request->isPost) {
            $model->loadFile = UploadedFile::getInstance($model, 'loadFile');
            $this->deleteIfExists($dir);
			if ($model->upload($dir, $name)) {
                // file is uploaded successfully
                return $this->redirect(['fileload/index']);
            }
        }

        return $this->render('upload', ['model' => $model]);
    }
	
	private function deleteIfExists($dir)
	{
		$files = scandir($dir);
		$files = array_slice($files,2);
		//print_r($files); exit;
		foreach($files as $fl){
			unlink($dir . $fl);
		}
		
	}
	
	

}
