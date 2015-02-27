<?php
if (isset(Yii::$app->user->id)){

    echo '<p><a class="btn btn-lg btn-success" href="/basic/web/index.php?r=project/index">Zu meine Projekte</a></p>';
} else {
    echo '<a class="btn btn-lg btn-success" href="/basic/web/index.php?r=user/registration/register">Jetzt probieren</a>';
}
?>