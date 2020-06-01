<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'CRITERIA_VALUE_PAGE_CRITERIA_VALUES');
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="criteria-value-list">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'CRITERIA_VALUE_PAGE_CREATE_CRITERIA_VALUE'), ['create'],
            ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            [
                'attribute'=>'criteria_id',
                'format' => 'raw',
                'value' => function($data) {
                    return $data->criteria->name;
                }
            ],
            'value:ntext',
            'priority',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>