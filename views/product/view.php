<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Products */

$this->title = $model->product_title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);

$photos = $model->getPhotos()->all();
$photosHtml = "";
foreach ($photos as $photo) {
    $photosHtml .= Html::img($photo->photo_src, [
            'style' => 'max-width:240px;max-height:240px;'
    ]);
}
?>
<div class="products-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->product_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'product_id',
            [
                    'attribute' => 'product_photos',
                'value' => $photosHtml,
                'format' => 'html'
            ],
            'product_title',
            'product_description:ntext',
            'product_price',
            'category_id',
        ],
    ]) ?>

</div>