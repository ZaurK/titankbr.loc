<?php

namespace backend\controllers;

use Yii;
use yii\filters\AccessControl;
use backend\models\Product;
use backend\models\UploadForm;
use yii\web\UploadedFile;
use backend\models\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use phpquery\phpquery\phpQuery;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ParsController extends Controller
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
error_reporting(E_ALL);
require_once 'pars/vendor/autoload.php';

function request( $url, $post = null ){
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
curl_setopt( $ch, CURLOPT_ENCODING, "UTF-8" );


			  
curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (Windows NT 6.2; WOW64)    AppleWebKit/537.36 (KHTML, like Gecko) Chrome/54.0.2840.99 Safari/537.36');
curl_setopt($ch, CURLOPT_COOKIEJAR, $_SERVER['DOCUMENT_ROOT'].'/tmp/cookie.txt');
  curl_setopt($ch, CURLOPT_COOKIEFILE, $_SERVER['DOCUMENT_ROOT'].'/tmp/cookie.txt');
//curl_setopt($ch, CURLOPT_POST, 1);
//curl_setopt($ch, CURLOPT_URL, $url);  
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
                  
                    ]);

curl_setopt($ch, CURLOPT_REFERER, 'http://www.google.com');

//curl_setopt($ch, CURLOPT_PROXY, '146.185.142.154:3128');
//curl_setopt($ch, CURLOPT_PROXYTYPE, CURLPROXY_HTTP);

if( $post ){
  curl_setopt( $ch, CURLOPT_POSTFIELDS, $post );
}


 if (($html = curl_exec($ch)) == false && $html == '')
  {
      echo 'Ошибка curl: ' . curl_error($ch);
  }

curl_close( $ch );
return $html;
}

//$pg_url = 'https://www.yandex.ru/';

$pg_urli[] = 'http://titankbr.ru/?page=production&mod=cat&parent=95&num=1';
$pg_urli[] = 'http://titankbr.ru/?page=production&mod=cat&parent=95&num=2';








//выполнение
function getData($pg_urli){
		$data = array();
foreach($pg_urli as $pg_url){
    $html = request($pg_url);
    $obj = \phpQuery::newDocument($html);  
    $links = $obj->find('.lirow');

    foreach($links as $link){
		$cat_id =17;
	$title = pq($link)->find('h2')->text();
	$text = pq($link)->find('.production_text')->text();
	$img = pq($link)->find('a:eq(1)')->attr('href');
	//$img = array_pop(explode("/", $img));
	$keys = parse_url($img); // parse the url
     $path = explode("/", $keys['path']); // splitting the path
     $last = end($path); // get the value of the last element 

loadModel($cat_id, $title, $text, $last);
    $data[] = ['title'=>$title, 'text'=>$text, 'img'=>$last];
    
    }
}
return $data;	
}


// конвертирование в формат json
function putJson($fl_pth, $data_link){
    file_put_contents($fl_pth, $data_link);	
}
function normJsonStr($str){
    return preg_replace_callback('/\\\\u([0-9a-f]{4})/i',
      function($val){
        return mb_decode_numericentity('&#'.intval($val[1], 16).';', array(0, 0xffff, 0, 0xffff), 'utf-8');
      }, $str 
    );
}

function loadModel($cat_id, $title, $text, $img){
	$model = new Product;
	$model->cat_id = $cat_id;
	$model->ptitle = $title;
	$model->pdescription = $text;
	$model->price = "Цена в соответствии с прайсом";
	$model->img_path = $img;
	//print_r($model);
	//exit();
	//if($model->load($model->cat_id, $model->ptitle, $model->pdescription, $model->price, $model->img_path)){
		$model->save(false);
	//}
	
}



$data = getData($pg_urli);
$fl_pth = Yii::getAlias('@uploads') . '/pars/data.json';
putJson($fl_pth, str_replace("\r\n",'', normJsonStr(json_encode($data, JSON_UNESCAPED_SLASHES))));

return $this->render('pars', ['data' => $data]);












	  
    }
	
	

   
}
