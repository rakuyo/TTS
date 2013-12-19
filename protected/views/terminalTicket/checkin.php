<?php

echo "Hello";


?>
<body OnLoad="document.checkin-form.Ticket['barcode'].focus();">


<?php $box = $this->beginWidget(
    'bootstrap.widgets.TbBox',
    array(
    'title' => 'Check In',
    'headerIcon' => 'icon-th-list',
    'htmlOptions' => array('class' => 'bootstrap-widget-table')
    ));
?>

<?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'checkin-form',
        'method'=>'post',
        'type'=>'inline',
        'htmlOptions'=>array('class'=>''),
     )); ?>


<br>
<div>
	Enter Barcode:<input class='span2' id=fname_1 type=text name='Ticket[barcode]' autocomplete='off' tabindex="1">
	
</div>

<div class="form-actions">
        <?php $this->widget('bootstrap.widgets.TbButton', array(
                        'buttonType'=>'submit',
                        'type'=>'primary',
                        'icon'=>'icon-print',
                        'label'=>'Check In',
                )); ?>
</div>

<?php $this->endWidget(); ?>

<?php $this->endWidget(); ?>

</body>
