<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Alternative */
/* @var $specificAlternativeModels app\modules\main\models\SpecificAlternative */

$this->title = Yii::t('app', 'ALTERNATIVE_PAGE_UPDATE_ALTERNATIVE') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ALTERNATIVE_PAGE_ALTERNATIVES'),
    'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'ALTERNATIVE_PAGE_UPDATE_ALTERNATIVE');
?>

<div class="alternative-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'specificAlternativeModels' => $specificAlternativeModels,
    ]) ?>

</div>