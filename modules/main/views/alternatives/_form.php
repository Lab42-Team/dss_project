<?php

use app\modules\main\models\Criteria;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\modules\main\models\Task;
use wbraganca\dynamicform\DynamicFormWidget;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model app\modules\main\models\Alternative */
/* @var $specificAlternativeModels app\modules\main\models\SpecificAlternative */
?>

<script type="text/javascript">
    // Выполнение скрипта при загрузке страницы
    $(document).ready(function() {
        // Изменение номера у заголовков элементов
        let dynamicSpecificAlternativeFormWrapper = jQuery(".add_dynamic_specific_alternative_form_wrapper");
        dynamicSpecificAlternativeFormWrapper.on("afterInsert", function(e, item) {
            jQuery(".add_dynamic_specific_alternative_form_wrapper .panel-title-criteria").each(function(index) {
                jQuery(this).html("<?= Yii::t('app', 'ALTERNATIVE_PAGE_CRITERIA_NUMBER') ?>" +
                    (index + 1) + ":");
                $("#specificalternative-" + (index + 1) + "-alternative_id").val(0);
            });
        });
        dynamicSpecificAlternativeFormWrapper.on("afterDelete", function(e) {
            jQuery(".add_dynamic_specific_alternative_form_wrapper .panel-title-criteria").each(function(index) {
                jQuery(this).html("<?= Yii::t('app', 'ALTERNATIVE_PAGE_CRITERIA_NUMBER') ?>" +
                    (index + 1) + ":")
            });
        });
    });
</script>

<div class="alternative-form">

    <?php $form = ActiveForm::begin(['id' => 'alternative-creation-form']); ?>

        <?= $form->field($model, 'task_id')->dropDownList(Task::getAllTasks()) ?>

        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

        <?php DynamicFormWidget::begin([
            'widgetContainer' => 'add_dynamic_specific_alternative_form_wrapper', // only alphanumeric characters plus "_" [A-Za-z0-9_]
            'widgetBody' => '.container-items', // css class selector
            'widgetItem' => '.item', // css class
            'limit' => 99, // the maximum times, an element can be cloned (default 999)
            'min' => 1, // 0 or 1 (default 1)
            'insertButton' => '.add-item', // css class
            'deleteButton' => '.remove-item', // css class
            'model' => $specificAlternativeModels[0],
            'formId' => 'alternative-creation-form',
            'formFields' => [
                'alternative_id',
                'criteria_id'
            ],
        ]); ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-envelope"></i>
                <b><?= Yii::t('app', 'ALTERNATIVE_PAGE_CRITERIA_LIST') ?></b>
                <button type="button" class="pull-right add-item btn btn-success btn-xs" id="add-new-criteria">
                    <i class="glyphicon glyphicon-plus"></i>
                    <?= Yii::t('app', 'ALTERNATIVE_PAGE_ADD_CRITERIA') ?>
                </button>
                <div class="clearfix"></div>
            </div>
            <div class="panel-body container-items"><!-- widgetContainer -->
                <?php foreach ($specificAlternativeModels as $index => $specificAlternativeModel): ?>
                    <div class="item panel panel-default"><!-- widgetBody -->
                        <div class="panel-heading">
                            <span class="panel-title-criteria">
                                <?= Yii::t('app', 'ALTERNATIVE_PAGE_CRITERIA_NUMBER') .
                                    ($index + 1) ?>:
                            </span>
                            <button type="button" class="pull-right remove-item btn btn-danger btn-xs">
                                <i class="glyphicon glyphicon-minus"></i>
                            </button>
                            <div class="clearfix"></div>
                        </div>
                        <div class="panel-body">
                            <div class="specific-alternative-alternative_id">
                                <?= $form->field($specificAlternativeModel, "[{$index}]alternative_id")
                                    ->hiddenInput(['maxlength' => true, 'value' => 0])
                                    ->label(false) ?>
                            </div>
                            <div class="specific-alternative-criteria_id">
                                <?= $form->field($specificAlternativeModel, "[{$index}]criteria_id")
                                    ->dropDownList(Criteria::getAllCriteria()) ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php DynamicFormWidget::end(); ?>

        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'BUTTON_SAVE'), ['class' => 'btn btn-success']) ?>
        </div>

    <?php ActiveForm::end(); ?>

</div>