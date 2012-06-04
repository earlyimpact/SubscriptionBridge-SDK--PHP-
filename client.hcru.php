<?php
$sbCCPageName="Checkout w. Return URL";
$sbButtonName="";
$sbFormAction="";
?>

<?php include("header.php"); ?>

<form action="<?php echo $gv_EndPoint_HC ?>/SimpleEIGTest1" method="post">
	<input name="start_page" type="hidden" value="payment" /> 
    <input name="first_name" type="hidden" value="Matt" />
    <input name="last_name" type="hidden" value="Weber" />
    <input name="company" type="hidden" value="Early Impact, Inc." />
    <input name="email" type="hidden" value="no-reply@subscriptionbridge.com" />
    <input name="reference" type="hidden" value="customerID" />
    <input name="return_page" type="hidden" value="api/client.hcru.asp" />
    
	<input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif" alt="PayPal - The safer, easier way to pay online">  
</form> 
  
<?php

if ($_POST["GUID"]!="") {

	echo "Here are the return values:  " . "<br />";
	
	echo "GUID:  " .$_POST["GUID"] . "<br />";
	echo "Account:  " . $_POST["Account"] . "<br />";
	echo "Email:  " . $_POST["Email"] . "<br />";
	echo "AmountPaid:  " . $_POST["AmountPaid"] . "<br />";
	echo "TransactionID:  " . $_POST["TransactionID"] . "<br />";

}
?>           

<?php include("footer.php"); ?>
