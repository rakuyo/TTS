<?php

class TerminalTicketController extends Controller
{
/**
* @var string the default layout for the views. Defaults to '//layouts/column2', meaning
* using two-column layout. See 'protected/views/layouts/column2.php'.
*/
public $layout='//layouts/column1';

/**
* @return array action filters
*/
public function filters()
{
return array(
'rights', // perform access control for CRUD operations
);
}

/**
* Specifies the access control rules.
* This method is used by the 'accessControl' filter.
* @return array access control rules

public function accessRules()
{
return array(
array('allow',  // allow all users to perform 'index' and 'view' actions
'actions'=>array('index','view'),
'users'=>array('*'),
),
array('allow', // allow authenticated user to perform 'create' and 'update' actions
'actions'=>array('create','update'),
'users'=>array('@'),
),
array('allow', // allow admin user to perform 'admin' and 'delete' actions
'actions'=>array('admin','delete','tkt_print','checkin'),
'users'=>array('admin'),
),
array('deny',  // deny all users
'users'=>array('*'),
),
);
}

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
public function actionCreate($batch_no=null)
{
$model=new TerminalTicket;
$fee=new Fee;

// Uncomment the following line if AJAX validation is needed
// $this->performAjaxValidation($model);

if(isset($_POST['Passenger']))
{
$n=count($_POST['Passenger']['first_name']);
$bn=numberGenerator(2);

for($c=0;$c<$n;$c++){
	$terminalTicket=new TerminalTicket;
	$paid=Fee::model()->findByPk($_POST['Passenger']['fee'][$c])->price;
	$terminalTicket->fee=$_POST['Passenger']['fee'][$c];
	$terminalTicket->price_paid=$paid;
	$terminalTicket->first_name= $_POST['Passenger']['first_name'][$c];
	$terminalTicket->last_name=$_POST['Passenger']['last_name'][$c];
	$terminalTicket->age=$_POST['Passenger']['age'][$c];
	$terminalTicket->shipping=$_POST['shipping'];
	$terminalTicket->datetime=$_POST['datetime'];
	$terminalTicket->created_by=Yii::app()->user->id;
	$terminalTicket->barcode=numberGenerator(1);
	$terminalTicket->batch_no=$bn;
	$terminalTicket->save();
}

	Yii::app()->user->setFlash('success', '<center>'.Yii::t('app','notice.success.ticket.create').'Test'.'<center>');
        $this->redirect(array('create','bn'=>$bn));


}

$this->render('create',array(
'model'=>$model,
'fee'=>$fee,
));
}

public function actionTkt_print(){

$bn=$_GET['bn'];

$sql="SELECT * FROM terminal_ticket WHERE batch_no='".$bn."'";
$result=Yii::app()->db->createCommand($sql)->queryAll();
//die(print_r($result));


$this->renderPartial('tkt_print',array('result'=>$result));
}

public function actionCheckin(){

if(isset($_POST['Ticket'])){
TerminalTicket::model()->updateAll(array('status'=>2),"barcode='".$_POST['Ticket']['barcode']."'");

}
$this->render('checkin');
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

if(isset($_POST['TerminalTicket']))
{
$model->attributes=$_POST['TerminalTicket'];
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
$this->loadModel($id)->delete();

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
public function actionIndex()
{
$dataProvider=new CActiveDataProvider('TerminalTicket');
$this->render('index',array(
'dataProvider'=>$dataProvider,
));
}

/**
* Manages all models.
*/
public function actionAdmin()
{
$model=new TerminalTicket('search');
$model->unsetAttributes();  // clear any default values
if(isset($_GET['TerminalTicket']))
$model->attributes=$_GET['TerminalTicket'];

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
$model=TerminalTicket::model()->findByPk($id);
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
if(isset($_POST['ajax']) && $_POST['ajax']==='terminal-ticket-form')
{
echo CActiveForm::validate($model);
Yii::app()->end();
}
}
}
