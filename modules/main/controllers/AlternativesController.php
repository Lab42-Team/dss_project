<?php

namespace app\modules\main\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\modules\main\models\Alternative;
use app\modules\main\models\SpecificAlternative;

/**
 * AlternativesController implements the CRUD actions for Alternative model.
 */
class AlternativesController extends Controller
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
     * Lists all Alternative models.
     * @return mixed
     */
    public function actionList()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Alternative::find(),
        ]);

        return $this->render('list', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Alternative model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        // Нахождение альтернативы по id
        $model = $this->findModel($id);
        // Выборка определенных альтернатив по внешнему ключу альтернативы
        $specificAlternatives = SpecificAlternative::find()->where(array('alternative_id' => $model->id))->all();

        return $this->render('view', [
            'model' => $model,
            'specificAlternatives' => $specificAlternatives,
        ]);
    }

    /**
     * Creates a new Alternative model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     * @throws \yii\db\Exception
     */
    public function actionCreate()
    {
        // Создание модели альтернативы
        $model = new Alternative();
        // Создание массива с моделями определенных альтернатив
        $specificAlternativeModels = [new SpecificAlternative()];
        // Массовая загрузка данных в модели
        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            // Обновление значений "alternative_id" в массиве request
            for ($i = 1; $i <= 100; $i++)
                if (isset(Yii::$app->request->post('SpecificAlternative')[$i]))
                    Yii::$app->request->post('SpecificAlternative')[$i]['alternative_id'] = $model->id;
            // Сохранение связанных моделей SpecificAlternative
            if ($model->saveAll())
                // Вывод сообщения об удачном создании
                Yii::$app->getSession()->setFlash('success',
                    Yii::t('app', 'ALTERNATIVE_PAGE_MESSAGE_CREATE_ALTERNATIVE'));

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            'specificAlternativeModels' => $specificAlternativeModels,
        ]);
    }

    /**
     * Updates an existing Alternative model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param $id
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException
     * @throws \yii\db\Exception
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        // Формирование массива с моделями определенных альтернатив
        $specificAlternativeModels = SpecificAlternative::find()->where(array('alternative_id' => $model->id))->all();
        // Массовая загрузка данных в модели
        if ($model->loadAll(Yii::$app->request->post()) && $model->save()) {
            // Обновление значений "alternative_id" в массиве request
            for ($i = 1; $i <= 100; $i++)
                if (isset(Yii::$app->request->post('SpecificAlternative')[$i]))
                    Yii::$app->request->post('SpecificAlternative')[$i]['alternative_id'] = $model->id;
            // Сохранение связанных моделей SpecificAlternative
            if ($model->saveAll())
                // Вывод сообщения об удачном обновлении
                Yii::$app->getSession()->setFlash('success',
                    Yii::t('app', 'ALTERNATIVE_PAGE_MESSAGE_UPDATED_ALTERNATIVE'));

            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
            'specificAlternativeModels' => $specificAlternativeModels,
        ]);
    }

    /**
     * Deletes an existing Alternative model.
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
            Yii::t('app', 'ALTERNATIVE_PAGE_MESSAGE_DELETED_ALTERNATIVE'));

        return $this->redirect(['list']);
    }

    /**
     * Finds the Alternative model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Alternative the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Alternative::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'ERROR_MESSAGE_PAGE_NOT_EXIST'));
    }
}