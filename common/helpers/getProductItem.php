<?php
namespace common\helpers;

use backend\models\Product;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\data\Pagination;
use yii\widgets\LinkPager;	

class getProductItem
{
public static function getLinks()
	{
		
		$query = Product::find()->where(['cat_id'=>$_GET['id']]);

		$countQuery = clone $query;
		$pages = new Pagination(['totalCount' => $countQuery->count(), 'pageSize' => 12]);
		$pages->pageSizeParam = false;
        $models = $query->offset($pages->offset)
        ->limit($pages->limit)
        ->all();
				
	    foreach($models as $row){			
          
			$ptitle = $row['ptitle'];
            $pimg = $row['img_path'];
            $price = $row['price'];	
            $id = $row['id'];			
			
			echo \Yii::$app->view->render('@app/views/product/productlink.php', ['ptitle'=>$ptitle, 'pimg'=>$pimg, 'id'=>$id, 'price'=>$price,  'pages' => $pages]);
					
	    }
	echo "<div class='clearfix'></div>";
	
	echo ' <div class="row">
                <div class="col-md-12">
                    <div class="product-pagination text-center">
                        <nav>';
	echo LinkPager::widget([
    'pagination' => $pages,
    ]);

    echo '               </nav>                        
                    </div>
                </div>
            </div>';

 
	}
}
	
	
?>