<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

		<?php echo $form->textFieldRow($model,'id',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'barcode',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'fee',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'shipping',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'first_name',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'last_name',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'age',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'datetime',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'created_by',array('class'=>'span5')); ?>

		<?php echo $form->textFieldRow($model,'voyage_no',array('class'=>'span5','maxlength'=>100)); ?>

		<?php echo $form->textFieldRow($model,'ticket_no',array('class'=>'span5','maxlength'=>100)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType' => 'submit',
			'type'=>'primary',
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
