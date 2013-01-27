<!--header includes css file / css selectors added to the html-->
<link rel="stylesheet" type="text/css" href="css/style.css" >


<body id="transaction">
<div class="content">

<?php
session_start();
if(isset($_SESSION['admin_logged']) && $_SESSION['admin_logged']== "true") { 
require_once ("config.php");
?>
<script type="text/javascript">

function checkForTryBeforeYouBuy() {
if(document.getElementById('TryBeforeYouBuy_0').checked) {
 //alert("Show transaction finished button and go to print receipt");
 window.location.replace("printReceipt.php?getReciept=TBYB");
}else if(document.getElementById('TryBeforeYouBuy_1').checked) {
  
}
}

function checkForNoOfShooters() {	
	if(document.getElementById('HowManyShooters_0').checked) {		
		document.getElementById('noOfShooters_reciept').innerHTML = 1;
	}else if(document.getElementById('HowManyShooters_1').checked) {
		document.getElementById('noOfShooters_reciept').innerHTML = 2;
	}else if(document.getElementById('HowManyShooters_2').checked) {
		document.getElementById('noOfShooters_reciept').innerHTML = 3;
	}
	
}

function checkForHowLong() {
	if(document.getElementById('HowLongDidTheCustomerShoot_0').checked) {		
		document.getElementById('amtOfTime_reciept').innerHTML = 0.5;
	}else if(document.getElementById('HowLongDidTheCustomerShoot_1').checked) {
		document.getElementById('amtOfTime_reciept').innerHTML = 1;
	}else if(document.getElementById('HowLongDidTheCustomerShoot_2').checked) {
		document.getElementById('amtOfTime_reciept').innerHTML = 1.5;
	}else if(document.getElementById('HowLongDidTheCustomerShoot_3').checked) {
		document.getElementById('amtOfTime_reciept').innerHTML = 2;
	}
}


function checkEarEyeProtection() {
	if(document.getElementById('EarEyeProtection_0').checked) {		
		document.getElementById('ProtectionRental_receipt').innerHTML = 0;
	}else if(document.getElementById('EarEyeProtection_1').checked) {
		document.getElementById('ProtectionRental_receipt').innerHTML = 1;
	}else if(document.getElementById('EarEyeProtection_2').checked) {
		document.getElementById('ProtectionRental_receipt').innerHTML = 2;
	}else if(document.getElementById('EarEyeProtection_3').checked) {
		document.getElementById('ProtectionRental_receipt').innerHTML = 3;
	}
}

function checkForAmmoType() {
	if(document.getElementById('AmmoCaliber_0').checked) {		
		document.getElementById('AmmoType_receipt').innerHTML = '22 LR';
	}else if(document.getElementById('AmmoCaliber_1').checked) {
		document.getElementById('AmmoType_receipt').innerHTML = '40 SW';
	}else if(document.getElementById('AmmoCaliber_2').checked) {
		document.getElementById('AmmoType_receipt').innerHTML = '45 ACP';
	}else if(document.getElementById('AmmoCaliber_3').checked) {
		document.getElementById('AmmoType_receipt').innerHTML = '9 mm';
	}else if(document.getElementById('AmmoCaliber_4').checked) {
		document.getElementById('AmmoType_receipt').innerHTML = 'No Ammo';
		document.getElementById('AmmoBoxes_9').checked = true;
		document.getElementById('AmmoQty_receipt').innerHTML = 0;
	}
}
function checkForAmmoQty() {
	var radios = document.getElementsByName('AmmoBoxes');
for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
		if(document.getElementById('AmmoCaliber_4').checked != true) {       
		document.getElementById('AmmoQty_receipt').innerHTML = radios[i].value;
		}
		else {
			alert("select Ammo Type");
			radios[i].checked= false;
			radios[9].checked = true;
			
		}
    }
}
	
}

function checkForTargetType() {
	
	var radios = document.getElementsByName('TargetType');
for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {       
		document.getElementById('TargetType_receipt').innerHTML = radios[i].value;
		if(radios[i].value == 'None') {
			document.getElementById('Targets_9').checked = true;
			document.getElementById('TargetsQty_receipt').innerHTML = 0;
		}
    }
}
	
}

