<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<h1>Class List<a class="btn btn-primary pull-right" href="<?= \yii\helpers\Url::to(['class/create'])?>">Add Class</a></h1>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        'id',
        'name',
        'chislo_uch',
        'id_uchitel',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}'
        ]
    ]
   
]) ?>
