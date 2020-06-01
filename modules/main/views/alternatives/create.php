<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Alternative */
/* @var $specificAlternativeModels app\modules\main\models\SpecificAlternative */

$this->title = Yii::t('app', 'ALTERNATIVE_PAGE_CREATE_ALTERNATIVE');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'ALTERNATIVE_PAGE_ALTERNATIVES'),
    'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="alternative-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'specificAlternativeModels' => $specificAlternativeModels,
    ]) ?>

</div>