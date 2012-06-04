<?php session_start(); ?>
<?php include("CallerService.php"); ?>
<?php
$sbButtonName="Login";
$sbFormAction="login.php";
$gv_EndPoint_Notifications		= 	"https://www.subscriptionbridge.com/Notifications/Service1.svc";
$gv_EndPoint_Subscriptions		= 	"https://www.subscriptionbridge.com/Subscriptions/Service2.svc";
$gv_EndPoint_Management			= 	"https://www.subscriptionbridge.com/Management/Service3.svc";
$gv_EndPoint_IPN				= 	"https://www.subscriptionbridge.com/Gateway/Service4.svc"; 
$gv_EndPoint_Authentication		=	"https://www.subscriptionbridge.com/Authentication/Service5.svc";
$gv_User="";
$gv_Pass="";
$gv_Key="";
?>

<?php 
If ($_SERVER['CONTENT_LENGTH'] > 0) {

	$strMerchantUsername = $gv_User; 
	$strMerchantPassword = $gv_Pass; 
	$strMerchantKey = $gv_Key; 

	$objSB = new pcARBClass($gv_EndPoint_Notifications, $gv_EndPoint_Subscriptions, $gv_EndPoint_Management, $gv_EndPoint_Authentication);
	
	$result = $objSB->Request("VerifyAccountCredentialsRequest", "VerifyAccountCredentialsRequestXML", $gv_EndPoint_Authentication);

	$pos = strrpos($result, "ERROR");
	if ($pos === false) {					
		$strStatus = 'Success'; 
	} else {				
		$strStatus = 'Error'; 
	}	

	$xml = new SimpleXMLElement($result);
	$IsValid = $xml->IsValid;
	
	//echo $IsValid;
	//exit;

	session_register("IsValidUser");
	if ($IsValid=='True') {			
		$_SESSION['IsValidUser'] = true;
		header("Location: members/index.php");
	} else {
		session_destroy();
		header("Location: login.php?msg=Username or Password is incorrect.");
	}
	?>
	
	
<?php } Else { ?>

	<?php
    if ($_GET["msg"] != '') {
        echo '<div>' . $_GET["msg"] . '</div>';
    }
    ?>
	<table width="100%" border="0" cellpadding="2" cellspacing="2">
	  <form action="<?php echo $sbFormAction ?>" method="post" class="sbForms">
		<tr>
			<td colspan="2"><h2>Login</h2></td>
		</tr> 
		<tr>
			<td class="leftCell" nowrap="nowrap">Email: </td>
			<td><input class="sbInputField"  name="Email" type="text" value=""></td>
		</tr>
		<tr>
			<td class="leftCell" nowrap="nowrap">Password: </td>
			<td><input class="sbInputField"  name="Password" type="text" value=""></td>
		</tr> 
		<tr>
		  <td>&nbsp;</td>
		  <td>&nbsp;</td>
		</tr>
		<tr>
		  <td colspan="2">
				<input type="submit" name="<?php echo $sbButtonName ?>" id="<?php echo $sbButtonName ?>" value="<?php echo $sbButtonName ?>" class="sbSubmitButton">
		  </td>
		</tr>
	  </form>
	</table>
	
<?php } ?>   
