<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Photo */

$this->title = Yii::t('app', 'Update Photo: {name}', [
    'name' => $model->photo_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Photos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->photo_id, 'url' => ['view', 'id' => $model->photo_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="photos-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
