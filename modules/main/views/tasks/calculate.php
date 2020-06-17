<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\main\models\Task */
/* @var $rankedAlternatives app\modules\main\controllers\TasksController */

$this->title = Yii::t('app', 'TASK_PAGE_SOLVE_TASK') . ': ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'TASK_PAGE_TASKS'), 'url' => ['list']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="task-view">

    <h1><?= Yii::t('app', 'TASK_PAGE_SOLVE_TASK') . ': ' . $model->name ?></h1>

    <div class="row">
        <div class="col-md-12">
            <?php
            echo '<pre><b>Ранги для альтернатив:</b>' . PHP_EOL;
            if ($rankedAlternatives != null)
                foreach ($rankedAlternatives as $key => $rankedAlternative)
                    echo 'Институт ' . ($key + 1) . ': ' . $rankedAlternative . PHP_EOL;
            echo '</pre>';
            ?>
        </div>
    </div>

</div>