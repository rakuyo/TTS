<div class='span-12'>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'revenue-report',
        'type'=>'inline',
        'htmlOptions'=>array('class'=>'well'),
     )); ?>
    <?php echo $form->dateRangeRow($model, 'date_range',
      array(
        'placement'=>'left',
      ));
    echo $form->dropDownListRow($model,'user',CHtml::listData(User::model()->findAll(),'id','username'),array('empty'=>''));
    $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 'type'=>'primary', 'label'=>'Generate Report'));
    $this->endWidget();
    ?>
</div>
<div class=clearfix></div>
<?php if(count($revs)):?>
<?php $box = $this->beginWidget(
'bootstrap.widgets.TbBox',
array(
'title' => 'SUMMARY',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class' => 'span4'),
'headerButtons' => array(
            array(
                'class' => 'bootstrap.widgets.TbButtonGroup',
                'buttons' => array(
                    array('label' => 'Export','type'=>'success','icon'=>'icon-share', 'htmlOptions'=>array('class'=>'export','data-container'=>'summary'),'url' => '#')
                ),
            ),
        )
    )
);?>
  <?php 
    $rows='';
    $total_rev=0;
    $total_cnt=0;
  ?>
  <?php foreach($revs as $t):?>
  <?php $rows .="<tr>
    <th width=100px>$t[name]</th>
    <th width=100px>$t[cnt]</th>
    <th width=100px>$t[revenue]</th>
    </tr>";
   ?>
  <?php 
    $total_rev+=$t['revenue'];
    $total_cnt+=$t['cnt'];
  ?>
  <?php endforeach;?>
<div id='summary'>
<table>
  <tr>
    <th width=150px>TOTAL REVENUE</th>
    <th width=150px>TOTAL TICKETS</th>
  </tr>
  <tr>
    <th width=150px><?=number_format($total_rev,2)?></th>
    <th width=150px><?=$total_cnt?></th>
  </tr>
</table>
</div>
<?php $this->endWidget()?>
<?php $box = $this->beginWidget(
'bootstrap.widgets.TbBox',
array(
'title' => ' ',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class' => 'bootstrap-widget-table'),
'headerButtons' => array(
            array(
                'class' => 'bootstrap.widgets.TbButtonGroup',
                'buttons' => array(
                    array('label' => 'Export','type'=>'success','icon'=>'icon-share', 'htmlOptions'=>array('class'=>'export','data-container'=>'bdown'),'url' => '#')
                ),
            ),
        )
)
);?>
<div id=bdown>
<table>
  <tr>
    <th width=150px>PASSENGER TYPE</th>
    <th width=150px>TOTAL COUNT</th>
    <th width=150px>REVENUE</th>
  </tr>
  <?=$rows?>
</table>
</div>
<?php $this->endWidget()?>
<?php endif;?>
<script>
 $('.export').click(function(){
    var container = $('#'+$(this).data('container'));
    var np = window.open('');
    np.document.write(container.html());
    np.print();
    np.close();
  });
</script>
