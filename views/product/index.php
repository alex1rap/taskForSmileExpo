<?php

use app\models\Photo;
use yii\helpers\Html;
use yii\helpers\Url;

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
        <div class="row">
            <?php
            $products = $dataProvider->getModels();
            foreach ($products

                     as $product) :
                /** @var Photo[] $photos */
                $photos = $product->getPhotos()->all();
                if (empty($photos)) {
                    $photosSrc = Url::to('@web/images/no_photo.png');
                } else {
                    $photosSrc = $photos[0]->photo_src;
                }
                ?>
                <div class="card col-xs-12 col-sm-6 col-md-4 col-lg-3"
                     style="background-color: #cfcfcf;
                     min-height: 240px;
                     margin: 5px;">
                    <div class="card-title"><?= $product->product_title ?></div><!--
                    -->
                    <div class="card-body">
                        <?= Html::img($photosSrc, [
                            'style' => 'max-width: 100%; max-height: 150px; margin: auto;'
                        ]) ?>
                    </div><!--
                    -->
                    <div class="card-footer success">
                        <?= $product->product_price.' '.Yii::t('app', 'UAH') ?>.
                        <?= Html::a(Yii::t('app', 'Details'), [
                            'product/view',
                            'id' => $product->product_id
                        ], [
                            'class' => 'btn bnt-primary'
                        ]) ?><!--
                --></div>
                </div>

            <?php
            endforeach;
            ?>
        </div>
    </div>
</div>
