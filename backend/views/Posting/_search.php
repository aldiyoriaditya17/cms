<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\PostingSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="posting-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id_posting') ?>

    <?= $form->field($model, 'id_group') ?>

    <?= $form->field($model, 'group_name') ?>

    <?= $form->field($model, 'owner_id') ?>

    <?= $form->field($model, 'owner_name') ?>

    <?php // echo $form->field($model, 'caption') ?>

    <?php // echo $form->field($model, 'url_content') ?>

    <?php // echo $form->field($model, 'thumnail_content') ?>

    <?php // echo $form->field($model, 'text') ?>

    <?php // echo $form->field($model, 'active') ?>

    <?php // echo $form->field($model, 'views_count') ?>

    <?php // echo $form->field($model, 'like_count') ?>

    <?php // echo $form->field($model, 'comment_count') ?>

    <?php // echo $form->field($model, 'type_posting') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <?php // echo $form->field($model, 'deleted_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
