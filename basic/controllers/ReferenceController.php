<?php

namespace app\controllers;

use yii\web\Controller;
use yii\data\Pagination;
use app\models\Reference;

class ReferenceController extends Controller
{
    public function actionIndex()
    {
        $query = Reference::find();

        $pagination = new Pagination([
            'defaultPageSize' => 10,
            'totalCount' => $query->count(),
        ]);

        $references = $query->orderBy('name')
            ->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        return $this->render('index', [
            'references' => $references,
            'pagination' => $pagination,
        ]);
    }
}