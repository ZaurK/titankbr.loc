<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\Slider;
use backend\models\SliderSearch;
use backend\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SliderController implements the CRUD actions for Slider model.
 */
class SliderController extends Controller
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

    /**
     * Lists all Slider models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new SliderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Slider model.
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
     * Creates a new Slider model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Slider();
		$uploadForm = new UploadForm();

        if ($model->load(Yii::$app->request->post())&& $uploadForm->load(Yii::$app->request->post()) ) {
            $isValid = $model->validate();
            $isValidf = $uploadForm->validate();
						
			if ($isValid) {			
				$uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
                $dir = Yii::getAlias('@uploads') . '/slides/';					
				if ($uploadForm->upload($dir, null, 'slider')) {			
				    $model->simg_path = $uploadForm->imageName;
				    $model->save(false);
					Yii::$app->session->setFlash('success', "Слайд успешно добавлен");
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
					Yii::$app->session->setFlash('error', "Слайд не добавлен");
                    return $this->redirect(['view', 'id' => $model->id]);					 
				}
				
            }else{
				die("no valid");
			}
        }

        return $this->render('create', [
            'model' => $model,
			'uploadForm' => $uploadForm,
        ]);
    }

    /**
     * Updates an existing Slider model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
		$uploadForm = new UploadForm();
		
		

         if ($model->load(Yii::$app->request->post()) && $uploadForm->load(Yii::$app->request->post())) {
			 $isValid = $model->validate();
            $isValidf = $uploadForm->validate();
			
			if ($isValid) {  
                //die("valid");	
                $uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');			
                $model->save();
				if (!empty($uploadForm->imageFile)) {
					//die('file is');
					$current_image = $model->simg_path;
					$dir = Yii::getAlias('@uploads') . '/slides/';
					$uploadForm->upload($dir, $current_image, 'slider');
				   
                   
                }else {
					//die('file is not');
				}
				Yii::$app->session->setFlash('success', "Слайд успешно обновлен");
                return $this->redirect(['view', 'id' => $model->id]);				
				
				
            }else{
				die("no valid");
			}
	
        }

        return $this->render('update', [
            'model' => $model,
			'uploadForm' => $uploadForm,
        ]);
    }

    /**
     * Deletes an existing Slider model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $current_image = $model->simg_path;
		//удаляем файл, если он есть
		$dir = Yii::getAlias('@uploads') . '/slides/';	
        if(isset($current_image) && file_exists($dir .$current_image)) { 
            unlink($dir .$current_image);
        }
        $this->findModel($id)->delete();

		Yii::$app->session->setFlash('success', "Слайд успешно удален");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Slider model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Slider the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Slider::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
	
}
