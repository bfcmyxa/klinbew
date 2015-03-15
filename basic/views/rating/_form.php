<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\slider\Slider;
use kartik\checkbox\CheckboxX;

/* @var $this yii\web\View */
/* @var $model app\models\Rating */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="rating-form">

    <?php $form = ActiveForm::begin(); ?>

    <!--
    <?=  $form->field($model, 'ratedBy')->textInput() ?>
    <?=  $form->field($model, 'ratingDate')->textInput() ?>
    -->
        <div class="row">
            <div class="col-lg-4">
                <button type="button" class="btn btn-info" id="evidenz" data-toggle="collapse" data-target="#evidenzCollapse" aria-expanded="false" aria-controls="evidenzCollapse">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Was ist der Evidenz Wert?
                </button>

            </div>
            <div class="col-lg-4">
                <button type="button" class="btn btn-info" id="relevanz" data-toggle="collapse" data-target="#relevanzCollapse" aria-expanded="false" aria-controls="relevanzCollapse">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Was ist der Relevanz Wert?
                </button>

            </div>
            <div class="col-lg-4">
                <button type="button" class="btn btn-info" id="signifikanz" data-toggle="collapse" data-target="#signifikanzCollapse" aria-expanded="false" aria-controls="signifikanzCollapse">
                    <span class="glyphicon glyphicon-info-sign" aria-hidden="true"></span> Was ist der Evidenz Wert?
                </button>

            </div>
        </div>

            <br>
            <br>

    <div class="collapse" id="evidenzCollapse">
        <div class="well">
            Der Evidenz Wert, oder mit anderen Wörter die Güte der Quelle, basiert sich auf dem zugrundeliegenden Studiendesign.
            <br>
            <br>
            <div class="row">

                <div class="col-lg-6">
                    <img src="../res/evidenz.jpg" />
                </div>
                <div class="col-lg-3">

                    <p>
                        Güteklasse 6:
                    </p>
                    <p>
                        Güteklasse 5:
                    </p>
                    <p>
                        Güteklasse 4:
                    </p>
                    <p>
                        Güteklasse 3:
                    </p>
                    <p>
                        Güteklasse 2:
                    </p>
                    <p>
                        Güteklasse 1:
                    </p>
                </div>
            </div>
        </div>
    </div>

       <div class="collapse" id="relevanzCollapse">
                <div class="well">
                    <p>
                        Relevanz der Quelle für das Medizinprodukt . Die Relevanz meint hier die Übertragbarkeit der Ergebnisse, beispielsweise weil sie mit einem vergleichbaren Produkt erzielt wurden.
                    </p>
                    <p>
                        Eine Quelle (nicht die Ergebnisse) ist dann relevant,
                        wenn das Vergleichsprodukt technisch (z.B. Algorithmus),
                        biologisch (bei Software zu ignorieren) und klinisch
                        (also unter vergleichbare klinische Bedingungen, vergleichbare klinische Anwendung
                        (z.B. Patientengruppe, Lokalisation), vergleichbare klinische Zweckbestimmung) äquivalent ist.
                    </p>
                     <br>
                    <br>


                            <p>
                                Sehr hohe Relevanz (5): Die Ergebnisse sind direkt übertragbar, wurden beispielswese mit einem (nahezu) identischen Produkt gewonnen.

                            </p>
                            <p>
                                Hohe Relevanz (4): Die Ergebnisse lassen sich weitgehend übertragen, sie wurden beispielsweise mit einem ähnlichen Produkt oder Verfahren gewonnen.
                            </p>
                            <p>
                                Mäßige Relevanz (3): Die Ergebnisse lassen sich nicht direkt übertragen, geben aber beispielsweise Trends für die eigene Einschätzung.
                            </p>
                            <p>
                                Niedrige oder unklare Relevanz (2): Die Ergebnisse lassen sich wahrscheinlich nicht übertragen, können aber als Denkanstoß verwendet werden.
                            </p>
                            <p>
                                Keine Relevanz (1): Die Ergebnisse sind für diese klinische Bewertung bedeutungslos.
                            </p>

                    </div>
    </div>



    <div class="collapse" id="signifikanzCollapse">
        <div class="well">
            <p>
                Signifikanz der Ergebnisse
            </p>
            <p>
                Die klinische Relevanz ist unabhängig von der Güte und Relevanz Quelle.
                Beispielsweise kann eine hervorragend durchgeführte Studie
                zum Ergebnis kommen, dass ein Gerät keinen klinisch messbaren
                oder keinen statistisch relevanten Nutzen bringt.
            </p>
            <br>
            <br>
            <p>Sehr hohe (5) Signifikanz:
            </p>
            <p>            	Hohe klinische (4) Signifikanz:
            </p>
            <p>            	Mittlere (3) Signifikanz:
            </p>
            <p>            	Niedrige (2) Signifikanz:
            </p>
            <p>            	Keine (1) Signifikanz:
            </p>
        </div>
    </div>



    <?= $form->field($model, 'evidenceValue')->widget(Slider::classname(), [
        'sliderColor'=>Slider::TYPE_GREY,
        'pluginOptions'=>[
            'min'=>1,
            'max'=>6,
            'step'=>1,
        ]
    ]);
    ?>
    <?= $form->field($model, 'evidenceText')->textArea(['rows' => 3]) ?>

    <?= $form->field($model, 'relevanceValue')->widget(Slider::classname(), [
        'sliderColor'=>Slider::TYPE_GREY,
        'pluginOptions'=>[
            'min'=>1,
            'max'=>5,
            'step'=>1,
        ]
    ]);
    ?>
    <?= $form->field($model, 'relevanceText')->textArea(['rows' => 3]) ?>

    <?= $form->field($model, 'signValue')->widget(Slider::classname(), [
        'sliderColor'=>Slider::TYPE_GREY,
        'pluginOptions'=>[
            'min'=>1,
            'max'=>5,
            'step'=>1,
        ]
    ]);
    ?>
    <?= $form->field($model, 'signText')->textArea(['rows' => 3]) ?>

    <?= $form->field($model, 'use')->widget(CheckboxX::classname(), [
        'pluginOptions'=>['threeState'=>false]
    ]) ?>
    <?= $form->field($model, 'risk')->widget(CheckboxX::classname(), [
        'pluginOptions'=>['threeState'=>false]
    ]) ?>


    <?= $form->field($model, 'ratingSummary')->textArea(['rows' => 5]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Bewerten' : 'Bewerten', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
