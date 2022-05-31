<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $model \app\models\forms\SigninForm */
?>
<div class="row">
    <div class="col-md-8">
    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'email'); ?>

    <?= $form->field($model, 'password')->passwordInput(); ?>

    <?= Html::submitButton(Yii::t('app', 'Sign in'), ['class' => 'btn btn-success']) ?>

    <?php ActiveForm::end(); ?>
    </div>
</div>

