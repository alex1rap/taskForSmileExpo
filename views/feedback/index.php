<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchFeedback */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Feedbacks');
$product = null;
if ($product = $searchModel->getProduct()->one()) {
    $this->title = Yii::t('app', 'Feedbacks For Product: {name}', [
        'name' => $product->product_title
    ]);
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="feedback-index">

    <h1><?= $product === null ?
            Yii::t('app', 'Feedbacks') :
            Yii::t('app', 'Feedbacks For Product: {name}', [
                'name' => Html::a($product->product_title, [
                    'product/view',
                    'id' => $product->product_id
                ])
            ]) ?></h1>

    <p>
        <?= Html::a(
            Yii::t('app', 'Create Feedback'),
            ['create'],
            ['class' => 'btn btn-success']
        ) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'feedback_id',
            'create_date',
            'feedback_author',
            'feedback_email:email',
            'feedback_text:text',
            //'product_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
