<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'terminal-ticket-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">F1 = Premium Economy F2 = Business Class
<br>Use left and right arrow to switch between fare types
<br>Use +/- sign to add/remove passenger.</p>

	<?php 
                $fee=CHtml::listData(Fee::model()->findAll(),'id','name');
                $shipping=CHtml::listData(ShippingCompanies::model()->findAll(),'id','name');
		$date = date('Y-m-d h:i:s a', time());
        ?>  


<?php echo $form->errorSummary($model); ?>
<div id=passenger>
 <?php echo $form->dropDownListRow($model,'shipping',$shipping,array('class'=>'select','id'=>'sc','name'=>'shipping'));?><br><br>
	<div id=container1>
	1. <?php echo $form->dropDownList($model,'fee',$fee,array('id'=>'fee_1','class'=>'select','name'=>'Passenger[fee][]'));?>
      	   FirstName<input class='span2 fname' id=fname_1 type=text name='Passenger[first_name][]' autocomplete='off'>
      	   LastName<input class=span2 id=lname_1 type=text name='Passenger[last_name][]'>
      	   Age <input class=span1 id=age_1 type=text name='Passenger[age][]'>
	</div>
</div>

<?php echo $form->hiddenField($model,'datetime',array('class'=>'span2','value'=>$date,'name'=>'datetime')); ?>

<div class="form-actions">
	<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
</div>


<?php $this->endWidget(); ?>

<script>
  var current = 1;
  $(document).keypress(function (evt) {
    var charCode = evt.charCode || evt.keyCode;
    switch(charCode){
     case 112: $('#fee_'+current).val(2); //f1
     break;
     case 113: $('#fee_'+current).val(1); //f2
     break;
     case 39: $('#sc option:selected').next().attr('selected', 'selected');return false; //right arrow39
     break;
     case 37: $('#sc option:selected').prev().attr('selected', 'selected');return false;//left arrow37
     break;
     case 43: addSelect(); // + sign43
     break;
     case 45: removeSelect(); // - sign45
     break;
     case 13: if(confirm('Are you sure?'))$('#buy').click(); // - sign
     break;
    }
  });


function addSelect(){
    current++;
    var newSelect= $('<div id=container'+current+'>'+current+
     '.<select id="fee_'+current+'" class="select" name="Passenger[fee][]"><option></option></select>'+
     ' <?echo 'FirstName'?> <input class="span2" id=fname_'+current+' type=text name="Passenger[first_name][]">'+
     ' <?echo 'LastName';?> <input class=span2 id=lname_'+current+' type=text  name="Passenger[last_name][]">'+
     ' <?echo 'Age';?> <input class=span1 id=age_'+current+' type=text  name="Passenger[age][]">'+
     '<br></div>');
    newSelect.appendTo("#passenger");
    var options = $('#fee_1 option').clone();
    $('#fee_'+current).empty().append(options);
    $('#fname_'+current).focus();
  }

function removeSelect(){
    if(current >1){
     $('#container'+current).remove();
      current--;
    }
    $('#fname_'+current).focus();
  }

</script>

