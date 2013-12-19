<?php
$this->breadcrumbs=array(
	'Shipping Lines'=>array('index'),
	'Create',
);

$this->menu=array(
array('label'=>'List ShippingLines','url'=>array('index')),
array('label'=>'Manage ShippingLines','url'=>array('admin')),
);
?>

<h1>Add Shipping Lines</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
