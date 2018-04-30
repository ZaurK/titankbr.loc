<?php
namespace common\helpers;

use backend\models\Product;
use yii\helpers\Url;
use yii\helpers\Html;

class getProductOne
{
public static function getProduct($model)
	{
		
			$ptitle = $model->ptitle;
			$pimg = $model->img_path;
            $price = $model->price;				
            $pdescription = $model->pdescription;				
			
			echo \Yii::$app->view->render('@app/views/product/productone.php', ['ptitle'=>$ptitle, 'pimg'=>$pimg, 'pdescription'=>$pdescription, 'id'=>$id, 'price'=>$price,  'pages' => $pages]);
					

 
	}
}
	
	
?>