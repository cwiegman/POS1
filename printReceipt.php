<style type="text/css">

body {
  font-family:Tahoma;
}

img {
  border:0;
}

#page {
  width:800px;
  margin:0 auto;
  padding:15px;

}

#logo {
  float:left;
  margin:0;
}

#address {
  height:181px;
  margin-left:250px; 
}

table {
  width:100%;
}

td {
padding:5px;
}

tr.odd {
  background:#e1ffe1;
}

</style>

<script type="javascript/text">
function printReceipt() {
 alert( "DoInit 1" );
element = document.getElementById('dont-print-this-part');
element.style.display = 'none';
}

</script>
<head>
<title> Point Of Sale | Multimedia By Chris | <your company name here></title>
</head>
<?php


//var_dump($_REQUEST);
?>
<div class="dont-print-this-part">
  <h3> <center> Point of Sale Reciept</center> </h3>
</div>
<div class="print-this-part">



<div id="page">
  <div id="logo">
 <?php echo "test logo" ?>
    <a href="http://www.danifer.com/"><img src="http://www.danifer.com/images/invoice_logo.jpg"></a>
  </div><!--end logo-->
  
  <div id="address">

    <p>Jims<br />
    <a href="mailto:youremail@somewhere.com">youremail@somewhere.com</a>
    <br /><br />
    Transaction # xxx<br />
    Created on 2008-10-09<br />
    </p>
  </div><!--end address-->

  <div id="content">
    <p>
      <strong>Customer Details</strong><br />
      Name: Last, First<br />
      Email: customeremail@somewhere.com<br />
      Payment Type: MasterCard    </p>
    <hr>
    <?php
    if(isset($_GET['getReciept']) && !empty($_GET['getReciept'])) {
	$getReciept = $_GET['getReciept'];
	if(isset($getReciept) && $getReciept == 'TBYB') {
	
	?>
	
    <table>
      <tr><td><strong>Description</strong></td><td><strong>Qty</strong></td><td><strong>Unit Price</strong></td><td><strong>Amount</strong></td></tr>
      <tr class="odd"><td>Try Before You Buy</td><td>1</td><td>10.00</td><td>10.00</td></tr>
	 
	  <tr><td>&nbsp;</td><td>&nbsp;</td><td><strong>Total</strong></td><td><strong>10.00</strong></td></tr>

    </table> <?php
	}
}
else {?>
<table>
      <tr><td><strong>Description</strong></td><td><strong>Qty</strong></td><td><strong>Unit Price</strong></td><td><strong>Amount</strong></td></tr>
       <tr class="odd"><td>No of Shooters</td><td><?php echo $_REQUEST['noOfShooters_reciept'];?></td><td></td><td></td></tr>
       <tr class="even"><td>Amount of time</td><td><?php echo $_REQUEST['amtOfTime_reciept'];?></td><td></td><td></td></tr>
        <tr class="odd"><td>Cost of Shooting</td><td></td><td></td><td><?php echo $_REQUEST['shoot_cost_reciept'];?></td></tr>
        
         <tr class="even"><td>Protection Rental Number</td><td><?php echo $_REQUEST['ProtectionRental_receipt'];?></td><td></td><td></td></tr>
       <tr class="odd"><td>Protection Rental cost</td><td></td><td></td><td><?php echo $_REQUEST['ProtectionRental_receipt'];?></td></tr>
       
       
        <tr class="even"><td>Ammo Type</td><td><?php echo $_REQUEST['AmmoType_receipt'];?></td><td></td><td></td></tr>
        <tr class="odd"><td>Ammo Qty</td><td><?php echo $_REQUEST['AmmoQty_receipt'];?></td><td></td><td></td></tr>
       <tr class="even"><td>Amount cost</td><td></td><td></td><td><?php echo $_REQUEST['Ammo_cost_receipt'];?></td></tr>
       
        <tr class="odd"><td>Target Type</td><td><?php echo $_REQUEST['TargetType_receipt'];?></td><td></td><td></td></tr>
        <tr class="even"><td>Target Quantity</td><td><?php echo $_REQUEST['TargetsQty_receipt'];?></td><td></td><td></td></tr>
       <tr class="odd"><td>Target cost</td><td></td><td></td><td><?php echo $_REQUEST['Target_cost_receipt'];?></td></tr>
       
       <tr class="even"><td>Tax</td><td></td><td></td><td><?php echo $_REQUEST['Tax_cost_receipt'];?></td></tr>
       
       
	 
	  <tr><td>&nbsp;</td><td>&nbsp;</td><td><strong>Total</strong></td><td><strong><?php echo $_REQUEST['Grand_Total_cost_receipt'];?></strong></td></tr>
	
<?php }
	?>
    <hr>
    </table>
    <p>
      Thank you for your order!  This transaction will appear on your billing statement as "Your Company".<br />
      If you have any questions, please feel free to contact us at <a href="mailto:youremail@somewhere.com">youremail@somewhere.com</a>.
    </p>

    <hr>
    <p>
      <center><small>This communication is for the exclusive use of the addressee and may contain proprietary, confidential or privileged information. If you are not the intended recipient any use, copying, disclosure, dissemination or distribution is strictly prohibited.
      <br /><br />
      &copy; Your Company All Rights Reserved
      </small></center>
    </p>
  </div><!--end content-->
</div><!--end page-->



</div>
<A HREF="javascript:window.print()">

<IMG SRC="Assets/Images/print_btn.jpg" BORDER="0"</A>