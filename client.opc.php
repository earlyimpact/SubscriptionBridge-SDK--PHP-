<?php
$sbCCPageName="Subscribe Button (OPC)";
$sbButtonName="";
$sbFormAction="";
?>

<?php include("header.php"); ?>

<form action="<?php echo $gv_EndPoint_HC ?>/SBMerchantAcc" method="post">  
	<input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif" alt="PayPal - The safer, easier way to pay online">  
</form>             

<?php include("footer.php"); ?>
