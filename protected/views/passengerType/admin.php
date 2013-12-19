<h1>Passenger Types</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'passenger-type-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
//		'id',
		'name',
		'description',
		'code',
		'fee',
//		'active',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{update}',
),
),
)); ?>

<?php
  $this->widget('bootstrap.widgets.TbButton', array('type'=>'inverse','buttonType'=>'link','icon'=>'plus',
    'url'=>Yii::app()->createUrl('passengerType/create'),'label'=>'Add Passenger Type'));
?>



