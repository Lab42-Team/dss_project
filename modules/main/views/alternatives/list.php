<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'ALTERNATIVE_PAGE_ALTERNATIVES');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="alternative-list">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'ALTERNATIVE_PAGE_CREATE_ALTERNATIVE'), ['create'],
            ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'name',
            [
                'attribute'=>'task_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->task->name;
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>