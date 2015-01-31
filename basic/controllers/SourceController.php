<?php

namespace app\controllers;

use app\models\Author;
use app\models\SourceProject;
use Yii;
use app\models\Source;
use app\models\SourceSearch;
use app\models\Project;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SourceController implements the CRUD actions for Source model.
 */
class SourceController extends Controller
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
     * Lists all Source models.
     * @return mixed
     */
    public function actionIndex($id)
    {
        $searchModel = new SourceSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        $projectModel = Project::findOne($id);

        $srcprojData = new ActiveDataProvider([
            'query' => SourceProject::find(),

        ]);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'projectModel' => $projectModel,
            'srcprojData' => $srcprojData,
        ]);
    }

    /**
     * Displays a single Source model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        //$projectModel = Project::findOne($projectId);

        return $this->render('view', [
            'model' => $this->findModel($id),
            //'projectModel' => $projectModel,
        ]);
    }

    /**
     * Creates a new Source model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate($id)
    {
        $model = new Source();
        $projectModel = Project::findOne($id);

        $authors = Author::find()->asArray()->all();

        //if here first author is chosen -> crash
        $newauthors = ['Choose Author...'];

        foreach ($authors as $i) {
            array_push($newauthors, $i['name'].' '.$i['fname']);
        }

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $projectModel->link('sources', $model);
            return $this->redirect(['index', 'id' => $id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'projectModel' => $projectModel,
                'author' => $newauthors,
            ]);
        }
    }

    /**
     * Updates an existing Source model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Source model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Source model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Source the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Source::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
