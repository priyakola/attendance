<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;


/* @var $this yii\web\View */

$this->title = 'Clock In/Out';
?>

<center>
<?php if(Yii::$app->session->hasFlash('user')): ?>
        <div class="alert alert-success" role="alert">
            <?= Yii::$app->session->getFlash('user') ?>
        </div>
    <?php endif; ?>
<?php 
if(date("H")>=06 && date("H")<=13) 

{ ?>
<div>

    <?php $form = ActiveForm::begin(); ?>

    <div class = "hideme"><?= $form->field($model, 'description')->textInput(['maxlength' => true, 'value' => '-',]) ?></div>
    <div class="form-group">
        
        <?= Html::submitButton('Clock-In', ['class' => 'btnhuge btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php } else { 
    ?>
<div>

    <?php $form = ActiveForm::begin(); ?>

    <div class = "hideme">
    <?= $form->field($model, 'type')->textInput(['maxlength' => true, 'value' => 'Clock-Out',]) ?>
    </div>

    <div class="form-group">
            <?= $form->field($model, 'description')->textArea(['rows' => '6'])->hint('Please describe what were you doing today!') ?>
        <?= Html::submitButton('Clock-Out', ['class' => 'btnhuge btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
<?php } 
?>
</center>

