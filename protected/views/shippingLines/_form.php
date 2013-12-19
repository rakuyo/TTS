<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'shipping-lines-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'name',array('class'=>'span5','maxlength'=>250)); ?>

	<?php echo $form->textAreaRow($model,'description',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'contact',array('class'=>'span5','maxlength'=>200)); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Add' : 'Save',
		)); ?>
<?php echo "&nbsp";
  $this->widget('bootstrap.widgets.TbButton', array('type'=>'inverse','buttonType'=>'link',
    'url'=>Yii::app()->createUrl('shippingLines/admin'),'label'=>'Back'));
?>



</div>

<?php $this->endWidget(); ?>
