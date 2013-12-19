<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'terminal-ticket-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php 
                $fee=CHtml::listData(Fee::model()->findAll(),'id','name');
                $shipping=CHtml::listData(ShippingCompanies::model()->findAll(),'id','name');
		$date = date('Y-m-d h:i:s a', time());
		$createdBy=Yii::app()->user->id;
        ?>  


<?php echo $form->errorSummary($model); ?>
<div id=passenger>
 <?php echo $form->dropDownListRow($model,'shipping',$shipping,array('class'=>'select','id'=>'sc'));?><br><br>
	<div id=container1>
	1.<?php echo $form->dropDownList($model,'fee',$fee,array('class'=>'select','id'=>'fee_1'));?>
	FirstName <?php echo $form->textField($model,'first_name',array('class'=>'span2','maxlength'=>100)); ?>
	LastName <?php echo $form->textField($model,'last_name',array('class'=>'span2','maxlength'=>100)); ?>
	Age <?php echo $form->textField($model,'age',array('class'=>'span1')); ?>
	<?php echo $form->hiddenField($model,'barcode',array('class'=>'span2','maxlength'=>100)); ?>
	</div>
	<?php echo $form->hiddenField($model,'datetime',array('class'=>'span2','value'=>$date)); ?>
	<?php echo $form->hiddenField($model,'created_by',array('class'=>'span2','value'=>$createdBy)); ?>
</div>
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
     case 112: $('#fee').val(2); //f1
     break;
     case 113: $('#fee').val(1); //f2
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
     '.<select id="fee_'+current+'" class="select" name="fee"><option></option></select>'+
     ' <?echo 'FirstName'?> <input class="span2 id=fname_'+current+' type=text name="first_name">'+
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

