<?php

class TerminalController extends Controller{
  public $layout='//layouts/column1';
   public function filters(){
     return array(
       'rights', // perform access control for CRUD operations
     );
   }
  
  public function actionCheckin(){
    $model=new TerminalFee;
    if(isset($_POST['TerminalFee'])){
      $bc = $_POST['TerminalFee']['barcode'];
      $tkt=TerminalFee::model()->findByAttributes(array('barcode'=>$bc));
      if($tkt){
        if($tkt->status==1){
          $tkt->status=2;
          $tkt->checkin_time=new CDbExpression('NOW()');
          $tkt->save();
          Yii::app()->user->setFlash('success', '<center>Check-In Successful!<center>');
        }else{
          Yii::app()->user->setFlash('warning', '<center><b>Ticket is already used!</b><br>Ticket No:'.$tkt->barcode.'<br>Last Checkin: '.$tkt->checkin_time.'<center>');
        }
      }else{
        Yii::app()->user->setFlash('error', '<center>Cannot Find Ticket From Database.. Try Again!<center>');
      }
    }
   $this->render('checkin',compact('model'));
  }
  public function actionEditableSaver($mName){
    Yii::import('bootstrap.widgets.TbEditableSaver');
    $es = new TbEditableSaver($mName);
    $es->update();
  }
    public function actionSeriesNumber(){
       $value=isset($_POST['value']) ? $_POST['value'] :'';
       $series = Counter::model()->findByPk(3);
       $old = $series->value;
       $series->value=$value;
       $error;
       if($series->save()){
         $value = $series->value;
       }else{
         $value = $old;
         $error=1;
       }
       echo json_encode(compact('value','error'));
    }

}

