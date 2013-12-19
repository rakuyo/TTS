<div class="well side-space">
  <?php $form = $this->beginWidget(
    'bootstrap.widgets.TbActiveForm',
      array(
        'id' => 'fillUp',
        'htmlOptions' => array('class' => ''), // for inset effect
      )
    );
  ?>
 <div>Series Begins At: <input type=text id=series value='<?=$sn?>' class='span3'>&nbsp;<input class='btn btn-primary btn-small' type=button id=setSeries value=Save></div>

   <div id=passengers>
     <?php echo $form->dropDownListRow($shipping,'id',$shipping_lines,array('id'=>'class','class'=>'select','empty'=>''));?><br><br>
     <div id=container1>
     1. <?php echo $form->dropDownList($ptype,'id[]',$ptypesList,array('id'=>'ptype_1','class'=>'select'));?> 
     First Name <input class='span2 fname' id=fname_1 type=text name='Passenger[first_name][]' autocomplete='off'> 
     Last Name  <input class=span2 id=lname_1 type=text name='Passenger[last_name][]'> 
     Age  <input class=span2 id=age_1 type=text name='Passenger[age][]'> 
     <br><br>
     </div>
   </div>
  <br><br>
  <?php $this->widget(
    'bootstrap.widgets.TbButton',
      array('buttonType' => 'submit', 'label' => 'Purchase Ticket' ,'id'=>'buy')
    );
  ?>
  <?php $this->endWidget();?>
  <?php unset($form);?>
 <div class='clearfix'></div>
</div>
<script>
  //$('#buy').attr('disabled','disabled');
  var current = 1;
  $('#fname_'+current).focus();
  $(document).keypress(function (evt) {
    var charCode = evt.charCode || evt.keyCode;
    switch(charCode){
     case 38: $('#class  option:selected').prev().attr('selected', 'selected');return false; //right arrow
     break;
     case 40: $('#class  option:selected').next().attr('selected', 'selected');return false; //right arrow
     break;
     case 39: $('#ptype_'+current+' option:selected').next().attr('selected', 'selected');return false; //right arrow
     break;
     case 37: $('#ptype_'+current+' option:selected').prev().attr('selected', 'selected');return false; //left arrow
     break;
     case 43: addSelect();return false; // + sign
     break;
     case 45: removeSelect();return false; // - sign
     break;
     case 13: $('#buy').focus(); // - enter
     break;
    }
  });
  $('#buy').click(function(){
    if(!parseInt($('#series').val())){
      alert('Series No. is required!');
      return false;
    }
    if(!confirm('<?=Yii::t('app','Are You Sure?')?> ')){
      return false;
    }
  });
  function addSelect(){
    current++;
    var newSelect= $('<div id=container'+current+'>'+current+
     '.<select id="ptype_'+current+'" class="select" name="PassengerType[id][]"><option></option></select>'+
     ' First Name <input class="span2 fname" id=fname_'+current+' type=text name="Passenger[first_name][]">'+
     ' Last Name <input class=span2 id=lname_'+current+' type=text  name="Passenger[last_name][]">'+
     ' Age <input class=span2 id=age_'+current+' type=text  name="Passenger[age][]">'+
     '<br><br></div>');
    newSelect.appendTo("#passengers");
    var options = $('#ptype_1 option').clone();
    $('#ptype_'+current).empty().append(options);
    $('#fname_'+current).focus();
  }
  function removeSelect(){
    if(current >1){
     $('#container'+current).remove();
      current--;
    }
    $('#fname_'+current).focus();
  }
  $('select').change(function(){
     $('#fname_'+current).focus();
  });
  $('#setSeries').click(function(){
    $.post('<?=Yii::app()->controller->createUrl('terminal/seriesNumber')?>',{'value':$('#series').val()},
      function(data){
        if(data.error){
           alert('<?=Yii::t('app','Invalid Series No!')?>');
           $('#series').val(data.value);
        }else{
           alert("<?=Yii::t('app','Series Begins At:')?> "+data.value);
        }
      },
    "json");
     $("input").blur();
  });

  <?php if($tn):?>
 //    var url = '<?=Yii::app()->createUrl('terminalFee/printTicket',array('tn'=>$tn))?>';
  //   window.open(url);
  <?php endif;?>
</script>
