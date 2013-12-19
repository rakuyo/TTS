<?php
$this->breadcrumbs=array(
	'Terminal Tickets'=>array('index'),
	$model->id,
);

$this->menu=array(
array('label'=>'List TerminalTicket','url'=>array('index')),
array('label'=>'Create TerminalTicket','url'=>array('create')),
array('label'=>'Update TerminalTicket','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete TerminalTicket','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage TerminalTicket','url'=>array('admin')),
);
?>

<h1>View TerminalTicket #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'barcode',
		'fee',
		'shipping',
		'first_name',
		'last_name',
		'age',
		'datetime',
		'created_by',
		'voyage_no',
		'ticket_no',
),
)); ?>
