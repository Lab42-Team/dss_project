<?php

namespace app\modules\main\controllers;

use Yii;
use app\modules\main\models\CriteriaValue;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * CriteriaValuesController implements the CRUD actions for CriteriaValue model.
 */
class CriteriaValuesController extends Controller
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
     * Lists all CriteriaValue models.
     * @return mixed
     */
    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => CriteriaValue::find(),
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single CriteriaValue model.
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
     * Creates a new CriteriaValue model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new CriteriaValue();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            // Вывод сообщения об удачном создании
            Yii::$app->getSession()->setFlash('success',
                Yii::t('app', 'CRITERIA_VALUE_PAGE_MESSAGE_CREATE_CRITERIA_VALUE'));

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing CriteriaValue model.
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
                Yii::t('app', 'CRITERIA_VALUE_PAGE_MESSAGE_UPDATED_CRITERIA_VALUE'));

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing CriteriaValue model.
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
            Yii::t('app', 'CRITERIA_VALUE_PAGE_MESSAGE_DELETED_CRITERIA_VALUE'));

        return $this->redirect(['list']);
    }

    /**
     * Finds the CriteriaValue model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return CriteriaValue the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = CriteriaValue::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'ERROR_MESSAGE_PAGE_NOT_EXIST'));
    }
}