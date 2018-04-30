<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string $stext
 * @property string $simg_path
 * @property string $slink
 */
class Slider extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['stext', 'stitle'], 'string'],
			[['stitle'], 'required'],
            [['simg_path', 'slink'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
			'stitle' => 'Название слайда',
            'stext' => 'Текст на слайде',
            'simg_path' => 'Simg Path',
            'slink' => 'Ссылка',
        ];
    }
}
