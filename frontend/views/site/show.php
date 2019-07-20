<?php
use yii\grid\GridView;
$this->title = Yii::t('app', 'Show Historical');
?>

<div class="container">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'registration_date',
            'height',
            'weight',
            'BMI',
            'classification'
        ],
    ]) ?>
</div>
