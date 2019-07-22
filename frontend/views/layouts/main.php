<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php $this->registerCsrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->registerLinkTag(['rel' => 'shortcut icon', 'type' => 'image/png', 'href' => 'images/logo.png']) ?>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => Html::img('@web/images/logo.png', [
                            'class' => 'img-logo-nav',
                            'height' => '40px'
                        ]).Html::tag('div', Yii::t('app', 'BMI Calculator'), ['class' => 'label-logo-nav']),

        'brandOptions' => ['class' => 'logo-nav'],
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);

    if (Yii::$app->user->isGuest) {
        $menuItems = [
            ['label' => Yii::t('app', 'Signup'), 'url' => ['/site/signup']],
            ['label' => Yii::t('app', 'Login'), 'url' => ['/site/login']],
        ];
    } else {
        $menuItems = [
            ['label' => Yii::t('app', 'Home'), 'url' => ['/site/index']],
            ['label' => Yii::t('app', 'Show historical'), 'url' => ['/site/show']],
            '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->name . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>',
            
        ];
    }

    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => $menuItems,
    ]); 

    echo Nav::widget([
        'items' => [
            [
                'label' => Yii::$app->language,
                'items' => [
                     ['label' => 'ES', 'url' => '#', 'options' => ['id' => 'ES']],
                     '<li class="divider"></li>',
                     ['label' => 'EN', 'url' => '#', 'options' => ['id' => 'EN']],
                ],
            ],
        ],
        'options' => ['class' =>'navbar-nav navbar-left'],
    ]);
  
    NavBar::end(); ?>
   

    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= Alert::widget() ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; <?= Yii::t('app', 'Breyin') ?> <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>

<script>

$('#ES').click(function(){

    let language = {
        "Language" : 'ES'
    };
    setLanguage(language);
})

$('#EN').click(function(){

    let language = {
        "Language" : 'EN'
    };
    setLanguage(language);
})

function setLanguage(language){
    $.ajax({
                data:  language, 
                url:   './set-language',
                type:  'post', 
                success:  function (response) {
                    location.reload();
                },
                error: function(response){
                    alert('Error!');
                }
            });
}

</script>
