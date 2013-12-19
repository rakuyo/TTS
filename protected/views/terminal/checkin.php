<?php

$box = $this->beginWidget(
'bootstrap.widgets.TbBox',
array(
'title' => 'Passenger Checkin',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class' => 'bootstrap-widget-table')
)
);
echo '<center>';
$form = $this->beginWidget(
  'bootstrap.widgets.TbActiveForm',
  array(
    'id' => 'checkinForm',
    'type' => 'search',
    'htmlOptions' => array('class' => 'well-small'),
  )
);
  echo $form->textFieldRow($model,'barcode',
    array(
     'class' => 'input-large',
     'prepend' => '<i class="icon-check"></i>'
    )
  );
  $this->widget(
    'bootstrap.widgets.TbButton',
    array('buttonType' => 'submit', 'label' => 'Checkin')
  );
 
$this->endWidget();
unset($form);
echo '</center>';

$this->endWidget();
?>
<script>
  $('input').focus();
</script>
