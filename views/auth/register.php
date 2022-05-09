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
                    <?= $form->field($model, 'username', ['errorOptions' => ['class' => 'text-danger']])->textInput(['placeholder' => 'Введите имя'])->label('Введите имя') ?>
                </div>
            </div>
            <br>

            <div class="col-md-6">
                <div class="form-group">
                    <?= $form->field($model, 'email', ['errorOptions' => ['class' => 'text-danger']])->textInput(['placeholder' => 'Введите эл.почту'])->label('Введите эл.почту') ?>
                </div>
            </div>
            <br>

            <div class="col-md-6">
                <div class="form-group">
                    <?= $form->field($model, 'password', ['errorOptions' => ['class' => 'text-danger']])->textInput(['placeholder' => 'Введите пароль'])->label('Введите пароль') ?>
                </div>
            </div>
            <br>

            <div class="col-md-6">
                <div class="form-group">
                    <?= $form->field($model, 'password_confirm', ['errorOptions' => ['class' => 'text-danger']])->textInput(['placeholder' => 'Повторите пароль'])->label('Повторите пароль') ?>
                </div>
            </div>
            <br>
        </div>

        <?= Html::submitButton('Отправить', ['class' => 'btn btn-success']) ?>
        <?php $form = ActiveForm::end(); ?>
    </form>
</div>