  <script>
    window.print();
    window.close();
  </script>
  <style>
    .tbl6 {
      font-size:10px;
    }
    .aright{
      text-align:right;
    }

    .tbl1{
        font-family:"Ubuntu";
        font-size:20;
	}

    .tbl2{
        font-size:15;

	}	

    .tbl3{
        font-size:8;
	}

     .tbl4{
        font-size:22;
	}

    .tbl5{
        font-size:20;
	}

    .tbl td{
        padding:0;
	}

    .center {
	text-align:center;
	}

  </style>
  <body>
	<?php foreach($result as $key=>$b):?>
	<div class="tbl1"><center>PHILHARBOR</center></div>
	<div class="tbl2"><center>Ferries & Port Services INC.</center></div>
	<div class="tbl6">Date:<?php echo date("m-d-Y"); ?></div>
	<div class="tbl6">Shipping:<?php echo ShippingCompanies::model()->findByPk($b['shipping'])->name; ?></div>
	<div class="tbl6">
    		Teller:<?php 
				$uLast=Profile::model()->findByPk($b['created_by'])->lastname;
				$uFirst=Profile::model()->findByPk($b['created_by'])->firstname;
				echo $uLast.",".$uFirst;
			?>
	</div>
	<br>
	<br>
	<div class="tbl1 center">P<?=$b['price_paid']?><br><?php echo Fee::model()->findByPk($b['fee'])->name; ?></div>
	<div class="tbl3 center">
		<img src='<?=Yii::app()->createUrl('barcodeGenerator/generateBarcode',array('code'=>$b['barcode']))?>' >
	</div>
	<br>
	<div class="tbl2 center">Passengers Copy</div>
	 <div class="tbl3 center">Thank you,ride again</div>
	<br>
	<br>
	<div style="border-top:1px dashed black;padding-top:10px"/>
 	 <div class="tbl2 center"><b>Inspector's Copy</b></div>
  	<div class="tbl3 center">
		<img src='<?=Yii::app()->createUrl('barcodeGenerator/generateBarcode',array('code'=>$b['barcode']))?>' >
	</div>
	<div class="tbl6">Date:<?php echo date("m-d-Y"); ?></div>
	<div class="tbl6">Type:<?php echo Fee::model()->findByPk($b['fee'])->name; ?></div>
	<div class="tbl6">Price:<?php echo $b['price_paid']; ?></div>
	<br>
	 <div style="border-top:1px dashed black;padding-top:10px">
	<?php endforeach; ?>
</body>
