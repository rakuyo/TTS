<?php
$this->breadcrumbs=array(
	'Shipping Lines'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List ShippingLines','url'=>array('index')),
	array('label'=>'Create ShippingLines','url'=>array('create')),
	array('label'=>'View ShippingLines','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage ShippingLines','url'=>array('admin')),
	);
	?>

	<h1>Update Shipping Lines</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
