<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\web\UploadedFile;

class Fileload extends Model
{
    /**
     * @var loadFile
     */
    public $loadFile;

	public $maxSize = 1024*1024*2;
	public $tooBig = 'Файл не должен превышать 2Мб';
	
    public function rules()
    {
        return [
            [['loadFile'], 'file', 'skipOnEmpty' => false, 'extensions' => ['pdf', 'doc', 'docx', 'txt',  'xls', 'xlsx'], 'maxSize' => $this->maxSize, 'tooBig' => $this->tooBig],
        ];
    }
    
    public function upload($dir, $name)
    {
        if ($this->validate()) {
            $this->loadFile->saveAs($dir . $name . '.' . $this->loadFile->extension);
			Yii::$app->session->setFlash('success', "Прайс-лист обновлен");
            return true;
        } else {
            return false;
        }
    }
}