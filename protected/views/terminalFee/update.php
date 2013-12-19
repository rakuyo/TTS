<?php
$this->breadcrumbs=array(
	'Terminal Fees'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

	$this->menu=array(
	array('label'=>'List TerminalFee','url'=>array('index')),
	array('label'=>'Create TerminalFee','url'=>array('create')),
	array('label'=>'View TerminalFee','url'=>array('view','id'=>$model->id)),
	array('label'=>'Manage TerminalFee','url'=>array('admin')),
	);
	?>

	<h1>Update TerminalFee <?php echo $model->id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>