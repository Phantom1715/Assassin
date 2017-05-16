<?php

//$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['product/index']];
//$this->params['breadcrumbs'][] = ($model->scenario == 'edit') ? 'Edit product ' . $model->id : 'New Product';

?>

<h1 class="text-center"><?= ($model->scenario == 'edit') ? 'Edit Schedule ' . $model->id : 'Add Schedule'; ?></h1>

<div class="col-lg-6 col-lg-offset-3">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
        'enableClientValidation' => false
    ]) ?>

    <?= $form->field($model, 'id_class')->dropDownList($classOpts,['prompt' => 'Выберите класс...'])?>

    <?= $form->field($model, 'id_teacher')->dropDownList($teacherOpts,['prompt' => 'Выберите учителя...']) ?>

    <?= $form->field($model, 'id_item')->dropDownList($itemOpts,['prompt' => 'Выберите придмет...']) ?>

    <?= $form->field($model, 'day_nidely')->widget(\kartik\widgets\DatePicker::className(),['language'=>'ru','pluginOptions'=>['format'=>'yyyy-mm-dd']])?>

    <?= $form->field($model, 'number_urok')?>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    <?php \yii\bootstrap\ActiveForm::end() ?>
</div>