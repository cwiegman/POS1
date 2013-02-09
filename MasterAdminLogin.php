<!--header includes css file / css selectors added to the html-->
<link rel="stylesheet" type="text/css" href="css/style.css" >


<body id="login">
<div class="content">

<?php
session_start();
$adminFormValues = array();
if(isset($_POST['hiddenField_MasterAdmin'])) {
$adminFormValues['hiddenField_MasterAdmin'] = $_POST['hiddenField_MasterAdmin'];
$adminFormValues['LoginID'] = $_POST['LoginID'];
$adminFormValues['Password'] = $_POST['Password'];
//var_dump($_POST);
}

//var_dump($adminFormValues);
if(isset($adminFormValues['hiddenField_MasterAdmin']) && $adminFormValues['hiddenField_MasterAdmin'] == "true") {
	if($adminFormValues['LoginID'] == "MasterAdminPOS" && $adminFormValues['Password'] == "MasterAdmin123") 				     {
		$_SESSION['MasterAdmin_logged'] = true;
	}
	else {
		$login_error = "<p id='error'>Either Password or ID is wrong, please check</p>";
	}
}
if(!isset($_SESSION['MasterAdmin_logged'])) {
?>
  <form action="MasterAdminLogin.php" method="post" name="AdminForm">
    <table width="434" align="center">
      <tr>
        <td align="center"><input name="LoginID" type="text" id="LoginID" value="STAFF ID" size="20" maxlength="20" onFocus="select()"></td>
      </tr>
      <tr>
        <td align="center"><input name="Password" type="password" id="Password" value="PASSWORD" size="20" maxlength="20" onFocus="select()"></td>
      </tr>
      <tr>
        <td align="center"><input id="submit" name="submit" type="submit" maxlength="10">
        <label for="submit" id="submit_btn">submit</label></td>
      </tr>
      <tr>
        <td>  </td>      </td>
        <?php if(isset($login_error))echo $login_error; ?>
      </tr>
    </table>
    <input type="hidden" id="hiddenField_MasterAdmin" name="hiddenField_MasterAdmin" value="true">
  </form>
  <?php
}
else {
	 echo "show inv table";
	  require_once("Connections/local.php");
		mysql_select_db($database_local, $local);

		$query="SELECT * FROM inventory";
		$result=mysql_query($query);
		var_dump($result);

		$num= mysql_num_rows($result);

		mysql_close();

	?>
  <a href="MasterAdminLogin.php?do=logout">Logout</a>
  <table class="Inventory_table">
<tr>
<td>
Item Name
</td>
<td>
Item Code
</td>
<td>
Item desc
</td>
<td>
Item Qty Available
</td>
<td>
Last Updated
</td>
</tr>
<?php
$i=0;
while ($i < $num) {

$field1=mysql_result($result,$i,"Item_nm");
$field2=mysql_result($result,$i,"Item_cd");
$field3=mysql_result($result,$i,"Item_desc");
$field4=mysql_result($result,$i,"inventory_units");
$field5=mysql_result($result,$i,"last_updated_tmsp");

echo "<tr>
<td>$field1</td>
<td>$field2</td>
<td>$field3</td>
<td>$field4</td>
<td>$field5</td>
</tr>";

$i++;
}
?>
</table>
  <?php
}
?>


</div>
</body>
