<?php
$this->breadcrumbs=array(
	'Passenger Types',
);

$this->menu=array(
array('label'=>'Create PassengerType','url'=>array('create')),
array('label'=>'Manage PassengerType','url'=>array('admin')),
);
?>

<h1>Passenger Types</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
