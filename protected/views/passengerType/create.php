<?php
$this->breadcrumbs=array(
	'Passenger Types'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List PassengerType','url'=>array('index')),
array('label'=>'Manage PassengerType','url'=>array('admin')),
);
?>

<h1>Add Passenger Type</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
