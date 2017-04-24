<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<h1>Subject List<a class="btn btn-primary pull-right" href="<?= \yii\helpers\Url::to(['subject/create'])?>">Add Subject</a></h1>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        'id',
        'name',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}'
        ]
    ]
   
]) ?>
