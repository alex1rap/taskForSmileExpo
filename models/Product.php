<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "products".
 *
 * @property int $product_id
 * @property string $product_title
 * @property string $product_description
 * @property double $product_price
 * @property int $category_id
 *
 * @property Feedback[] $feedbacks
 * @property Photo[] $photos
 * @property Category $category
 */
class Product extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'products';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_title', 'category_id'], 'required'],
            [['product_description'], 'string'],
            [['product_price'], 'number'],
            [['category_id'], 'integer'],
            [['product_title'], 'string', 'max' => 32],
            [['product_title'], 'unique'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'category_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'product_id' => Yii::t('app', 'Product ID'),
            'product_title' => Yii::t('app', 'Product Title'),
            'product_description' => Yii::t('app', 'Product Description'),
            'product_price' => Yii::t('app', 'Product Price'),
            'category_id' => Yii::t('app', 'Category ID'),
            'product_photos' => Yii::t('app', 'Photos'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getFeedbacks()
    {
        return $this->hasMany(Feedback::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPhotos()
    {
        return $this->hasMany(Photo::className(), ['product_id' => 'product_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'category_id']);
    }
}