function checkTargetsQty() {
	var radios = document.getElementsByName('Targets');
for (var i = 0, length = radios.length; i < length; i++) {
    if (radios[i].checked) {
       if(document.getElementById('TargetType_3').checked != true) {
		document.getElementById('TargetsQty_receipt').innerHTML = radios[i].value;
	   }
	   else {
		   alert("select Target Type");
			radios[i].checked= false;
			radios[9].checked = true;
	   }
    }
}
	
}

function CheckCompletion() {
	var NoOfShooters = document.getElementById('noOfShooters_reciept').innerHTML;
	var TimeOfShooting = document.getElementById('amtOfTime_reciept').innerHTML;
	var EarEyeProtection = document.getElementById('ProtectionRental_receipt').innerHTML;
	var AmmoType = document.getElementById('AmmoType_receipt').innerHTML;
	var AmmoQTy = document.getElementById('AmmoQty_receipt').innerHTML;
	var TargetType = document.getElementById('TargetType_receipt').innerHTML;
	var TargetQty = document.getElementById('TargetsQty_receipt').innerHTML;
	
	var AmmoTypeCost = 0.0;
	var TargetTypeCost = 0.0;
	
	if(NoOfShooters == ' ' || TimeOfShooting == ' ' || EarEyeProtection == ' ' || AmmoType == ' ' || AmmoQTy == ' ' || TargetType == ' ' || TargetQty == ' ') {
		document.getElementById('checkForCompletion').innerHTML = "incomplete, check all menus";
		return false;
	}
	else {
		if(NoOfShooters == 1) {
			if(TimeOfShooting == 0.5) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $oneshooter_30min ?>
			}
			if(TimeOfShooting == 1) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $oneshooter_1hour ?>
			}
			if(TimeOfShooting == 1.5) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $oneshooter_1hr30min ?>
			}
			if(TimeOfShooting == 2) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $oneshooter_2hr ?>
			}
		} else if(NoOfShooters == 2) {
			if(TimeOfShooting == 0.5) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $twoshooter_30min ?>
			}
			if(TimeOfShooting == 1) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $twoshooter_1hour ?>
			}
			if(TimeOfShooting == 1.5) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $twoshooter_1hr30min ?>
			}
			if(TimeOfShooting == 2) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $twoshooter_2hr ?>
			}
		}else if(NoOfShooters == 3) {
			if(TimeOfShooting == 0.5) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $threeshooter_30min ?>
			}
			if(TimeOfShooting == 1) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $threeshooter_1hour ?>
			}
			if(TimeOfShooting == 1.5) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $threeshooter_1hr30min ?>
			}
			if(TimeOfShooting == 2) {
				document.getElementById('shoot_cost_reciept').innerHTML = <?php echo $threeshooter_2hr ?>
			}
		}
		if(EarEyeProtection == 1) {
			document.getElementById('ProtectionRental_cost_receipt').innerHTML = <?php echo $protectionRental_oneshooter ?>
		}
		if(EarEyeProtection == 2) {
			document.getElementById('ProtectionRental_cost_receipt').innerHTML = <?php echo $protectionRental_twoshooter ?>
		}
		if(EarEyeProtection == 3) {
			document.getElementById('ProtectionRental_cost_receipt').innerHTML = <?php echo $protectionRental_threeshooter ?>
		}
		if(AmmoType == '22 LR') {
			AmmoTypeCost = <?php echo $Ammo_22LR;?>
			
		}
		if(AmmoType == '40 SW') {
			AmmoTypeCost = <?php echo $Ammo_SW;?>
		}
		if(AmmoType == '45 ACP') {
			AmmoTypeCost = <?php echo $Ammo_45ACP;?>
		}
		if(AmmoType == '9 mm') {
			AmmoTypeCost = <?php echo $Ammo_9mm;?>
		}
		if(AmmoType == 'No Ammo') {
			AmmoTypeCost = <?php echo $No_Ammo;?>
		}
		document.getElementById('Ammo_cost_receipt').innerHTML = AmmoTypeCost * AmmoQTy ;
		if(TargetType == 'Small') {
			TargetTypeCost = <?php echo $target_small;?>
			
		}
		if(TargetType == 'Standard') {
			TargetTypeCost = <?php echo $target_standard;?>
		}
		if(TargetType == 'Premium') {
			TargetTypeCost = <?php echo $target_premium;?>
		}
		if(TargetType == 'None') {
			TargetTypeCost = <?php echo $target_none;?>
		}
		
		document.getElementById('Target_cost_receipt').innerHTML = TargetTypeCost * TargetQty;
		document.getElementById('Tax_cost_receipt').innerHTML = (AmmoTypeCost * AmmoQTy * 0.07) + (TargetTypeCost * TargetQty * 0.07);
		
		document.getElementById('Grand_Total_cost_receipt').innerHTML = parseFloat(document.getElementById('Target_cost_receipt').innerHTML) +parseFloat( document.getElementById('Ammo_cost_receipt').innerHTML) + parseFloat(document.getElementById('ProtectionRental_cost_receipt').innerHTML) + parseFloat(document.getElementById('shoot_cost_reciept').innerHTML) + parseFloat(document.getElementById('Tax_cost_receipt').innerHTML);
		
		 post_to_url
		 document.getElementById('checkForCompletion').innerHTML = "<input type='button' value='get reciept' onclick='post_to_url()'/>"
		<!--document.getElementById('checkForCompletion').innerHTML = "<a href ="+"printReceipt.php"+">Print Reciept</a>";-->
	}
	
	
}
</script>
<script src="SpryAssets/SpryAccordion.js" type="text/javascript"></script>
<link href="SpryAssets/SpryAccordion.css" rel="stylesheet" type="text/css">
<script src="SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css">
<form id="transaction" name="transation" action="TransactionBegin.php" method="post">
<div id="Accordion1" class="Accordion" tabindex="0">
  <div class="AccordionPanel" id="tryBeforeYouBuy1">
    <div class="AccordionPanelTab" id="tryBeforeYouBuy2">Is this Try Before You Buy?</div>
    <div class="AccordionPanelContent" id="tryBeforeYouBuy3">
      <p>
        <label>
          <input type="radio" name="Try Before You Buy" value="Yes" id="TryBeforeYouBuy_0" onClick="checkForTryBeforeYouBuy();">
          Yes</label>
        <br>
        <label>
          <input type="radio" name="Try Before You Buy" value="No" id="TryBeforeYouBuy_1" onClick="checkForTryBeforeYouBuy();">
          No</label>
        <br>
      </p>
    </div>
  </div>
  <div class="AccordionPanel" id="howManyShooters1">
    <div class="AccordionPanelTab" id="howManyShooters2">How Many Shooters</div>
    <div class="AccordionPanelContent" id="howManyShooters3">
      <p>
        <label>
          <input type="radio" name="How Many Shooters" value="1" id="HowManyShooters_0"  onClick="checkForNoOfShooters();">
          One</label>
        <br>
        <label>
          <input type="radio" name="How Many Shooters" value="2" id="HowManyShooters_1" onClick="checkForNoOfShooters();">
          Two</label>
        <br>
        <label>
          <input type="radio" name="How Many Shooters" value="3" id="HowManyShooters_2" onClick="checkForNoOfShooters();">
          Three</label>
        <br>
      </p>
    </div>
 
