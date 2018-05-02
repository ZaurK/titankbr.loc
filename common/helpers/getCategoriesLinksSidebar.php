<?php
namespace common\helpers;

use backend\models\Category;
use yii\helpers\Url;
use common\helpers\getTranslit;

class getCategoriesLinksSidebar
{
public static function getLinks()
	{
		$rows = Category::find()->all();
		
		echo "<ul class='category_list'>";
	    foreach($rows as $rw){
			echo "<li><a href='";
			echo Url::toRoute(['category/view', 'id' => $rw['id'], 'slug'=>getTranslit::translit($rw['ctitle'])]);
			echo "'>";
			echo $rw['ctitle'];
			echo "</a></li>";
	
	    }
		echo "</ul>";
	
	
	}
}
	
	
?>