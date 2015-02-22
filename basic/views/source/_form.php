<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use wbraganca\dynamicform\DynamicFormWidget;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Source */
/* @var $authorModel app\models\Author */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="source-form">



    <?php $form = ActiveForm::begin(['id' => 'dynamic-form']); ?>

    <?= $form->field($model, 'type')
        ->dropDownList(['Buch' => 'Buch', 'Artikel in Zeitschrift' => 'Artikel in Zeitschrift', 'Website' => 'Website']) ?>
    <?= $form->field($model, 'title')->textInput(['maxlength' => 45]) ?>
    <?= $form->field($model, 'year')->textInput() ?>
    <?= $form->field($model, 'place')->textInput(['maxlength' => 45]) ?>
    <?= $form->field($model, 'publisher')->textInput(['maxlength' => 45]) ?>
    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 45]) ?>
    <?= $form->field($model, 'text')->textArea(['rows' => 6]) ?>

    <h4>Authors</h4>

    <?php DynamicFormWidget::begin([
        'dynamicItems' => '#form-authors',
        'dynamicItem' => '.form-author',
        'model' => $authorModels[0],
        'formId' => 'dynamic-form',
        'formFields' => [
            'name',
            'fname',
        ],
        'options' => [
            'limit' => 15, // the maximum times, an element can be cloned (default 999)
        ]
    ]); ?>

    <div id="form-authors">
        <?php foreach ($authorModels as $i => $authorModel): ?>
            <div class="form-author panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title pull-left">Author</h3>
                    <div class="pull-right">
                        <button type="button" class="clone btn btn-success btn-xs"><i class="glyphicon glyphicon-plus"></i></button>
                        <button type="button" class="delete btn btn-danger btn-xs"><i class="glyphicon glyphicon-minus"></i></button>
                    </div>
                    <div class="clearfix"></div>
                </div>
                <div class="panel-body">
                    <?php
                    // necessary for update action.
                    if (! $authorModel->isNewRecord) {
                        echo Html::activeHiddenInput($authorModel, "[{$i}]id");
                    }
                    ?>
                    <div class="row">
                        <div class="col-sm-6">
                            <?= $form->field($authorModel, "[{$i}]name")->textInput(['maxlength' => 128]) ?>
                        </div>
                        <div class="col-sm-6">
                            <?= $form->field($authorModel, "[{$i}]fname")->textInput(['maxlength' => 128]) ?>
                        </div>
                    </div><!-- .row -->
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <?php DynamicFormWidget::end(); ?>



    <!--
        <?= $form->field($authorModel, 'name')->textInput(['maxlength' => 45])->label('Author Name') ?>
    <?= $form->field($authorModel, 'fname')->textInput(['maxlength' => 45])->label('Author Surname') ?>
    <?= $form->field($model, 'status')->textInput() ?>
     //$form->field($model, 'authorId')->dropDownList($author)
     //$form->field($model, 'sourceRatingId')->textInput()
    <?= $form->field($model, 'summary')->textInput(['maxlength' => 45]) ?>
    -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