</div>

<div class="AccordionPanel" id="howLongDidCustomerShoot1">
    <div class="AccordionPanelTab" id="howLongDidCustomerShoot2">How Long Did Customer Shoot</div>
    <div class="AccordionPanelContent" id="howLongDidCustomerShoot3">
   
     
      <p>
        How Long Did Customer Shoot?<br/>
          <label>
            <input type="radio" name="How Long Did The Customer Shoot?" value="30" id="HowLongDidTheCustomerShoot_0" onClick="checkForHowLong();">
            30 min</label>
          <br>
          <label>
            <input type="radio" name="How Long Did The Customer Shoot?" value="60" id="HowLongDidTheCustomerShoot_1" onClick="checkForHowLong();">
            1 hr</label>
          <br>
          <label>
            <input type="radio" name="How Long Did The Customer Shoot?" value="90" id="HowLongDidTheCustomerShoot_2" onClick="checkForHowLong();">
            1.5 hr</label>
          <br>
          <label>
            <input type="radio" name="How Long Did The Customer Shoot?" value="120" id="HowLongDidTheCustomerShoot_3" onClick="checkForHowLong();">
            2 hr</label>
          <br>         
      </p>
      
</div>
    </div>
    
<div class="AccordionPanel" id="EyeEarProtectionRent1">
    <div class="AccordionPanelTab" id="EyeEarProtectionRent2">Did Customer Rent Eye Ear Protection?</div>
    <div class="AccordionPanelContent" id="EyeEarProtectionRent3"> <p>
        <label>
          <input type="radio" name="How Many Shooters" value="0" id="EarEyeProtection_0"  onClick="checkEarEyeProtection();">
          None</label>
        <br>
        <label>
          <input type="radio" name="How Many Shooters" value="1" id="EarEyeProtection_1" onClick="checkEarEyeProtection();">
          One Person</label>
        <br>
        <label>
          <input type="radio" name="How Many Shooters" value="2" id="EarEyeProtection_2" onClick="checkEarEyeProtection();">
          Two Persons</label>
        <br>
        <label>
          <input type="radio" name="How Many Shooters" value="3" id="EarEyeProtection_3" onClick="checkEarEyeProtection();">
          Three Persons</label>
        <br>
