<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

/** @var \app\models\Product $product */
$product = $model->getProduct()->one();
$this->title = Yii::t('app', 'Update Feedback For Product: {name}', [
    'name' => $product->product_title,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feedback For Product: {name}', [
    'name' => $product->product_title]), [
            'product/view', 'id' => $product->product_id
]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="feedback-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
