<head>
<link rel="stylesheet" type="text/css" href="css/style.css" >
<link href="css/print.css" rel="stylesheet" type="text/css">
<link href='http://fonts.googleapis.com/css?family=Fjalla+One' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Raleway:400,200,900' rel='stylesheet' type='text/css'>


<!-- depreciated via print.css

<script type="javascript/text">
function printReceipt() {
 alert( "DoInit 1" );
element = document.getElementById('dont-print');
element.style.display = 'none';
}-->

</script>
<title>Point Of Sale  |  Multimedia By Chris  |  Jims' Shooting Range
</title>
</head>
<body>
<?php
require_once("Connections/local.php");

$local = $GLOBALS['local'];
		if(!$local) {
			
		}
		else {
			
			if(isset($_POST['AmmoType_receipt']) && isset($_POST['AmmoQty_receipt'])) {
			$ammo_type = $_POST['AmmoType_receipt'];
			$ammo_qty = $_POST['AmmoQty_receipt'];
			$target_type = $_POST['TargetType_receipt'];
			$target_qty = $_POST['TargetsQty_receipt'];
		
		
			mysql_select_db($database_local, $local);
			$sql1 = "UPDATE inventory SET inventory_units=inventory_units-$ammo_qty
WHERE Item_cd='".$ammo_type ."'";

			$result1 = mysql_query( $sql1 );
			
			$sql2 = "UPDATE inventory SET inventory_units=inventory_units-$target_qty
WHERE Item_cd='".$target_type ."'";

			$result2 = mysql_query( $sql2 );

			
			}
		}

//var_dump($_REQUEST);
?>
<div class="dont-print">
  <h3>
    <center>
      Point of Sale Receipt
    </center>
  </h3>
</div>
<div class="print-this-part">



<div id="page">
 
    <div id="logo"> <a href="http://www.jimsgunwarehouse.com/"><img src="Assets/Images/invoice_logo.jpg" width="50%"></a> </div>
    <!--end logo-->
    
    <div id="transaction">
      <table width="258" border="0" align="center" cellpadding="4">
        <tr>
          <td width="32%" align="center" valign="top">Receipt
          <div id="transaction_number"> 123</div></td>
          <td align="center" valign="top"><?php echo(date('m / d')); echo("<br />");
          		echo(date(Y)); ?>
<p class="time">
            <?php echo(date("H:i A")) ;?></p>
            </p></td>
          <td width="32%" align="center" valign="top"><p>Clerk</p>
          <p id="user">user</p></td>
        </tr>
      </table>
    </div>
  
  <div id="address">

    <p>    Transaction # xxx<br />
    Created on 2008-10-09<br />
    </p>
  </div><!--end address-->

  <div id="content">
    <hr>
    <?php
    if(isset($_GET['getReciept']) && !empty($_GET['getReciept'])) {
	$getReciept = $_GET['getReciept'];
	if(isset($getReciept) && $getReciept == 'TBYB') {
	
	?>
	
    <table>
      <tr><td><strong>Description</strong></td><td><strong>Qty</strong></td><td><strong>Amount</strong></td></tr>
      <tr class="odd"><td>Try Before You Buy</td><td>1</td><td>10.00</td></tr>
	 
	  <tr><td>&nbsp;</td><td>&nbsp;</td><td><strong>10.00</strong></td></tr>

    </table> <?php
	}
}
else {?>
<table cellpadding="8" cellspacing="0">
      <tr><td><strong>Description</strong></td><td><strong>Qty</strong></td><td><strong>Amount</strong></td></tr>
       <tr class="odd">
        <td>No of Shooters: <?php echo $_REQUEST['noOfShooters_reciept'];?></td><td><?php echo $_REQUEST['amtOfTime_reciept'];?></td><td><?php echo $_REQUEST['shoot_cost_reciept'];?></td></tr>
        
         <tr class="even"><td>Protection Rental Number</td><td><?php echo $_REQUEST['ProtectionRental_receipt'];?></td><td><?php echo $_REQUEST['ProtectionRental_receipt'];?></td></tr>
       <tr class="odd"><td>Protection Rental cost</td><td></td><td>&nbsp;</td></tr>
       
       
        <tr class="even">
        <td>Ammo Type <?php echo $_REQUEST['AmmoType_receipt'];?></td><td><?php echo $_REQUEST['AmmoQty_receipt'];?></td><td><?php echo $_REQUEST['Ammo_cost_receipt'];?></td></tr>
       
        <tr class="odd"><td>Target Type<?php echo $_REQUEST['TargetType_receipt'];?></td><td><?php echo $_REQUEST['TargetsQty_receipt'];?></td><td><?php echo $_REQUEST['Target_cost_receipt'];?></td></tr>
       
       <tr class="even"><td>Tax</td><td></td><td><?php echo $_REQUEST['Tax_cost_receipt'];?></td></tr>
       
       
	 
	  <tr>
	    <td bgcolor="#000000" style="color: #FFF"><strong>TOTAL</strong></td><td bgcolor="#000000" style="color: #FFF">&nbsp;</td><td bgcolor="#000000" style="color: #FFF"><strong><?php echo $_REQUEST['Grand_Total_cost_receipt'];?></strong></td></tr>
	
<?php }
	?>
    <hr>
    </table>
   
  </div><!--end content-->
</div><!--end page-->

  </div>


</div>
<A HREF="javascript:window.print()" id="print">Print</a></A>
<?php include 'Assets/navigation.php'; ?>
</body>
