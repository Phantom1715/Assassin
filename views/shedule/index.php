<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<h1>Schedule<a class="btn btn-primary pull-right" href="<?= \yii\helpers\Url::to(['shedule/create'])?>">Add Schedule</a></h1>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        'id',
        'id_item',
        'id_class',
        'id_teacher',
        'day_nidely',
        'number_urok',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}'
        ]
    ]
   
]) ?>
