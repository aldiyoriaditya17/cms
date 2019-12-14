<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>


<div class="user-form">
      <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-danger card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">create</i>
                  </div>
                  <h4 class="card-title">Form User</h4>
                </div>
                  <div class="card-body">
                  <div class="toolbar">
        <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>
          <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
          <?= $form->field($model, 'email') ?>
          <?= $form->field($model, 'password')->passwordInput() ?>

          <div class="form-group">
              <?= Html::submitButton('Submit', ['class' => 'btn btn-danger', 'name' => 'signup-button']) ?>
          </div>

        <?php ActiveForm::end(); ?>
      </div>  
    </div>
  </div>
</div>  