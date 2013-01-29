<!--header includes css file / css selectors added to the html-->
<link rel="stylesheet" type="text/css" href="css/style.css" >


<body id="login">
<div class="content">

<?php
session_start();
$adminFormValues = array();
if(isset($_POST['hiddenField_admin'])) {
$adminFormValues['hiddenField_admin'] = $_POST['hiddenField_admin'];
$adminFormValues['LoginID'] = $_POST['LoginID'];
$adminFormValues['Password'] = $_POST['Password'];
//var_dump($_POST);
}

//var_dump($adminFormValues);
if(isset($adminFormValues['hiddenField_admin']) && $adminFormValues['hiddenField_admin'] == "true") {
	if($adminFormValues['LoginID'] == "AdminPOS" && $adminFormValues['Password'] == "Admin123") 				     {
		$_SESSION['admin_logged'] = true;
	}
	else {
		$login_error = "<p id='error'>Either Password or ID is wrong, please check</p>";
	}
}
if(!isset($_SESSION['admin_logged'])) {
?>
  <form action="AdminLogin.php" method="post" name="AdminForm">
    <table width="434" align="center">
      <tr>
        <td align="center"><input name="LoginID" type="text" id="LoginID" value="STAFF ID" size="20" maxlength="10" onFocus="select()"></td>
      </tr>
      <tr>
        <td align="center"><input name="Password" type="password" id="Password" value="PASSWORD" size="20" maxlength="10" onFocus="select()"></td>
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
    <input type="hidden" id="hiddenField_admin" name="hiddenField_admin" value="true">
  </form>
  <?php
}
else {?>
  <a href="TransactionBegin.php">Start Transaction</a><br/>
  <a href="AdminLogin.php?do=logout">Logout</a>
  <?php	
}
?>


</div>
</body>
