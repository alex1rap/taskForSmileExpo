<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "feedbacks".
 *
 * @property int $feedback_id
 * @property string $create_date
 * @property string $feedback_author
 * @property string $feedback_email
 * @property string $feedback_text
 * @property int $product_id
 *
 * @property Products $product
 */
class Feedbacks extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'feedbacks';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['create_date'], 'safe'],
            [['feedback_author', 'feedback_email', 'product_id'], 'required'],
            [['feedback_text'], 'string'],
            [['product_id'], 'integer'],
            [['feedback_author'], 'string', 'max' => 16],
            [['feedback_email'], 'string', 'max' => 32],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Products::className(), 'targetAttribute' => ['product_id' => 'product_id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'feedback_id' => Yii::t('app', 'Feedback ID'),
            'create_date' => Yii::t('app', 'Create Date'),
            'feedback_author' => Yii::t('app', 'Feedback Author'),
            'feedback_email' => Yii::t('app', 'Feedback Email'),
            'feedback_text' => Yii::t('app', 'Feedback Text'),
            'product_id' => Yii::t('app', 'Product ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Products::className(), ['product_id' => 'product_id']);
    }
}
