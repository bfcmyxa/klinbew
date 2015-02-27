<?php
/**
 * Created by PhpStorm.
 * User: Ivan
 * Date: 1/22/2015
 * Time: 2:58 AM
 */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Project */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="project-form">

    <?php $form = ActiveForm::begin(); ?>


    <?= $form->field($model, 'productDescription')->textArea(['rows' => 6]) ?>

    <!--
    <?= $form->field($model, 'productDescription')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'alias')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'createdBy')->textInput() ?>

    <?= $form->field($model, 'creationDate')->textInput() ?>

    <?= $form->field($model, 'modifyDate')->textInput() ?>

    <?= $form->field($model, 'dokumentVersion')->textInput() ?>


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
                <?= Html::a('Weiter ohne Änderung', ['reference/index', 'id' => $model->projectid], ['class' => 'btn btn-default btn-lg btn-block']) ?>
            </div>
            <div class="col-lg-5">
                <?= Html::submitButton('Speichern', ['class' => 'btn btn-success btn-lg btn-block']) ?>
            </div>
        </div>

    </div>

    <?php ActiveForm::end(); ?>

<!--
HERE SOME TESTS FOR DataPicker WIDGET
    <?php
    echo DatePicker::widget([
    'language' => 'ru',
    'name'  => 'country',
    'clientOptions' => [
    'dateFormat' => 'yy-mm-dd',
    ],
    ]);
    ?>
-->
</div>
