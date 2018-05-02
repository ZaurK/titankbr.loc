<?php
namespace common\helpers;

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
			$slink = $rw['slink'];
			
			echo \Yii::$app->view->render('@app/views/site/slider.php', ['stext'=>$stext, 'img'=>$simg, 'slink'=>$slink]);		
	    } 
	
	
	}
}


?>

 <?php 
				 
				  ?>