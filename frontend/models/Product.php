<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "product".
 *
 * @property int $id
 * @property int $cat_id
 * @property string $ptitle
 * @property string $pdescription
 * @property string $price
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
            [['cat_id', 'ptitle', 'pdescription'], 'required'],
            [['cat_id'], 'integer'],
            [['pdescription'], 'string'],
            [['ptitle', 'price', 'img_path'], 'string', 'max' => 256],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat_id' => 'Cat ID',
            'ptitle' => 'Ptitle',
            'pdescription' => 'Pdescription',
            'price' => 'Price',
            'img_path' => 'Img Path',
        ];
    }
}
