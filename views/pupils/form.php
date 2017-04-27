<?php

//$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['product/index']];
//$this->params['breadcrumbs'][] = ($model->scenario == 'edit') ? 'Edit product ' . $model->id : 'New Product';

?>

<h1 class="text-center"><?= ($model->scenario == 'edit') ? 'Edit Pupil ' . $model->id : 'New Pupil'; ?></h1>

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

    <?= $form->field($model, 'birth')->widget(\kartik\widgets\DatePicker::className(),['language'=>'ru','pluginOptions'=>['format'=>'yyyy-mm-dd']])?>

    <?= $form->field($model, 'id_class')->dropDownList($classOpts,['prompt' => 'Выберите класс...'])?>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    <?php \yii\bootstrap\ActiveForm::end() ?>
</div>