<?php
    /* @var Entry $model */
    /* @var CActiveForm $form */
?>

<?php $form = $this->beginWidget('ActiveForm', array(
    'id'    => 'entry-form',
    'focus' => array($model, 'name'),
)); ?>

    <?php echo $form->hiddenField($model, 'id'); ?>

    <?php echo $form->labelEx($model, 'name'); ?>
    <?php echo $form->textField($model, 'name', array('autocomplete' => 'off')); ?>
    <?php echo $form->error($model, 'name'); ?>

    <?php echo $form->labelEx($model, 'username'); ?>
    <?php echo $form->textField($model, 'username', array('autocomplete' => 'off')); ?>
    <?php echo $form->error($model, 'username'); ?>

    <?php echo $form->labelEx($model, 'password'); ?>
    <div class="row collapse">
        <div class="ten columns">
            <?php echo $form->passwordField($model, 'password', array('autocomplete' => 'off', 'required' => 'required')); ?>
        </div>
        <div class="one columns">
            <span class="postfix button secondary expand copy-to-clipboard" data-clipboard-target="Entry_password" data-clipborad-text="Copy Me!" title="Click to copy me."><i class="foundicon-page"></i></span>
        </div>
        <div class="one columns">
            <span class="postfix button secondary expand show-hide-password"><i class="foundicon-access-eyeball"></i></span>
        </div>
    </div>
    <?php echo $form->error($model, 'password'); ?>

    <?php echo $form->labelEx($model, 'url'); ?>
    <?php echo $form->textField($model, 'url'); ?>
    <?php echo $form->error($model, 'url'); ?>

    <?php echo $form->labelEx($model, 'tagList'); ?>
    <?php echo $form->textField($model, 'tagList', array('placeholder' => 'seperate by commas')); ?>
    <?php echo $form->error($model, 'tagList'); ?>

    <?php echo $form->labelEx($model, 'comment'); ?>
    <?php echo $form->textArea($model, 'comment', array('rows' => 5)); ?>
    <?php echo $form->error($model, 'comment'); ?>

    <?php echo CHtml::submitButton('Save', array('class' => 'button radius'))?>

<?php $this->endWidget(); ?>