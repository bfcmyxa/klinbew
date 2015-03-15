<?php

namespace app\controllers;

use app\models\Author;
use app\models\SourceImport;
use app\models\SourceProject;
use Yii;
use app\base\Model;
use app\models\Source;
use app\models\SourceSearch;
use app\models\Project;
use yii\data\ActiveDataProvider;
use yii\data\SqlDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\Response;
use yii\helpers\ArrayHelper;

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
        $projectModel = Project::findOne($id);

        //$dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        //$sql = 'SELECT source.sourceId, source.type, source.title, source.year, source.place, source.publisher, source.keywords, source.text, source.status, source.summary  FROM source, sourceproject, project WHERE source.sourceId = sourceproject.sourceId AND sourceproject.projectId = ' . $id;
        //$dataProvider = new SqlDataProvider(['sql' => $sql,]);

        $dataProvider = new ActiveDataProvider([
            'query' => $projectModel->getSources(),
        ]);

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
        $authorModels = [new Author];
        $projectModel = Project::findOne($id);


        //for the authors dropdown
        //$authors = Author::find()->asArray()->all();

        //if here first author is chosen -> crash
        //$newauthors = ['Choose Author...'];

        //foreach ($authors as $i) {
        //    array_push($newauthors, $i['name'].' '.$i['fname']);
        //}

        if ($model->load(Yii::$app->request->post())){

            $authorModels = Model::createMultiple(Author::className());
            Model::loadMultiple($authorModels, Yii::$app->request->post());

            // ajax validation
            if (Yii::$app->request->isAjax) {
                Yii::$app->response->format = Response::FORMAT_JSON;
                return ArrayHelper::merge(
                    ActiveForm::validateMultiple($authorModels),
                    ActiveForm::validate($model)
                );
            }

            // validate all models
            $valid = $model->validate();
            $valid = Model::validateMultiple($authorModels) && $valid;

            if ($valid) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {
                    if ($flag =  $model->save(false)) {
                        foreach ($authorModels as $author) {
                            $author->sourceAuthId = $model->sourceId;
                            if (! ($flag = $author->save(false))) {
                                $transaction->rollBack();
                                break;
                            }
                        }
                    }
                    if ($flag) {
                        $model->status = 0;
                        $transaction->commit();
                        $projectModel->link('sources', $model);
                        return $this->redirect(['index', 'id' => $id]);
                    }
                } catch (Exception $e) {
                    $transaction->rollBack();
                }
            }

       //     $model->status = 0;
       //     if($model->save()) {
                //$authorModel->sourceAuthId = $model->sourceId;
                //$authorModel->save();
          //      $projectModel->link('sources', $model);
          //      return $this->redirect(['index', 'id' => $id]);
         //   }
        }
            return $this->render('create', [
                'model' => $model,
                'projectModel' => $projectModel,
                'authorModels' => (empty($authorModels)) ? [new Author()] : $authorModels
                //'authorModel' => $authorModel,
                //'author' => $newauthors,
            ]);

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
     * Automatically import the sources and authors
     * @param integer id - is the id of the project associated with those sources
     * @return string
     */
    public function actionImport($id)
    {
        $model = new SourceImport;
        $projectModel = Project::findOne($id);
        if ($model->load(Yii::$app->request->post())) {
            $inputXml = simplexml_load_string($model->text);
            $articles = array();
            foreach ($inputXml->PubmedArticle as $article) {
                $articles[] = $this->getExtractedData($article);
            }
            // adding data to the database
            foreach ($articles as $article) {
                $sourceModel = new Source();
                $sourceModel->type = $article['type'];
                $sourceModel->title = $article['title'];
                $sourceModel->year = $article['year'];
                $sourceModel->place = $article['place'];
                $sourceModel->publisher = $article['publisher'];
                $sourceModel->keywords = $article['keywords'];
                $sourceModel->text = $article['text'];
                $sourceModel->status = 0;
                $sourceModel->save();
                $projectModel->link('sources', $sourceModel);
                foreach ($article['authors'] as $author) {
                    $authorModel = new Author();
                    $authorModel->name = $author['vorname'];
                    $authorModel->fname = $author['nachname'];
                    $authorModel->sourceAuthId = $sourceModel->sourceId;
                    $authorModel->save();
                }
            }
            return $this->redirect(['index', 'id' => $id]);
        } else {
            return $this->render('import', ['model' => $model]);
        }
    }

    /**
     * @param \SimpleXMLElement $xmlElement
     * @return array -> associated array with needed data for sources
     */
    protected function getExtractedData(\SimpleXMLElement $xmlElement) {
       $year = $xmlElement->MedlineCitation->Article->Journal->JournalIssue->PubDate->Year->__toString();
        $title = $xmlElement->MedlineCitation->Article->ArticleTitle->__toString();
        $place = $xmlElement->MedlineCitation->MedlineJournalInfo->Country->__toString();
        $publisher = $xmlElement->MedlineCitation->Article->Journal->Title->__toString();

        //type,  keywords, text
        $type = '';
        foreach ($xmlElement->MedlineCitation->Article->PublicationTypeList->PublicationType as $typ) {
            $type .= $typ->__toString();
            $type .= ". ";
        }

        $keywords = '';
        if (isset($xmlElement->MedlineCitation->MeshHeadingList))
        {
            foreach ($xmlElement->MedlineCitation->MeshHeadingList->MeshHeading as $heading) {
                $keywords .= $heading->DescriptorName->__toString();
                $keywords .= ". ";
            }
        }


        $text = '';
        foreach ($xmlElement->MedlineCitation->Article->Abstract->AbstractText as $abs) {
            $text .= $abs->__toString();
            $text .= " ";
        }

        $authors = array();
        foreach ($xmlElement->MedlineCitation->Article->AuthorList->Author as $author) {

            $tmp = array("vorname" => $author->ForeName->__toString(), "nachname" => $author->LastName->__toString());
            $authors[] = $tmp;
        }

        //$serviceType = iconv('utf-8', 'cp1251', $service->attributes()->type->__toString());
        //$prices = $xmlElement->xpath('OfferAvailabilityResponse/Offer/Prices');

        return array("year" => $year, "title" => $title, "place" => $place, "publisher" => $publisher, "type" => $type, "keywords" => $keywords, "text" => $text, "authors" => $authors);
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
