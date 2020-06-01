<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Task */

$this->title = Yii::t('app', 'TASK_PAGE_CREATE_TASK');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'TASK_PAGE_TASKS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="task-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>