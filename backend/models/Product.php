<?php

namespace backend\models;

use Yii;
use backend\models\Category;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $cat_id
 * @property string $ptitle
 * @property string $pdescription
 * @property string $img_path
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat_id', 'ptitle'], 'required'],
            [['cat_id'], 'integer'],
            [['pdescription'], 'string'],
            [['ptitle', 'img_path', 'price'], 'string', 'max' => 256],
			[['cat_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['cat_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Категория',
            'ptitle' => 'Название продукции',
            'pdescription' => 'Описание продукции',
			'price' =>'Цена',
            'img_path' => 'Фото',
        ];
    }
	
	/**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'cat_id']);
    }

    public function getCatName()
    {
        // Выбираем 
    $cattitle = Category::find()
        ->select(['id', 'ctitle'])
		->where(['id' => $this->cat_id])
        ->one();

    return $cattitle ? $cattitle->ctitle : 'Категория не указана';
    }
	
	public static function getCatsList()
{
    // Выбираем 
    $parents = Category::find()
        ->select(['id', 'ctitle'])
        ->all();
 
    return ArrayHelper::map($parents, 'id', 'ctitle');
}
}
