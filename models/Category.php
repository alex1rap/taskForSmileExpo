<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "categories".
 *
 * @property int $category_id
 * @property string $category_title
 * @property string $category_description
 * @property int $parent_id
 *
 * @property Product[] $products
 */
class Category extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_title'], 'required'],
            [['category_description'], 'string'],
            [['parent_id'], 'integer'],
            [['category_title'], 'string', 'max' => 32],
            [['category_title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'category_id' => Yii::t('app', 'Category ID'),
            'category_title' => Yii::t('app', 'Category Title'),
            'category_description' => Yii::t('app', 'Category Description'),
            'parent_id' => Yii::t('app', 'Parent ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['category_id' => 'category_id']);
    }

    public function getParentCategory()
    {
        return $this->hasOne(Category::className(), ['category_id' => 'parent_id']);
    }
}
