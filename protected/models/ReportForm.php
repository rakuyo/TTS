<?php
  class ReportForm extends CFormModel{
    public $date_range; 
    public $shipping;	//bus
    public $user;
    public function rules(){
       return array( 
         array('date_trip,date_range,user_name','length','max'=>255),
	 array('user,shipping', 'numerical', 'integerOnly'=>true),
       );
    }
    public function attributeLabels(){
      return array(
        'date_range' => 'Date Range',
        'user' => 'Teller',
	'shipping'=>'Shipping'
      );
    }
  }
?>
