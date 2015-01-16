<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="container">
	<div class="col-md-3">
        <h2> Projekt1 </h2>
        <ul>
          <li>Metadata</li>
          <li>Referenzen</li>
          <li>Beschreibung</li>
          <li>Quellen</li>
          <li>Zusammenfassung</li>
          <li>Klassifizierung</li>
          <li>Exportieren</li>
        </ul>
    </div>
    <div class="col-md-9">

    	<h2> Referenzierte Dokumenten</h2>

		<div class="row">
            <div class="col-md-7">
              <button class="btn btn-default">
                <span class="glyphicon glyphicon-plus-sign" aria-hidden="true"></span> Dokument hinzuf&uuml;gen</button>
              <p></p>
            </div>
          </div>

    	<?php $form = ActiveForm::begin(); ?>

		    <?= $form->field($model, 'name')->label("Ihre Name") ?>

		    <?= $form->field($model, 'pfad')->label("Pfad des Dokumentes") ?>

		    <?= $form->field($model, 'version') ?>

		    <div class="form-group">
		        <?= Html::submitButton('Ok', ['class' => 'btn btn-success']) ?>
		        <?= Html::submitButton('Abbrechen', ['class' => 'btn btn-danger']) ?>
		    </div>

		<?php ActiveForm::end(); ?>

    </div>

</div>

