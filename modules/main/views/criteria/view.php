<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Criteria */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'CRITERIA_PAGE_CRITERIAS'),
    'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="criteria-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'BUTTON_UPDATE'), ['update', 'id' => $model->id],
            ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('app', 'BUTTON_DELETE'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'CRITERIA_PAGE_MODAL_FORM_TEXT'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'dd.MM.Y HH:mm:ss']
            ],
            [
                'attribute' => 'updated_at',
                'format' => ['date', 'dd.MM.Y HH:mm:ss']
            ],
            [
                'attribute'=>'task_id',
                'value' => $model->task->name,
            ],
            'name',
            'description:ntext',
        ],
    ]) ?>

</div>