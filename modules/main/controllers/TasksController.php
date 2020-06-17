<?php

namespace app\modules\main\controllers;

use Yii;
use app\modules\main\models\Task;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\components\Solver;

/**
 * TasksController implements the CRUD actions for Task model.
 */
class TasksController extends Controller
{
    public $layout = 'main';

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Task models.
     * @return mixed
     */
    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Task::find(),
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Task model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Task model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Task();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Вывод сообщения об удачном создании
            Yii::$app->getSession()->setFlash('success',
                Yii::t('app', 'TASK_PAGE_MESSAGE_CREATE_TASK'));

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Task model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Вывод сообщения об удачном обновлении
            Yii::$app->getSession()->setFlash('success',
                Yii::t('app', 'TASK_PAGE_MESSAGE_UPDATED_TASK'));

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Task model.
     * If deletion is successful, the browser will be redirected to the 'list' page.
     * @param integer $id
     * @return \yii\web\Response
     * @throws \Throwable
     * @throws \yii\db\StaleObjectException
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        // Вывод сообщения об успешном удалении
        Yii::$app->getSession()->setFlash('success',
            Yii::t('app', 'TASK_PAGE_MESSAGE_DELETED_TASK'));

        return $this->redirect(['list']);
    }

    /**
     * @param $id
     * @return string
     * @throws NotFoundHttpException
     */
    public function actionCalculate($id)
    {
        // Поиск задачи по id
        $model = $this->findModel($id);
        // Формирование исходного массива альтернатив
        $sourceAlternatives = [
            [[2,1,0], [3,0,0], [3,0,0], [1,1,1], [1,2,0], [2,1,0], [3,0,0], [2,1], [3,0], [3,0], [3,0,0]],
            [[3,0,0], [2,1,0], [2,1,0], [1,2,0], [2,1,0], [3,0,0], [2,1,0], [3,0], [2,1], [2,1], [3,0,0]],
            [[2,1,0], [2,1,0], [2,1,0], [2,1,0], [3,0,0], [2,1,0], [2,0,1], [3,0], [3,0], [3,0], [2,1,0]],
            [[2,1,0], [1,2,0], [2,1,0], [1,2,0], [2,1,0], [2,1,0], [2,1,0], [1,2], [3,0], [3,0], [2,1,0]],
            [[2,1,0], [2,1,0], [3,0,0], [2,1,0], [2,0,1], [2,0,1], [2,1,0], [3,0], [2,1], [3,0], [3,0,0]],
            [[2,1,0], [1,2,0], [2,1,0], [0,3,0], [1,2,0], [3,0,0], [2,1,0], [3,0], [3,0], [2,1], [2,1,0]],
            [[2,1,0], [2,1,0], [2,1,0], [2,1,0], [2,1,0], [1,1,1], [2,1,0], [1,2], [2,1], [1,2], [2,0,1]],
            [[3,0,0], [3,0,0], [2,1,0], [1,1,1], [1,0,2], [3,0,0], [3,0,0], [1,2], [3,0], [3,0], [2,1,0]],
            [[2,1,0], [2,1,0], [1,1,1], [0,2,1], [0,2,1], [2,0,1], [1,1,1], [1,2], [2,1], [2,1], [1,1,1]],
            [[1,2,0], [1,1,1], [2,0,1], [2,0,1], [2,1,0], [2,0,1], [2,0,1], [2,1], [2,1], [2,1], [2,0,1]]
        ];
        // Ранжирование массива альтернатив
        $solver = new Solver();
        $rankedAlternatives = $solver->getRanksByAramis($sourceAlternatives);
        // Вывод сообщения об успешном решении задачи
        Yii::$app->getSession()->setFlash('success',
            Yii::t('app', 'TASK_PAGE_MESSAGE_SOLVED_TASK'));

        return $this->render('calculate', [
            'model' => $model,
            'rankedAlternatives' => $rankedAlternatives
        ]);
    }

    /**
     * Finds the Task model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Task the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Task::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'ERROR_MESSAGE_PAGE_NOT_EXIST'));
    }
}