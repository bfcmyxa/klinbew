<?php
use yii\helpers\Html;
?>
<p>You have entered the following information:</p>

<ul>
    <li><label>Name</label>: <?= Html::encode($model->name) ?></li>
    <li><label>Pfad</label>: <?= Html::encode($model->pfad) ?></li>
    <li><label>Version</label>: <?= Html::encode($model->version) ?></li>
    
</ul>