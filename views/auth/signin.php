<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="row">
    <div class="col-md-8">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email'); ?>

    <?= $form->field($model, 'password'); ?>

    <?= Html::submitButton(Yii::t('app', 'Sign in'), ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>
    </div>
</div>

