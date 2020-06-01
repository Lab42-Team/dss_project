<?php

/* @var $specificAlternative app\modules\main\models\SpecificAlternative */

use yii\widgets\DetailView; ?>

<div class="row">
    <div class="col-md-12">
        <?= DetailView::widget([
            'model' => $specificAlternative,
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
                    'attribute' => 'criteria_id',
                    'label' => Yii::t('app', 'CRITERIA_MODEL_NAME'),
                    'value' => $specificAlternative->criteria->name,
                ],
                [
                    'attribute' => 'criteria_id',
                    'label' => Yii::t('app', 'CRITERIA_MODEL_DESCRIPTION'),
                    'value' => $specificAlternative->criteria->description,
                ],
            ],
        ]) ?>
    </div>
</div>