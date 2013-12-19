<?php
$this->breadcrumbs=array(
	'Shipping Lines',
);

$this->menu=array(
array('label'=>'Create ShippingLines','url'=>array('create')),
array('label'=>'Manage ShippingLines','url'=>array('admin')),
);
?>

<h1>Shipping Lines</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
