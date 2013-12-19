<?php
$this->breadcrumbs=array(
	'Shipping Lines'=>array('index'),
	$model->name,
);

$this->menu=array(
array('label'=>'List ShippingLines','url'=>array('index')),
array('label'=>'Create ShippingLines','url'=>array('create')),
array('label'=>'Update ShippingLines','url'=>array('update','id'=>$model->id)),
array('label'=>'Delete ShippingLines','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
array('label'=>'Manage ShippingLines','url'=>array('admin')),
);
?>

<h1>View ShippingLines #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
'data'=>$model,
'attributes'=>array(
		'id',
		'name',
		'description',
		'contact',
		'active',
),
)); ?>
