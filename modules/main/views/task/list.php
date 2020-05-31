<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'TASK_PAGE_TASKS');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="task-list">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'TASK_PAGE_CREATE_TASK'), ['create'],
            ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            'description:ntext',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>