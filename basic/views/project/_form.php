<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Project */

/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'productName')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'fileName')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'productVersion')->textInput() ?>

<!--
    <?= $form->field($model, 'alias')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'creationDate')->textInput() ?>

    <?= $form->field($model, 'modifyDate')->textInput() ?>

    <?= $form->field($model, 'dokumentVersion')->textInput() ?>

    <?= $form->field($model, 'productDescription')->textInput(['maxlength' => 45]) ?>
-->
    <div class="form-group">



    <!-- here could probably use some jQuery to add submitButton outside the form
    look: https://gist.github.com/jonvargas/9b887b465e272b38ccdf
    -->
        <div class="row">
            <div class="col-lg-3">
                <?= Html::a('Zurück zum Projekt', ['project/view', 'id' => $model->projectid], ['class' => 'btn btn-primary btn-lg btn-block']) ?>
            </div>
            <div class="col-lg-4">
                <?= Html::a('Weiter ohne Änderung', ['project/description', 'id' => $model->projectid], ['class' => 'btn btn-default btn-lg btn-block']) ?>
            </div>
            <div class="col-lg-5">
                <?= Html::submitButton($model->isNewRecord ?
                    'Speichern' : 'Speichern und weiter', ['class' => $model->isNewRecord ?
                    'btn btn-success btn-lg btn-block' : 'btn btn-success btn-lg btn-block']) ?>
            </div>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

</div>
