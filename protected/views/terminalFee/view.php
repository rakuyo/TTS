<?php
$this->breadcrumbs=array(
	'Terminal Fees'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List TerminalFee','url'=>array('index')),
array('label'=>'Create TerminalFee','url'=>array('create')),
array('label'=>'Update TerminalFee','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TerminalFee','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TerminalFee','url'=>array('admin')),
);
?>

<h1>View TerminalFee #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'voyage',
		'shipping_lines',
		'passenger',
		'ticket_no',
		'barcode',
		'passenger_type',
		'price_paid',
		'status',
		'created_by',
),
)); ?>
