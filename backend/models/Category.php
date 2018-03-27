<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property string $ctitle
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['ctitle'], 'required'],
            [['ctitle'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'ctitle' => 'Название категории',
        ];
    }
	
	/**
    * @return \yii\db\ActiveQuery
    */
    public function getProduct()
    {
        return $this->hasMany(Product::className(), ['cat_id' => 'id']);
    }
}
