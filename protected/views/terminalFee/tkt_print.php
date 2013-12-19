<style>
  .smallest{font-size:xx-small}
</style>

<?php if(count($tickets)):?>
  <script>
    window.print();
    window.close();
  </script>
  <?php $handle=fopen("/var/www/".Yii::app()->baseUrl."/tickets/test.txt","w");?>
  <?php foreach($tickets as $k=>$v):?>
    <?php 
      if($k)
      echo "<br>";
    ?>
    <center>
    <img src=<?=Yii::app()->baseUrl.'/images/logo.png'?> width=50px /> & PORT SERVICES INC.<br>
    <span class=smallest>Unit 7B Mapfre Asian Corporate Center,Acacia Ave.,</span><br>
    <span class=smallest>Madrigal Business Park,Ayala Alabang,Muntinlupa City</span><br>
    <span class=smallest>Tel. No.:775-0441 Fax No.:807-5670</span><br>
    TICKET NO. <?=CHtml::encode($v->barcode)?><br><br>
    <img src='<?=Yii::app()->createUrl('barcodeGenerator/generateBarcode',array('code'=>$v->barcode))?>'><br>
    TERMINAL FEE P<?=CHtml::encode($v->price_paid)?><br>
    DATE: <?=CHtml::encode($v->date_created)?><br>
    <?=CHtml::encode($v->passengerType->name)?><br><br>
    <center>
    <?php @fwrite($handle,"Unit 7B Mapfre Asian Corporate Center,Acacia Ave.,\n")?>
    <?php @fwrite($handle,"Tel. No.:775-0441 Fax No.:807-5670\n")?>
    <?php @fwrite($handle,"TICKET NO.".CHtml::encode($v->barcode)."\n")?>
    <?php @fwrite($handle,"TERMINAL FEE P".CHtml::encode($v->price_paid)."\n")?>
    <?php @fclose($handle)?>
   <?php # exec("lp -o media=Custom.72x297mm /var/www/".Yii::app()->baseUrl."/tickets/test.pdf");?>
  <?php endforeach;?>
<?php endif;?>
