<?php
$this->breadcrumbs=array(
	'Passenger Types'=>array('index'),
	$model->name=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List PassengerType','url'=>array('index')),
	array('label'=>'Create PassengerType','url'=>array('create')),
	array('label'=>'View PassengerType','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage PassengerType','url'=>array('admin')),
	);
	?>

	<h1>Update Passenger Type</h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>
