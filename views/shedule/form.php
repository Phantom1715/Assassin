<?php

//$this->params['breadcrumbs'][] = ['label' => 'Product', 'url' => ['product/index']];
//$this->params['breadcrumbs'][] = ($model->scenario == 'edit') ? 'Edit product ' . $model->id : 'New Product';

?>

<h1 class="text-center"><?= ($model->scenario == 'edit') ? 'Edit Schedule ' . $model->id : 'Add Schedule'; ?></h1>

<div class="col-lg-6 col-lg-offset-3">
    <?php $form = \yii\bootstrap\ActiveForm::begin([
        'id' => 'shedule-form',
        'options' => [
            'enctype' => 'multipart/form-data'
        ],
        'enableClientValidation' => false
    ]) ?>

    <?= $form->field($model, 'id_class')->dropDownList($classOpts,['prompt' => 'Выберите класс...'])?>

    <?= $form->field($model, 'id_teacher')->dropDownList($teacherOpts,['prompt' => 'Выберите учителя...']) ?>

    <?= $form->field($model, 'id_item')->dropDownList($itemOpts,['prompt' => 'Выберите придмет...']) ?>

    <?= $form->field($model, 'day_nidely')->dropDownList($dayOpts,['prompt' => 'Веберите день недели...'])?>

    <?= $form->field($model, 'number_urok')->dropDownList($lessonsOpts,['prompt' => 'Выберите номер урока...'])?>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Save</button>
    </div>

    <?php \yii\bootstrap\ActiveForm::end() ?>

    <script>
        var sheduleAjaxUrl = '<?= \yii\helpers\Url::to(['shedule/ajax-options']) ?>';
    </script>
</div>