</p></div>
    </div>
    
    
      <div class="AccordionPanel" id="AmmoCaliber1">
    <div class="AccordionPanelTab" id="AmmoCaliber2">Ammo Caliber</div>
    <div class="AccordionPanelContent" id="AmmoCaliber3">
      <p>
        <label>
          <input type="radio" name="Ammo Caliber" value="22" id="AmmoCaliber_0" onClick="checkForAmmoType();">
        22 LR</label>
        <br>
        <label>
          <input type="radio" name="Ammo Caliber" value="25" id="AmmoCaliber_1" onClick="checkForAmmoType();">
          40 SW
        </label>
        <br>
        <label>
          <input type="radio" name="Ammo Caliber" value="32" id="AmmoCaliber_2" onClick="checkForAmmoType();">
        45 ACP</label>
        <br>
        <label>
          <input type="radio" name="Ammo Caliber" value="38" id="AmmoCaliber_3" onClick="checkForAmmoType();">
        9 mm</label>
        <br>
        <label>
          <input type="radio" name="Ammo Caliber" value="0" id="AmmoCaliber_4" onClick="checkForAmmoType();">
          No Ammo</label>
        <br>
       
      </p>
    </div>
    </div>
    
    <div class="AccordionPanel" id="AmmoBoxes1">
    <div class="AccordionPanelTab" id="AmmoBoxes2">Ammo Boxes</div>
    <div class="AccordionPanelContent" id="AmmoBoxes3">
      <p>
        <label>
          <input type="radio" name="AmmoBoxes" value="1" id="AmmoBoxes_0" onClick="checkForAmmoQty()">
          1</label>
        <br>
        <label>
          <input type="radio" name="AmmoBoxes" value="2" id="AmmoBoxes_1" onClick="checkForAmmoQty()">
          2</label>
        <br>
        <label>
          <input type="radio" name="AmmoBoxes" value="3" id="AmmoBoxes_2" onClick="checkForAmmoQty()">
          3</label>
        <br>
        <label>
          <input type="radio" name="AmmoBoxes" value="4" id="AmmoBoxes_3" onClick="checkForAmmoQty()">
          4</label>
        <br>
        <label>
          <input type="radio" name="AmmoBoxes" value="5" id="AmmoBoxes_4" onClick="checkForAmmoQty()">
          5</label>
        <br>
        <label>
          <input type="radio" name="AmmoBoxes" value="6" id="AmmoBoxes_5" onClick="checkForAmmoQty()">
          6</label>
        <br>
        <label>
          <input type="radio" name="AmmoBoxes" value="7" id="AmmoBoxes_6" onClick="checkForAmmoQty()">
          7</label>
        <br>
        <label>
          <input type="radio" name="AmmoBoxes" value="8" id="AmmoBoxes_7" onClick="checkForAmmoQty()">
          8</label>
        <br>
        <label>
          <input type="radio" name="AmmoBoxes" value="9" id="AmmoBoxes_8" onClick="checkForAmmoQty()">
          9</label>
        <br>
        <label>
          <input type="radio" name="AmmoBoxes" value="0" id="AmmoBoxes_9" onClick="checkForAmmoQty()">
        None</label>
        <br>
      </p>
    </div>
    </div>
    <div class="AccordionPanel" id="TargetType1">
