<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="istab-form">
    <?php $form = ActiveForm::begin(); ?>
    
    <?=$form->field($model, 'typcod')?>
    <?=$form->field($model, Html::getAttributeName('abbreviate_th'), ['options' => ['class' => 'col-xs-4']])?>
</div>


