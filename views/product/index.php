<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\SearchProduct */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Products');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="products-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Product'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <div class="container">
    <?php
    $products = $dataProvider->getModels();
    foreach ($products as $product) :
    ?>
    <div class="row">
        <?= Html::a($product->product_title, ['product/view', 'product_id' => $product->product_id]) ?>
    </div>

    <?php
    endforeach;
    ?>
</div>
</div>
