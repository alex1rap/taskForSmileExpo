<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Feedback */

$this->title = Yii::t('app', 'Update Feedback: {name}', [
    'name' => $model->feedback_id,
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Feedbacks'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->feedback_id, 'url' => ['view', 'id' => $model->feedback_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="feedback-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
