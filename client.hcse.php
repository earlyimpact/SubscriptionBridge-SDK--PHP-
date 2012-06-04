<?php
$sbCCPageName="Pass along an encrypted password";
$sbButtonName="";
$sbFormAction="";
?>

<?php include("header.php"); ?>

<?php
$strPassword = "test";
$iv = random(32);
$strMerchantKey = "82F3BB4C92D2412694661E28A8454E69";
$strEncryptedPass = encrypt($strPassword, $strMerchantKey, $iv);
?>
<form action="https://www.subscriptionbridge.net/checkout/TestMerchant5Pr3" method="post">
	<input name="start_page" type="hidden" value="payment" /> 
    <input name="first_name" type="hidden" value="John" />
    <input name="last_name" type="hidden" value="Doe" />
    <input name="company" type="hidden" value="Early Impact, Inc." />
    <input name="email" type="hidden" value="mweber@earlyimpact.com" />
    <input name="reference" type="hidden" value="customerID" />
    <input name="custom" type="hidden" value="woowoowoo" />
    <input name="return_page" type="hidden" value="api/client.hcru.asp" />

    <input name="password" type="hidden" value="<?php echo $iv ?>" />
    <input name="passwordsecure" type="hidden" value="<?php echo $strEncryptedPass ?>" />

	<input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif" alt="PayPal - The safer, easier way to pay online">  
</form>      

<?php include("footer.php"); ?>
