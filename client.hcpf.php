<?php
$sbCCPageName="Pre-fill Checkout Form";
$sbButtonName="";
$sbFormAction="";
?>

<?php include("header.php"); ?>

<form action="<?php echo $gv_EndPoint_HC ?>/SimpleEIGTest1" method="post">
	<input name="start_page" type="hidden" value="payment" /> 
    <input name="first_name" type="hidden" value="John" />
    <input name="last_name" type="hidden" value="Doe" />
    <input name="company" type="hidden" value="Early Impact, Inc." />
    <input name="email" type="hidden" value="no-reply@subscriptionbridge.com" />
    <input name="reference" type="hidden" value="customerID" />
    <input name="password" type="hidden" value="password" />

	<input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif" alt="PayPal - The safer, easier way to pay online">  
</form>      

<?php include("footer.php"); ?>
