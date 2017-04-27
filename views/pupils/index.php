<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>

<h1>Pupils List<a class="btn btn-primary pull-right" href="<?= \yii\helpers\Url::to(['pupils/create'])?>">Add Pupils</a></h1>

<?= \yii\grid\GridView::widget([
    'dataProvider' => $provider,
    'columns' => [
        'id',
        'name_f',
        'name',
        'name_ot',
        'birth',
        'id_class',
        [
            'class' => 'yii\grid\ActionColumn',
            'template' => '{update} {delete}'
        ]
    ]
   
]) ?>
