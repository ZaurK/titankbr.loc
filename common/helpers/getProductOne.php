<?php
namespace common\helpers;

use backend\models\Product;
use yii\helpers\Url;
use yii\helpers\Html;

class getProductOne
{
public static function getProduct()
	{
		
		$query = Product::find()
		->where(['id'=>$_GET['id']])
        ->one();

				
			$ptitle = $query['ptitle'];
			$pimg = $query['img_path'];
            $price = $query['price'];				
            $pdescription = $query['pdescription'];				
			
			echo \Yii::$app->view->render('@app/views/product/productone.php', ['ptitle'=>$ptitle, 'pimg'=>$pimg, 'pdescription'=>$pdescription, 'id'=>$id, 'price'=>$price,  'pages' => $pages]);
					

 
	}
}
	
	
?>