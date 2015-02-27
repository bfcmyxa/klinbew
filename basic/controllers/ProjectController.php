<?php

namespace app\controllers;

use Yii;
use app\models\Project;
use app\models\ProjectSearch;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * ProjectController implements the CRUD actions for Project model.
 */
class ProjectController extends Controller
{
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Project models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProjectSearch();
       // $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $dataProvider = $searchModel->search([$searchModel->formName() =>['createdBy' => Yii::$app->user->id]]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Project model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Project model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     *
     * NEW: if created - the user will be added. But the user HAS TO BE IN THE DATABASE
     */
    public function actionCreate()
    {
        $model = new Project();
        $model->status = 'New Project';
        $model->createdBy = Yii::$app->user->id;
        if ($model->load(Yii::$app->request->post())&& $model->save()) {
//            return $this->redirect(['view', 'id' => $model->projectid]);
            return $this->redirect(['description', 'id' => $model->projectid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Project model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->status = 'Project Updated';

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['description', 'id' => $model->projectid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Project model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    public function actionDescription($id)
    {
        $model = $this->findModel($id);


        if ($model->load(Yii::$app->request->post())) {
            $model->status = 'Description Updated';
            if ($model->save()) {
                return $this->redirect(['reference/index', 'id' => $id]);
            }
        } else {
            return $this->render('description', [
                'model' => $model,
            ]);
        }
    }




    /**
     * Finds the Project model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Project the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Project::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionTest() {

        $searchModel = new ProjectSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $testvar = Yii::$app->user->id;
        echo $testvar;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    public function actionSummary($id) {

        $model = $this->findModel($id);
        $sql = 'SELECT source.title, rating.ratingSummary FROM source, rating, project, sourceProject
                WHERE sourceProject.ratingId = rating.ratingId AND sourceProject.sourceId = source.sourceId
                AND sourceProject.projectId = ' . $model->projectid . '
                GROUP BY source.title';
        $dataProvider = new SqlDataProvider(['sql' => $sql]);


        if ($model->load(Yii::$app->request->post())) {
            $model->status = 'Summary Updated';
            if ($model->save()) {
                return $this->redirect(['export', 'id' => $id]);
            }
        } else {
            return $this->render('summary', [
                'model' => $model,
                'dataProvider' => $dataProvider
            ]);
        }
    }

    public function actionExport($id) {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {
            $model->status = 'Exported';
            if ($model->save()) {
                return $this->redirect(['view', 'id' => $id]);
            }
        } else {
            return $this->render('export', [
                'model' => $model
            ]);
        }
    }

    public function actionMsword($id) {
        $this->layout='empty';
        $model = $this->findModel($id);

        return $this->render('msword', [
            'model' => $model
        ]);

    }

}
