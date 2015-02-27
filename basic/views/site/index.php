<?php
/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>KlinBew-Toolset</h1>

        <p class="lead">Das Toolset zur Erstellung von klinischer Bewertung.</p>

        <?php include 'choosebutton.php'; ?>

    </div>

    <div class="body-content">
        <div class="row">
            <h3> Links (temporary): </h3>

            <!--
            <p><a class="btn btn-default" href="/basic/web/index.php?r=site/dashboard">Dashboard &raquo;</a></p>
            <p><a class="btn btn-default" href="/basic/web/index.php?r=site/meta">Metadaten &raquo;</a></p>
            <p><a class="btn btn-default" href="/basic/web/index.php?r=site/refdocs">Refdocs &raquo;</a></p>
            <p><a class="btn btn-default" href="/basic/web/index.php?r=reference/index">CRUD Reference &raquo;</a></p>
            <p><a class="btn btn-default" href="/basic/web/index.php?r=source/index">CRUD Source &raquo;</a></p>
            <p><a class="btn btn-default" href="/basic/web/index.php?r=rating/index">CRUD Rating &raquo;</a></p>
            -->
            <p><a class="btn btn-default" href="/basic/web/index.php?r=project/index">Zu Projekte &raquo;</a></p>
            <p><a class="btn btn-default" href="/basic/web/index.php?r=author/index">Zu Autoren &raquo;</a></p>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <h2>Projekt anlegen</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>
                </div>
                <div class="col-lg-4">
                    <h2>Literaturquellen bewerten</h2>

                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                        dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                        ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                        fugiat nulla pariatur.</p>
                    </div>
                    <div class="col-lg-4">
                        <h2>Klinische Bewertung erstellen</h2>

                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                            dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                            ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                            fugiat nulla pariatur.</p>
                        </div>
                    </div>


                </div>
            </div>
