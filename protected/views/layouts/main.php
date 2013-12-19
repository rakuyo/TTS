<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />


	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" />
</head>

<body>

<div class="header">
  <?php

    $this->widget(
      'bootstrap.widgets.TbNavbar',
      array(
        'brand' => 'MPTTS',
        'type'=>'',
        'fixed' => true,
        'fluid'=>true,
        'collapse'=>true,
        'items' => array(
          array(
            'class' => 'bootstrap.widgets.TbMenu',
            'items' => array(
              '...',
              array('label' => 'Dashboard', 'url' => Yii::app()->createUrl('site/index')),
              '...',
              array('label' => 'Terminal Fee', 'url' => Yii::app()->createUrl('terminalFee')),
              '...',
              array('label' => 'Generated Tickets', 'url' => Yii::app()->createUrl('terminalFee/admin')),
              '...',
              array('label' => 'Checkin', 'url' => Yii::app()->createUrl('terminal/checkin')),
              '...',
              array('label' => 'Revenue Report', 'url' => Yii::app()->createUrl('reports/revenue')),
              '...',
            )

          ),
        array(
            'class'=>'bootstrap.widgets.TbMenu',
            'htmlOptions'=>array('class'=>'pull-right'),
            'items'=>array(
                array('icon'=>'icon-off icon-2x','label'=>'Login', 'url'=>array('/user/login'), 'visible'=>Yii::app()->user->isGuest),
                array('icon'=>'icon-user icon-2x','label'=>'('.Yii::app()->user->name.')', 'url'=>'#', 'items'=>array(
                    array('icon'=>'cog','label'=>'SETTINGS'),
                    array('','label'=>'Profile', 'url'=>array('/user/profile')), 
                    array('','label'=>'My Report', 'url'=>array('/reports/account&id='.Yii::app()->user->id)), 
                    array('','label'=>' Users', 'url'=>array('/user/admin')), 
                    array('','label'=>' Rights', 'url'=>array('/rights')), 
                    array('','label'=>'Passenger Type', 'url' =>array('/passengerType/admin')),
                    array('','label'=>'Shipping Lines', 'url' =>array('/shippingLines/admin')),
                    array('icon'=>'off','label'=>'Logout', 'url'=>array('/site/logout')), 
                ),'visible'=>!Yii::app()->user->isGuest ),
            ),
        ),
        )
      )
    );

  ?>
</div>
<div class="container-fluid" id="page">
<?php
  $msgType='';
  if(Yii::app()->user->hasFlash("success"))
   $msgType='success';
  if(Yii::app()->user->hasFlash("error"))
   $msgType='error';
  if(Yii::app()->user->hasFlash("info"))
   $msgType='info';
  if(Yii::app()->user->hasFlash("warning"))
   $msgType='warning';
  $this->widget('bootstrap.widgets.TbAlert', array(
    'block'=>true, // display a larger alert block?
    'fade'=>true, // use transitions?
    'closeText'=>'x', // close link text - if set to false, no close link is displayed
    'alerts'=>array( // configurations per alert type
	    $msgType=>array('block'=>true, 'fade'=>true, 'closeText'=>'x'), // success, info, warning, error or danger
    ),
  ));
?>

  <div class="row-fluid">
    <?php echo $content; ?>
  </div>

	<div class="clearfix"></div>
	<div class="footer">
		<p>&copy; <?php echo date('Y'); ?> Archipelago | Philippine Ferries Corporation.<p/>
		<p>Designed by A-Team.<p/>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