<div class="AccordionPanelTab" id="TargetType2">Type of Targets?</div>
<div class="AccordionPanelContent" id="TargetType3">
<p>
 <label>
          <input type="radio" name="TargetType" value="Small" id="TargetType_0" onClick="checkForTargetType()">
        Small</label>
        <br>
        <label>
          <input type="radio" name="TargetType" value="Standard" id="TargetType_1" onClick="checkForTargetType()">
         Standard</label>
        <br>
        <label>
          <input type="radio" name="TargetType" value="Premium" id="TargetType_2" onClick="checkForTargetType()">
          Premium</label>
          <br>
          <label>
          <input type="radio" name="TargetType" value="None" id="TargetType_3" onClick="checkForTargetType()">
          None</label>
          </p>

</div>
</div>
     <div class="AccordionPanel" id="HowManyTargets1">
    <div class="AccordionPanelTab" id="HowManyTargets2">How Many Targets?</div>
<div class="AccordionPanelContent" id="HowManyTargets3">How May Targets did Customer Buy? <br/>
  <p>
        <label>
          <input type="radio" name="Targets" value="1" id="Targets_0" onClick="checkTargetsQty()">
          1</label>
        <br>
        <label>
          <input type="radio" name="Targets" value="2" id="Targets_1" onClick="checkTargetsQty()">
          2</label>
        <br>
        <label>
          <input type="radio" name="Targets" value="3" id="Targets_2" onClick="checkTargetsQty()">
          3</label>
        <br>
        <label>
          <input type="radio" name="Targets" value="4" id="Targets_3" onClick="checkTargetsQty()">
          4</label>
        <br>
        <label>
          <input type="radio" name="Targets" value="5" id="Targets_4" onClick="checkTargetsQty()">
          5</label>
        <br>
        <label>
          <input type="radio" name="Targets" value="6" id="Targets_5" onClick="checkTargetsQty()">
          6</label>
        <br>
        <label>
          <input type="radio" name="Targets" value="7" id="Targets_6" onClick="checkTargetsQty()">
          7</label>
        <br>
        <label>
          <input type="radio" name="Targets" value="8" id="Targets_7" onClick="checkTargetsQty()">
          8</label>
        <br>
        <label>
          <input type="radio" name="Targets" value="9" id="Targets_8" onClick="checkTargetsQty()">
          9</label>
        <br>
        <label>
          <input type="radio" name="Targets" value="0" id="Targets_9" onClick="checkTargetsQty()">
          None</label>
        <br>
  </p>
</div>
</div>
<div class="AccordionPanel" id="FinalReciept">
    <div class="AccordionPanelTab" id="RecieptValues">Reciept Values</div>
<div class="AccordionPanelContent" id="RecieptValues_table">
<center><table border="1" width="100%">

<tr>
<th>
Item
</th>
<th>
cost/qty
</th>
</tr>

<tr>
<th>
Number of shooters
</th>
<td>
<div id="noOfShooters_reciept"> </div>
</td>
</tr>

<tr>
<th>
Amount of time (hrs)
</th>
<td>
<div id="amtOfTime_reciept"> </div>
</td>
</tr>

<tr>
<th>
Shooters/Time total cost
</th>
<td>
<div id="shoot_cost_reciept"> </div>
</td>
</tr>

