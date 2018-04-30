<?php
namespace common\helpers;

use backend\models\Category;
use backend\models\Product;
use yii\helpers\Html;


class getCategories
{
	
public static function getLinks()
	{
			$rows = Category::find()
			->asArray()
			->joinWith('product')
			//->orderBy('product.cat_id, category.id')
			->all();
			
			
			//echo "<pre>";
		    //print_r($rows);
			
		
	    foreach($rows as $row){
			$ctitle = $row['ctitle'];
            $img = Html::img('@frontendWebroot/uploads/images/' . $row['product'][0]['img_path'], ['class'=>'']);			
            $id = $row['id'];			
		
            echo \Yii::$app->view->render('@app/views/site/categorylink.php', ['ctitle'=>$ctitle, 'img'=>$img,  'id'=>$id]);		
			//echo $row['ctitle'];
			//echo $row['product'][0]['img_path'];
	    } 
	
	
	}
}


?>