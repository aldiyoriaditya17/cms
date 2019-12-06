<?php

/* @var $this \yii\web\View */
/* @var $content string */

use cms\assets\AppAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use common\widgets\Alert;
use yii\bootstrap\ActiveForm;
$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;


$asset = cms\assets\AppAsset::register($this);
$baseUrl = $asset->baseUrl;

?>
<section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image"><br><br>
                        <figure><img src="<?=$baseUrl?>/login/images/telkom.png" alt="sing up image"></figure>
                    </div>

                    <div class="signin-form">
                        <h2 class="form-title">Sign in</h2 >
                       <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>
                       <h5>Username</h5>
                <?= $form->field($model, 'username', ['template' => '
                        <div class="col-sm-12" style="margin-top:15px;">
                            <div class="input-group col-sm-12">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-user"></span>
                                </span>
                                {input}
                            </div>{error}{hint}
                        </div>'])->textInput(['autofocus' => true])
                                ->input('text', ['placeholder'=>'Username']) ?>
                                 <h5>Password</h5>
                <?= $form->field($model, 'password', ['template' => '
                        <div class="col-sm-12" style="margin-top:15px;">
                            <div class="input-group col-sm-12">
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-lock"></span>
                                </span>
                                {input}
                            </div>{error}{hint}
                        </div>'])->passwordInput()
                                ->input('password', ['placeholder'=>'Password'])?>

                <br>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-danger', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
                      
                    </div>
                </div>
            </div>
        </section>