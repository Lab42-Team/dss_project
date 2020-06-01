<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\CriteriaValue */

$this->title = Yii::t('app', 'CRITERIA_VALUE_PAGE_CREATE_CRITERIA_VALUE');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CRITERIA_VALUE_PAGE_CRITERIA_VALUES'),
    'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="criteria-value-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>