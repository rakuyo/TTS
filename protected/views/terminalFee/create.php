
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'terminal-fee-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'voyage',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'shipping_lines',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'passenger',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'ticket_no',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'barcode',array('class'=>'span5','maxlength'=>100)); ?>

	<?php echo $form->textFieldRow($model,'passenger_type',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'price_paid',array('class'=>'span5','maxlength'=>20)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'created_by',array('class'=>'span5')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>

<?php $this->endWidget(); ?>
