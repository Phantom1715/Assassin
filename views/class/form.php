<?php

//$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['product/index']];
//$this->params['breadcrumbs'][] = ($model->scenario == 'edit') ? 'Edit product ' . $model->id : 'New Product';

?>

<h1 class="text-center"><?= ($model->scenario == 'edit') ? 'Edit Class ' . $model->id : 'New Class'; ?></h1>

<div class="col-lg-6 col-lg-offset-3">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
        'enableClientValidation' => false
    ]) ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'id_uchitel')->dropDownList($teachersOpts, ['prompt' => 'Выберите учителя...']) ?>

    <?= $form->field($model, 'chislo_uch')->staticControl(); ?>
    
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    <?php \yii\bootstrap\ActiveForm::end() ?>
</div>