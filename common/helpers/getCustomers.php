<?php
namespace common\helpers;

use backend\models\Customer;
use yii\helpers\Html;


class getCustomers
{
	
public static function getLinks()
	{
			$rows = Customer::find()->all();
			
			
		
	    foreach($rows as $row){
            $img = Html::img('@frontendWebroot/uploads/customers/' . $row['cimg_path'], ['class'=>'']);					
		
            echo $img;		

	    } 
	
	
	}
}


?>