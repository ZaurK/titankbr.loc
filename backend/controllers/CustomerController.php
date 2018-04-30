<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\Customer;
use backend\models\CustomerSearch;
use backend\models\UploadForm;
use yii\web\UploadedFile;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CustomerController implements the CRUD actions for Customer model.
 */
class CustomerController extends Controller
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
     * Lists all Customer models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new CustomerSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Customer model.
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
     * Creates a new Customer model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $model = new Customer();
		$uploadForm = new UploadForm();

        if ($model->load(Yii::$app->request->post())&& $uploadForm->load(Yii::$app->request->post()) ) {
            $isValid = $model->validate();
            $isValidf = $uploadForm->validate();
						
			if ($isValid) {
                //die('valid');				
				$uploadForm->imageFile = UploadedFile::getInstance($uploadForm, 'imageFile');
                $dir = Yii::getAlias('@uploads') . '/customers/';	
				
				if ($uploadForm->upload($dir, null, 'customer')) {
                    // file is uploaded successfully				
				    $model->cimg_path = $uploadForm->imageName;
				    $model->save(false);
					Yii::$app->session->setFlash('success', "Клиент успешно добавлен");
                    return $this->redirect(['view', 'id' => $model->id]);
                }else{
					// file is not uploaded
                   Yii::$app->session->setFlash('error', "Клиент не добавлен");
                    return $this->redirect(['view', 'id' => $model->id]);						 
				}
				
            }else{
				//print_r($_POST);
				die("no valid");
			}
        }

        return $this->render('create', [
            'model' => $model,
			'uploadForm' => $uploadForm,
        ]);
    }

    /**
     * Updates an existing Customer model.
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
					$current_image = $model->cimg_path;
					$dir = Yii::getAlias('@uploads') . '/customers/';
					$uploadForm->upload($dir, $current_image, 'customer');
				   
                   
                }else {
					//die('file is not');
				}
				Yii::$app->session->setFlash('success', "Клиент успешно обновлен");
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
     * Deletes an existing Customer model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
   public function actionDelete($id)
    {
        $model = $this->findModel($id);
        $current_image = $model->cimg_path;
		//удаляем файл, если он есть
		$dir = Yii::getAlias('@uploads') . '/customers/';	
        if(isset($current_image) && file_exists($dir .$current_image)) { 
            unlink($dir .$current_image);
        }
        $this->findModel($id)->delete();
        Yii::$app->session->setFlash('success', "Клиент успешно удален");
        return $this->redirect(['index']);
    }

    /**
     * Finds the Customer model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Customer the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Customer::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
