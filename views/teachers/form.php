<?php

//$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['product/index']];
//$this->params['breadcrumbs'][] = ($model->scenario == 'edit') ? 'Edit product ' . $model->id : 'New Product';

?>

<h1 class="text-center"><?= ($model->scenario == 'edit') ? 'Edit teacher ' . $model->id : 'New Teacher'; ?></h1>

<div class="col-lg-6 col-lg-offset-3">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
        'enableClientValidation' => false
    ]) ?>

    <?= $form->field($model, 'name_f') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_ot') ?>

    <?= $form->field($model, 'birthday')->widget(\kartik\widgets\DatePicker::className(),['language'=>'ru','pluginOptions'=>['format'=>'yyyy-mm-dd']])?>

    <?= $form->field($model, 'employment')->widget(\kartik\widgets\DatePicker::className(),['language'=>'ru','pluginOptions'=>['format'=>'yyyy-mm-dd']])?>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    <?php \yii\bootstrap\ActiveForm::end() ?>
</div>