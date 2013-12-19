<?php
$this->breadcrumbs=array(
	'Terminal Tickets'=>array('index'),
	'Manage',
);

$this->menu=array(
array('label'=>'List TerminalTicket','url'=>array('index')),
array('label'=>'Create TerminalTicket','url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
$('.search-form').toggle();
return false;
});
$('.search-form form').submit(function(){
$.fn.yiiGridView.update('terminal-ticket-grid', {
data: $(this).serialize()
});
return false;
});
");
?>

<h1>Manage Terminal Tickets</h1>


</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'terminal-ticket-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'id',
		'barcode',
		'fee',
		'shipping',
		'first_name',
		'last_name',
		'status',
		/*
		'age',
		'datetime',
		'created_by',
		'voyage_no',
		'ticket_no',
		*/
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
),
),
)); ?>
