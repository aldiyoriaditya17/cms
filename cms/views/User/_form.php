<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-form">
      <div class="col-md-12">
              <div class="card">
                <div class="card-header card-header-primary card-header-icon">
                  <div class="card-icon">
                    <i class="material-icons">assignment</i>
                  </div>
                  <h4 class="card-title">Update Data User</h4>
                </div>
                  <div class="card-body">
                  <div class="toolbar">

    <?php $form = ActiveForm::begin(); 

    ?>


    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
  
    <?= $form->field($model, 'password_hash')->passwordInput(['maxlength' => true]) ?>

  

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
