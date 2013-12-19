<?php

class TerminalFeeController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
   public function filters(){
     return array(
       'rights', // perform access control for CRUD operations
     );
   }
public $layout='//layouts/column1';


/**
* Displays a particular model.
* @param integer $id the ID of the model to be displayed
*/
public function actionView($id)
{
$this->render('view',array(
'model'=>$this->loadModel($id),
));
}

/**
* Creates a new model.
* If creation is successful, the browser will be redirected to the 'view' page.
*/
public function actionCreate()
{
$model=new TerminalFee;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['TerminalFee']))
{
$model->attributes=$_POST['TerminalFee'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->render('create',array(
'model'=>$model,
));
}

/**
* Updates a particular model.
* If update is successful, the browser will be redirected to the 'view' page.
* @param integer $id the ID of the model to be updated
*/
public function actionUpdate($id)
{
$model=$this->loadModel($id);

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['TerminalFee']))
{
$model->attributes=$_POST['TerminalFee'];
if($model->save())
$this->redirect(array('view','id'=>$model->id));
}

$this->render('update',array(
'model'=>$model,
));
}

/**
* Deletes a particular model.
* If deletion is successful, the browser will be redirected to the 'admin' page.
* @param integer $id the ID of the model to be deleted
*/
public function actionDelete($id)
{
if(Yii::app()->request->isPostRequest)
{
// we only allow deletion via POST request
TerminalFee::model()->updateByPk($id,array('status'=>4));
// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
if(!isset($_GET['ajax']))
$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
}
else
throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
}

/**
* Lists all models.
*/
public function actionIndex($tn=null,$ta=null)
{
  $change=array();
  $ta=0;
  $sn = Counter::model()->findByPk(3)->value;
  $model=new TerminalFee;
  $passenger=new Passenger;
  $shipping=new ShippingLines;
  $ptype=new PassengerType;
  $shipping_lines=CHtml::listData(ShippingLines::model()->findAll(array('condition'=>'active=1')),'id','name');
  $ptypes=PassengerType::model()->findAll(array('condition'=>'active=1'));
  $ptypesList=CHtml::listData($ptypes,'id','name');
  $ptypePrice=CHtml::listData($ptypes,'id','fee');
  $ip=$_SERVER['REMOTE_ADDR'];
  $printer=array('192.168.0.252'=>'Epson-TM-T88IV','192.168.0.253'=>'Epson-TM-T88IV-2');
  $bills=array(50,100,200,500,1000);
  if(isset($_POST['Passenger'])){
    $tn=numberGenerator(2);
    foreach($_POST['PassengerType']['id'] as $k=>$v){
      $passenger=new Passenger;
      $passenger->first_name=ucwords($_POST['Passenger']['first_name'][$k]);
      $passenger->last_name=ucwords($_POST['Passenger']['last_name'][$k]);
      $passenger->age=$_POST['Passenger']['age'][$k];
      $passenger->save();
      $tf= new TerminalFee;
      $tf->passenger=$passenger->id;
      $tf->transaction_no=$tn;
      $tf->passenger_type=$v;
      $tf->price_paid=$ptypePrice[$v];
      $tf->series_no= numberGenerator(3,0)-1;
      $tf->barcode=numberGenerator(1);
      $tf->created_by=Yii::app()->user->id;
      $tf->save();
      $ta+=$ptypePrice[$v];

      $file="/var/www/".Yii::app()->baseUrl."/tickets/".$tf->id.".pdf";
      $tkt="
      <style>
        .smallest{font-size:10px}

      </style>
      &nbsp;&nbsp;<img src=/var/www/".Yii::app()->baseUrl."/images/logo.png width=20px align=left /> <br><br><br><br>PHILHARBOR FERRIES<bR>& PORT SERVICES INC.<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=smallest>Unit 5B 5th Floor Unioil Center Bldg.,Commerce Ave.</span><br>
      &nbsp;&nbsp;&nbsp;<span class=smallest> Madrigal Business Park,Ayala Alabang,Muntinlupa City</span><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span class=smallest>Tel. No.:775-0441 Fax No.:807-5670</span><br><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TICKET NO. $tf->barcode<br><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<img src=".Yii::app()->createAbsoluteUrl('barcodeGenerator/generateBarcode',array('code'=>$tf->barcode))."><br><br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;TERMINAL FEE P$tf->price_paid<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;DATE: ".date('Y-m-d g:i:A')."<br>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{$tf->passengerType->name}<br><br><br><br>
      ";
      $html2pdf = Yii::app()->ePdf->HTML2PDF();
      $html2pdf->WriteHTML($tkt);
      $html2pdf->Output($file, EYiiPdf::OUTPUT_TO_FILE);
      exec("lp -o media=Custom.72x297mm -d ".$printer[$ip]." ".$file);
      unlink($file);
    }
        //$this->redirect(array('terminalFee/index','ta'=>$ta,'tn'=>$tn));
  }
  if($ta){
    foreach($bills as $b){
      $change[]= $b.' = '.$this->change($ta,$b);
    }
    Yii::app()->user->setFlash('success', '<center>TOTAL AMOUNT: P'.number_format($ta,2).'<br>'.implode('<br>',$change).'<center>');
  }
  $this->render('index',compact('model','passenger','shipping','ptype','ptypesList','shipping_lines','tn','sn'));
}
  public function actionPrintTicket($tn){
    $tickets=TerminalFee::model()->findAllByAttributes(array('transaction_no'=>$tn));
    $this->renderPartial('tkt_print',compact('tickets'));
  }
/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new TerminalFee('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['TerminalFee']))
$model->attributes=$_GET['TerminalFee'];

$this->render('admin',array(
'model'=>$model,
));
}

/**
* Returns the data model based on the primary key given in the GET variable.
* If the data model is not found, an HTTP exception will be raised.
* @param integer the ID of the model to be loaded
*/
public function loadModel($id)
{
$model=TerminalFee::model()->findByPk($id);
if($model===null)
throw new CHttpException(404,'The requested page does not exist.');
return $model;
}

/**
* Performs the AJAX validation.
* @param CModel the model to be validated
*/
protected function performAjaxValidation($model)
{
if(isset($_POST['ajax']) && $_POST['ajax']==='terminal-fee-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
public function change($ta,$amt){
  return $amt-$ta;
}
}

