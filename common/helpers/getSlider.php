<?php
namespace common\helpers;

use yii\helpers\Url;
use backend\models\Slider;

class getSlider
{
	
public static function getSlides()
	{
		$rows = Slider::find()->all();			 		
	    foreach($rows as $rw){
            $simg = $rw['simg_path'];			
			$stext = $rw['stext'];
			$stext = explode("\r" , $stext);
			
			echo \Yii::$app->view->render('@app/views/site/slider.php', ['stext'=>$stext, 'img'=>$simg]);		
	    } 
	
	
	}
}


?>

 <?php 
				 
				  ?>