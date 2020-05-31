<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Criteria */

$this->title = Yii::t('app', 'CRITERIA_PAGE_CREATE_CRITERIA');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CRITERIA_PAGE_CRITERIAS'),
    'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="criteria-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>