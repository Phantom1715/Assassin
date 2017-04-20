<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<h1>Teacher List<a class="btn btn-primary pull-right" href="<?= \yii\helpers\Url::to(['teachers/create'])?>">Add Teacher</a></h1>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        'id',
        'name_f',
        'name',
        'name_ot',
        'birthday',
        'employment',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}'
        ]
    ]
   
]) ?>
