<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

?>
<div class="row justify-content-center">
    <form class="col-md-8" method="post" action="<?= Url::to('register') ?>">
        <?php $form = ActiveForm::begin(); ?>

        <div class="row d-flex flex-column">

            <div class="col-md-6">
                <div class="form-group">
                    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Введите имя'])->label('Введите имя') ?>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <br>

            <div class="col-md-6">
                <div class="form-group">
                    <?= $form->field($model, 'email')->textInput(['placeholder' => 'Введите эл.почту'])->label('Введите эл.почту') ?>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <br>

            <div class="col-md-6">
                <div class="form-group">
                    <?= $form->field($model, 'password')->textInput(['placeholder' => 'Введите пароль'])->label('Введите пароль') ?>
                    <div class="help-block with-errors"></div>
                </div>
            </div>
            <br>
        </div>

        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        <?php $form = ActiveForm::end(); ?>
    </form>
</div>