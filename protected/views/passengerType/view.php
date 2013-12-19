<?php
$this->breadcrumbs=array(
	'Passenger Types'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List PassengerType','url'=>array('index')),
array('label'=>'Create PassengerType','url'=>array('create')),
array('label'=>'Update PassengerType','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete PassengerType','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage PassengerType','url'=>array('admin')),
);
?>

<h1>View PassengerType #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'description',
		'code',
		'fee',
		'active',
),
)); ?>
