<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Task */

$this->title = Yii::t('app', 'TASK_PAGE_UPDATE_TASK') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'TASK_PAGE_TASKS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'TASK_PAGE_UPDATE_TASK');
?>

<div class="task-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>