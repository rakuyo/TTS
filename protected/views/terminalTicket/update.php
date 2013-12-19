<?php
$this->breadcrumbs=array(
	'Terminal Tickets'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TerminalTicket','url'=>array('index')),
	array('label'=>'Create TerminalTicket','url'=>array('create')),
	array('label'=>'View TerminalTicket','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TerminalTicket','url'=>array('admin')),
	);
	?>

	<h1>Update TerminalTicket <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>