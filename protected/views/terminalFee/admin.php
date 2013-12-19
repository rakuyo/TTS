<h1>Tickets</h1>
<?php $ptype=CHtml::listData(PassengerType::model()->findAll(),'id','name');?>
<?php $status=CHtml::listData(Status::model()->findAll(),'id','name');?>
<div class="search-form" style="display:none">
	<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'terminal-fee-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
		'barcode',
  array('name'=>'passenger0.first_name',
    'class' => 'bootstrap.widgets.TbEditableColumn',
    'editable' => array(
      'url' => $this->createUrl('terminal/editableSaver',array('mName'=>'Passenger')),
      'placement' => 'right',
      'inputclass' => 'span12'
    )
  ),
  array('name'=>'passenger0.last_name',
    'class' => 'bootstrap.widgets.TbEditableColumn',
    'editable' => array(
      'url' => $this->createUrl('terminal/editableSaver',array('mName'=>'Passenger')),
      'placement' => 'right',
      'inputclass' => 'span12'
    )
  ),
  array('name'=>'passenger0.age',
    'class' => 'bootstrap.widgets.TbEditableColumn',
    'editable' => array(
      'url' => $this->createUrl('terminal/editableSaver',array('mName'=>'Passenger')),
      'placement' => 'right',
      'inputclass' => 'span3'
    )
  ),
                array('name'=>'passenger_type','value'=>'$data->passengerType->name','filter'=>$ptype),
		'price_paid',
                array('name'=>'status','value'=>'$data->status0->name','filter'=>$status),
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
      'template'=>'{delete}',
),
),
)); ?>
