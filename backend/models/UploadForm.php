<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;
use yii\imagine\Image;
use Imagine\Gd;
use Imagine\Image\Box;
use Imagine\Image\BoxInterface;
use Imagine\Image\Point;
use Imagine\Filter\Basic\Autorotate;
use Imagine\Image\Metadata\ExifMetadataReader;

class UploadForm extends Model
{
    /**
     * @var UploadedFile
     */
    public $imageFile;
	public $imageName;
	
	public $maxSize = 1024*1024*1;
	public $tooBig = 'Файл не должен превышать 1Мб';

	
    public function rules()
    {
        return [
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg', 'maxSize' => $this->maxSize, 'tooBig' => $this->tooBig],
        ];
    }
	
	
    
    public function upload($dir, $current_image, $thumb)
    {
        if ($this->validate()) {	
            	//exit(print_r($this->imageFile));
                if($this->imageFile!==null){				
			    $this->imageName = ($current_image!==NULL) ? $current_image : rand(1000,100000). '.' . $this->imageFile->extension;	
               
                //rotate
				//saving
	            $this->imageFile->saveAs($dir . $this->imageName);
				
			    //saving thumbnail
				if($thumb == 'product'){
			        $this->formingThumb($dir);
				}elseif($thumb == 'slider'){
					$this->formingSlide($dir);
				}elseif($thumb == 'customer'){
					$this->formingCustomer($dir);
				}					
                return true;				
			}else{
				return false;
				}
			         
				
            
        } else {
            return false;
        }
    }
	
	//Saving thumbnail
	public function formingThumb($dir)
	{
		$dirto = $dir . '/thumbs/';
			$sourceImage = Image::getImagine()->open($dir . $this->imageName);
			$sourceImageSize = $sourceImage->getSize();
			$origWidth = $sourceImageSize->getWidth();
			$origHeight = $sourceImageSize->getHeight();
			$needWidth = 212;
			$needHeight = 264;
			
			$ratio = $origWidth/$needWidth;
			$size = new Box($needWidth, $origHeight/$ratio);
			if($origWidth > $origHeight){ 
			    //$x = $origWidth/5;
			    $point = new Point(0, 0);
			    }else {
			        $point = new Point(0, 0);
					}
                    $sourceImage
					    ->resize($size)
					    //->crop($point, $size)
			            ->save($dirto . $this->imageName, ['quality' => 90]);
	}
	
	//Saving thumbnail
	public function formingSlide($dir)
	{
		$dirto = $dir;
			$sourceImage = Image::getImagine()->open($dir . $this->imageName);
			$sourceImageSize = $sourceImage->getSize();
			$origWidth = $sourceImageSize->getWidth();
			$origHeight = $sourceImageSize->getHeight();
			$needWidth = 1163;
			$needHeight = 365;
			
			
			$size = new Box($needWidth, $needHeight);
            $sourceImage
			->resize($size)
			->save($dirto . $this->imageName, ['quality' => 90]);
	}
	
	//Saving castomer
	public function formingCustomer($dir)
	{
		$dirto = $dir;
			$sourceImage = Image::getImagine()->open($dir . $this->imageName);
			$sourceImageSize = $sourceImage->getSize();
			$origWidth = $sourceImageSize->getWidth();
			$origHeight = $sourceImageSize->getHeight();
			$origRatio = $origWidth/$origHeight;
			
			$needWidth = 270;
			$needHeight = 120;
			$needRatio = $needWidth/$needHeight;
			
			if($origRatio <= $needRatio){ //вытянутее по-вертикали, чем образец				
				$newWidth = $origWidth;
				$newHeight = $newWidth/$needRatio;
				$y = $origHeight/2-$newHeight/2;
				$point = new Point(0, $y);
				
				
			}else{//вытянутее по-горизонтали, чем образец
				$newHeight = $origHeight;
				$newWidth = $newHeight*$needRatio;
				$x = $origWidth/2-$newWidth/2;
				$point = new Point($x, 0);
				
			}
			$size = new Box($newWidth, $newHeight);
				$sourceImage->crop($point, $size)
				            ->save($dirto . $this->imageName, ['quality' => 90]);
			
			
	}
	
	
	
}
?>