<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\CriteriaValue */

$this->title = Yii::t('app', 'CRITERIA_VALUE_PAGE_UPDATE_CRITERIA_VALUE') . ': ' . $model->value;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CRITERIA_VALUE_PAGE_CRITERIA_VALUES'),
    'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => $model->value, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'CRITERIA_VALUE_PAGE_UPDATE_CRITERIA_VALUE');
?>

<div class="criteria-value-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>