<tr>
<th>
Protection Rental (Number)
</th>
<td>
<div id="ProtectionRental_receipt"> </div>
</td>
</tr>

<tr>
<th>
Protection Rental Total Cost
</th>
<td>
<div id="ProtectionRental_cost_receipt"> </div>
</td>
</tr>

<tr>
<th>
Ammo type
</th>
<td>
<div id="AmmoType_receipt"> </div>
</td>
</tr>

<tr>
<th>
Ammo qty
</th>
<td>
<div id="AmmoQty_receipt"> </div>
</td>
</tr>

<tr>
<th>
Ammo total cost
</th>
<td>
<div id="Ammo_cost_receipt"> </div>
</td>
</tr>

<tr>
<th>
Targets Type
</th>
<td>
<div id="TargetType_receipt"> </div>
</td>
</tr>

<tr>
<th>
Targets Qty
</th>
<td>
<div id="TargetsQty_receipt"> </div>
</td>
</tr>

<tr>
<th>
Targets total cost
</th>
<td>
<div id="Target_cost_receipt"> </div>
</td>
</tr>

<tr>
<th>
Tax
</th>
<td>
<div id="Tax_cost_receipt"> </div>
</td>
</tr>

<tr>
<th>
Grand Total
</th>
<td>
<div id="Grand_Total_cost_receipt"> </div>
</td>
</tr>

<tr>
<th>
<input type="button" value="check for completion" onClick="CheckCompletion()">
</th>
<td>
<div id="checkForCompletion"></div>
</td>
</tr>
</table>  </center>
  </div>
  </div>

<script type="text/javascript">
var Accordion1 = new Spry.Widget.Accordion("Accordion1");
</script>
<?php
} else {
echo "You are not allowed to access this resource. Please Login.<br>" ?>
<a href="AdminLogin.php">Login</a>;
<?php
}
?>
</div>
</body>
</form>

<script type="text/javascript">
function post_to_url() {
	alert("test");
	params = new Array();
	params['noOfShooters_reciept'] = document.getElementById('noOfShooters_reciept').innerHTML;
	
	params['amtOfTime_reciept'] = document.getElementById('amtOfTime_reciept').innerHTML;
	
	params['shoot_cost_reciept'] = document.getElementById('shoot_cost_reciept').innerHTML;
	
	params['ProtectionRental_receipt'] = document.getElementById('ProtectionRental_receipt').innerHTML;
	params['ProtectionRental_cost_receipt'] = document.getElementById('ProtectionRental_cost_receipt').innerHTML;
	params['AmmoType_receipt'] = document.getElementById('AmmoType_receipt').innerHTML;
	
	params['AmmoQty_receipt'] = document.getElementById('AmmoQty_receipt').innerHTML;
	
	params['Ammo_cost_receipt'] = document.getElementById('Ammo_cost_receipt').innerHTML;
	
	params['TargetType_receipt'] = document.getElementById('TargetType_receipt').innerHTML;
	
	params['TargetsQty_receipt'] = document.getElementById('TargetsQty_receipt').innerHTML;
	
	params['Target_cost_receipt'] = document.getElementById('Target_cost_receipt').innerHTML;
	params['Tax_cost_receipt'] = document.getElementById('Tax_cost_receipt').innerHTML;
	params['Grand_Total_cost_receipt'] = document.getElementById('Grand_Total_cost_receipt').innerHTML;
	
	path = 'printReceipt.php';
    method =  "post"; // Set method to post by default, if not specified.

    // The rest of this code assumes you are not using a library.
    // It can be made less wordy if you use one.
    var form = document.createElement("form");
    form.setAttribute("method", method);
    form.setAttribute("action", path);

    for(var key in params) {
        if(params.hasOwnProperty(key)) {
            var hiddenField = document.createElement("input");
            hiddenField.setAttribute("type", "hidden");
            hiddenField.setAttribute("name", key);
            hiddenField.setAttribute("value", params[key]);

            form.appendChild(hiddenField);
         }
    }

    document.body.appendChild(form);
    form.submit();
}
</script>