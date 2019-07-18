<?php

/* @var $this yii\web\View */
use yii\web\View;

$this->title = Yii::t('app', 'BMI Calculator');
?>
<div class="site-index">

    <div class="jumbotron">
        <div id="welcome">
            <h1><?= Yii::t('app', 'Welcome to BMI Calculator!') ?></h1>

            <p class="lead"><?= Yii::t('app', "This application calculates the body mass index with your height and weight, start rigth now...  ") ?></p>
        </div>
        
        <p><button id="start" class="btn btn-lg btn-success"> <?= Yii::t('app', 'Get started') ?></button></p>
    </div>
</div>

                
