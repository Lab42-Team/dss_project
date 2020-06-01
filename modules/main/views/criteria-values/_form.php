<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\main\models\Criteria;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\CriteriaValue */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="criteria-value-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'criteria_id')->dropDownList(Criteria::getAllCriteria()) ?>

    <?= $form->field($model, 'priority')->textInput() ?>

    <?= $form->field($model, 'value')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'BUTTON_SAVE'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>