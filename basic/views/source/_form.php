<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Source */
/* @var $author[] */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="source-form">



    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type')
        ->dropDownList(['Buch' => 'Buch', 'Artikel in Zeitschrift' => 'Artikel in Zeitschrift', 'Website' => 'Website']) ?>

    <?= $form->field($model, 'authorId')->dropDownList($author) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'year')->textInput() ?>

    <?= $form->field($model, 'place')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'publisher')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => 45]) ?>

    <?= $form->field($model, 'text')->textArea(['rows' => 6]) ?>

    <!--

    <?= $form->field($model, 'status')->textInput() ?>
    <?= $form->field($model, 'sourceRatingId')->textInput() ?>
    <?= $form->field($model, 'summary')->textInput(['maxlength' => 45]) ?>
    -->
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>



</div>
