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
        <?= Html::submitButton('Speichern', ['class' => 'btn btn-default']) ?>
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
