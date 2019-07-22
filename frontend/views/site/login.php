<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = Yii::t('app' , 'BMI Calculator');
?>
<div class="site-login">
    <h1><?= Yii::t('app', 'Login') ?></h1>

    <p><?= Yii::t('app', 'Please fill out the following fields to login:') ?></p>

    <div class="row">
        <div class="col-md-5">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    <?= Yii::t('app', 'If you forgot your password you can') ?> <?= Html::a( Yii::t('app', 'reset it'), ['site/request-password-reset']) ?>.
                    <br>
                    <?= Yii::t('app', 'Need new verification email?') ?> <?= Html::a( Yii::t('app', 'Resend'), ['site/resend-verification-email']) ?>
                </div>
                
                <div class="form-group">
                    <?= Html::submitButton( Yii::t('app', 'Login'), ['class' => 'btn btn-primary btn-block', 'name' => 'login-button']) ?>
                </div>
                
            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
