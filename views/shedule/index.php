<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<h1>Schedule<a class="btn btn-primary pull-right" href="<?= \yii\helpers\Url::to(['shedule/create'])?>">Add Schedule</a></h1>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        'id',
        ['attribute' => 'id_item','value' => 'item.name'],
        ['attribute' => 'id_class','value' => 'class.name'],
        [
            'attribute' => 'id_teacher',
            'value' => function($model) {
                return "{$model->teacher->name_f} {$model->teacher->name} {$model->teacher->name_ot}";
            }
        ],
        'day_nidely',
        'number_urok',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}'
        ]
    ]
   
]) ?>
