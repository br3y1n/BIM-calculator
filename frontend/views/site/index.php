<?php

/* @var $this yii\web\View */
use yii\web\View;
use yii\helpers\Html;

$this->title = Yii::t('app', 'BMI Calculator');
?>
<div class="site-index">

    <div class="jumbotron">
        <div id="welcome" class="col-sm-10 col-sm-offset-1">
            <h1><?= Yii::t('app', 'Welcome to BMI Calculator!') ?></h1>

            <p class="lead"><?= Yii::t('app', "This application calculates the body mass index with your height and weight, start rigth now and know your BMI:  ") ?></p>
        </div>

        <?php 
            echo Html::tag('form',

                Html::tag('div',
                    Html::input('hidden', 'id', $id, ['class' => 'form-control', 'disabled' => true, 'id' => 'id']).
                    Html::input('hidden', 'email', $email, ['class' => 'form-control', 'disabled' => true, 'id' => 'email'])
                , ['class' => 'form-group']).

                Html::tag('div', 
                    Html::label(Yii::t('app', 'Weight'), 'weight', ['class' => 'label-control']).
                    Html::input('text', 'weight', '', ['class' => 'form-control', 'id' => 'weight']) 
                , ['class' => 'form-group']).

                Html::tag('div',
                    Html::label(Yii::t('app', 'Height'), 'height', ['class' => 'label-control']).
                    Html::input('text', 'height', '', ['class' => 'form-control', 'id' => 'height'])
                , ['class' => 'form-group']).

                Html::tag('div',
                    Html::label(Yii::t('app', 'BMI'), 'BMI', ['class' => 'label-control']).
                    Html::input('text', 'BMI', '', ['class' => 'form-control', 'disabled' => true, 'id' => 'BMI'])
                , ['class' => 'form-group']).

                Html::tag('div',
                    Html::button( Yii::t('app', 'Calculate'), ['class' => 'btn btn-lg btn-success', 'id' => 'calculate'] )
                , ['class' => 'form-group'])
                

            , ['id' => 'calculate-form', 'class' => 'col-sm-4 col-sm-offset-4']);

        ?>

    </div>
</div>

<?php $this->registerJsFile(
    '@web/js/calculate.js',
    ['depends' => [\yii\web\JqueryAsset::className()]],
     View::POS_END,
); ?>