<?php
 class ReportsController extends Controller{
    
   public function filters(){
     return array(
       'rights', // perform access control for CRUD operations
     );
   }
    public function actionAccount($id,$date=null){
      $date=$date?$date:'CURDATE()';
      $tkts=array();
      $sql="
        SELECT id,name ,
        (SELECT count(*) FROM `terminal_fee` WHERE DATE(date_created)=$date  AND passenger_type=p.id   AND created_by=$id AND status <4) cnt,
        (SELECT IFNULL(SUM(price_paid),0) FROM `terminal_fee` WHERE DATE(date_created)=$date  AND passenger_type=p.id   AND created_by=$id AND status<4) revenue
        FROM passenger_type p
      ";
      $tkts=Yii::app()->db->createCommand($sql)->queryAll();
      
      $this->render('account',compact('tkts'));
    }
    public function actionRevenue(){
      $d1=date('Y-m-d');
      $d2=date('Y-m-d');
      $user='';
      if(isset($_POST['ReportForm']['date_range'])){
        $dr = split('-',$_POST['ReportForm']['date_range']);
        if(isset($dr[0]) && isset($dr[1])){
          $d1=date('Y-m-d',strtotime($dr[0]));
          $d2=date('Y-m-d',strtotime($dr[1]));
        }
        $user=($_POST['ReportForm']['user'])?" AND created_by = {$_POST['ReportForm']['user']} ":'';
      }
      $date_range="BETWEEN '$d1' AND '$d2 23:59:59'";
      $revs=array();
      $model=new ReportForm;
      $sql="
        SELECT id,name ,
        (SELECT count(*) FROM `terminal_fee` WHERE DATE(date_created) $date_range  AND passenger_type=p.id  $user  AND status <4) cnt,
        (SELECT IFNULL(SUM(price_paid),0) FROM `terminal_fee` WHERE DATE(date_created) $date_range  AND passenger_type=p.id $user AND status<4) revenue
        FROM passenger_type p
      ";
      $revs=Yii::app()->db->createCommand($sql)->queryAll();
      
      $this->render('revenue',compact('revs','model'));
    }
 }
