<?php
use yii\helpers\Html;
use yii\widgets\LinkPager;
?>
<h1>References</h1>
<ul>
<?php foreach ($references as $reference): ?>
    <li>
        <?= Html::encode("{$reference->name} ({$reference->file})") ?>:
        <?= $reference->version ?>
    </li>
<?php endforeach; ?>
</ul>

<?= LinkPager::widget(['pagination' => $pagination]) ?>