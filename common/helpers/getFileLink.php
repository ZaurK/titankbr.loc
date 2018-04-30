<?php
namespace common\helpers;

use Yii;
use yii\helpers\Html;

class getFilelink
{
	
public static function getLink()
	{
		$dir = Yii::getAlias('@uploads') . '/files/';
		$files = scandir($dir);
		return $files[2];
	}
}


?>