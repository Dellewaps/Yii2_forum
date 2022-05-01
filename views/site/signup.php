<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;;

//$this->titel = 'Registre';
?>
<div class="site-signup">
<h1 class="display-4">Registre</h1>

    <p>venligst udfyld alle felter for at Registre:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput() ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="form-group">
                    <?= Html::submitButton('Signup', ['class' => 'bnt bnt-primary', 'name'  => 'signup-button']) ?>
                </div>

                <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>