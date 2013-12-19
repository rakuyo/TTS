<h1>Shipping Lines</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'shipping-lines-grid',
'dataProvider'=>$model->search(),
'filter'=>$model,
'columns'=>array(
//		'id',
		'name',
		'description',
		'contact',
//		'active',
array(
'class'=>'bootstrap.widgets.TbButtonColumn',
'template'=>'{update}'
),
),
)); ?>

<?php
  $this->widget('bootstrap.widgets.TbButton', array('type'=>'inverse','buttonType'=>'link','icon'=>'plus',
    'url'=>Yii::app()->createUrl('shippingLines/create'),'label'=>'Add Shipping Lines'));
?>
