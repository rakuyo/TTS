<?php
$this->breadcrumbs=array(
	'Terminal Tickets',
);

$this->menu=array(
array('label'=>'Create TerminalTicket','url'=>array('create')),
array('label'=>'Manage TerminalTicket','url'=>array('admin')),
);
?>

<h1>Terminal Tickets</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
'dataProvider'=>$dataProvider,
'itemView'=>'_view',
)); ?>
