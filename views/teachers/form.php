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

<!--    --><?//= $form->field($model, 'image')->fileInput(['class' => 'form-control', 'accept' => 'image/png, image/jpg, image/jpeg']) ?>
<!---->
<!--    --><?php //if ($model->image) { ?>
<!--        <div class="form-group">-->
<!--            <img src="--><?//= $model->image ?><!--" />-->
<!--        </div>-->
<!--    --><?php //} ?>
<!---->
<!--    --><?//= $form->field($model, 'images')->fileInput(['class' => 'form-control', 'accept' => 'image/png, image/jpg, image/jpeg', 'multiple' => true, 'name' => 'ProductForm[images][]']) ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'name_ot') ?>

    <?= $form->field($model, 'birthday')?>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    <?php \yii\bootstrap\ActiveForm::end() ?>
</div>