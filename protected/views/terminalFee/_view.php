<div class="view">

		<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('voyage')); ?>:</b>
	<?php echo CHtml::encode($data->voyage); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('shipping_lines')); ?>:</b>
	<?php echo CHtml::encode($data->shipping_lines); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passenger')); ?>:</b>
	<?php echo CHtml::encode($data->passenger); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('ticket_no')); ?>:</b>
	<?php echo CHtml::encode($data->ticket_no); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('barcode')); ?>:</b>
	<?php echo CHtml::encode($data->barcode); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('passenger_type')); ?>:</b>
	<?php echo CHtml::encode($data->passenger_type); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('price_paid')); ?>:</b>
	<?php echo CHtml::encode($data->price_paid); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('created_by')); ?>:</b>
	<?php echo CHtml::encode($data->created_by); ?>
	<br />

	*/ ?>

</div>