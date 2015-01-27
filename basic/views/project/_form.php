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
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
