<div class='span-12'>
    <?php $form = $this->beginWidget('bootstrap.widgets.TbActiveForm', array(
        'id'=>'outbound-report',
        'method'=>'post',
        'type'=>'inline',
        'htmlOptions'=>array('class'=>''),
     )); ?>


<?php $box = $this->beginWidget(
'bootstrap.widgets.TbBox',
array(
'title' => 'Report Details',
'headerIcon' => 'icon-book',
'htmlOptions' => array('class' => 'bootstrap-widget-table')
)
);?>
    <table border=0>
    <tr>
    <td>
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
    echo "</td><td>";
    echo $form->dropDownListRow($rf,'shipping',CHtml::listData(ShippingCompanies::model()->findAll(),'id','name'),
			array('empty'=>'','class'=>'span2'));
    echo "</td><td>";
    echo $form->dropDownListRow($rf,'user_name',CHtml::listData(User::model()->findAll(),'id','username'),
			array('empty'=>'','class'=>'span2'));
    echo "</td></tr><tr><td>";

    $this->widget('bootstrap.widgets.TbButton', array('buttonType'=>'submit', 
							'type'=>'primary', 
							'icon'=>'icon-refresh',
							'label'=>'Generate'));
    $this->endWidget();
    ?>
    </tr>
    </td>
    </table>


<?php $this->endWidget(); ?>

</div>
<div class=clearfix></div>

<br>
<?php if(count($result)):?>
  <?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => ' PASSENGER COUNT',
    'headerIcon' => 'icon-user',
    'htmlOptions' => array('class'=>'')
  ));?>
  <table class=span5>
    <tr>
      <th>DATE</th>
      <th>NO. OF PASSENGERS</th>
      
    </tr>
  <?php foreach($result as $r):?>
    <tr>
      <td><?=$r['dt']?></td>
      <td><?=$r['count']?></td>
    </tr>
    
  <?php endforeach;?>
  </table>
  <?php $this->endWidget();?>



<?php $box = $this->beginWidget('bootstrap.widgets.TbBox', array(
    'title' => ' GRAPH',
    'headerIcon' => 'icon-signal',
    'htmlOptions' => array('class'=>'')
  ));?>

    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          	['Date','Revenue'],
		 <?php foreach($result as $r):?>
		['<?=$r['dt']?>',<?=$r['count']?>],
 	
		 <?php endforeach;?>
        	]);

        var options = {
          title: ''
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>

    <div id="chart_div" style="width: 900px; height: 500px;"></div>

 <?php $this->endWidget();?>

 <?php else:?>
  <i class=span>No Result Found</i>
 <?php endif;?>

