<style>

.tbl{
        font-size:10px;
        line-height:9px;
}


.tbl td{padding:0.2;
        height:2;
        }
</style>


<div class="span-12">
<?php $box = $this->beginWidget(
'bootstrap.widgets.TbBox',
array(
'title' => 'Report Details',
'headerIcon' => 'icon-th-list',
'htmlOptions' => array('class' => '')
)
);?>
<br>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'outbound-report',
        'method'=>'post',
        'type'=>'inline',
        'htmlOptions'=>array('class'=>''),
     )); ?>
	
    <?php echo $form->dateRangeRow($rf, 'date_range',
      array(
        'placement'=>'left',
        'options' => array('callback'=>'js:function(start, end){
				var st=new Date(start),en=new Date(end),sd,sm,sy,ed,em,ey;

				sd=""+st.getDate();
				sm=""+(st.getMonth()+1);
				sy=st.getFullYear();
				if(sd.length<2) sd="0"+sd;
				if(sm.length<2) sm="0"+sm;
				
				ed=""+en.getDate();
                                em=""+(en.getMonth()+1);
                                ey=en.getFullYear();
                                if(ed.length<2) ed="0"+ed;
                                if(em.length<2) em="0"+em;

				$("#ReportForm_date_range").val("\'"+sy+"-"+""+sm+"-"+sd+"\' AND \'"+ey+"-"+""+em+"-"+ed+"\'") ;
				}')
      ));

    echo $form->dropDownListRow($rf,'user_name',CHtml::listData(User::model()->findAll(),'id','username'),array('empty'=>''));
    $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit',
							'icon'=>'icon-refresh', 
							'type'=>'primary', 
							'label'=>'Generate'));
    $this->endWidget();
 
   ?>
</div>
<br>
<?php $this->endWidget(); ?>

<div class="span-12">
  <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => 'TELLER\'S REPORT',
    'headerIcon' => 'icon-book',
    'htmlOptions' => array('class'=>'')
  ));?>

<?php if(count($result)):?>
  <table class="span5">
    <tr>
      <th>Passenger Type</th>
      <th>Total Count</th>
      <th>Total Amount</th>
    </tr>
    <? $list = array();?>
    <?php die($result);?>
    <? foreach($result as $r):?>
      <? $list[] = $r?>
    <tr>
	<td><?=$r['fname']?></td>
	<td><center><?=$r['count']?></td>
	<td style="text-align:right"><span style="float:left">P </span> <?=number_format($r['count']*$r['fprice'],2)?></td>
	<?php $total=$total+($r['count']*$r['fprice']); ?>
	<?php $totalcount=$totalcount+$r['count'];?>	
    </tr>
    <? endforeach;?>
    <tr>
      <td>Total</td>
      <td><center><?=$totalcount?></td>
      <td style="text-align:right"><span style="float:left">P </span> <?=number_format($total,2)?></td>
    </tr>
  </table>
 
<? $user= User::model()->findByPk($user_name);?>
<? $userFname=ucwords(strtolower($user->profile->firstname)) . '&nbsp' . ucwords(strtolower($user->profile->lastname));?>



<?php
echo "";
/* $this->widget('bootstrap.widgets.TbButton', array('label'=>'Print','type'=>'info','buttonType'=>'button','url'=>Yii::app()->createUrl('/reports/tellersPrint',array('success'=>true)),'icon'=>'icon-print','htmlOptions'=>array('name'=>'print','class'=>'','width'=>'' ,
      'onclick'=>'window.open("'.Yii::app()->createUrl('reports/tellersPrint',array('result'=>$list,
				'totalcount'=>$totalcount,
				'total'=>$total,
				'totalcount'=>$totalcount,
                                'user_name2'=>$userFname,
				'dateRange'=>$rf['date_range'],
				'print'=>1)).'");this.submit();')))
  */  ?>
<?php endif;?>
  <?php $this->endWidget();?>

</div>
