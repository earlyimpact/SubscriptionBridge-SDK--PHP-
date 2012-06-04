<?php
$sbCCPageName="Subscribe Button";
$sbButtonName="";
$sbFormAction="";
?>

<?php include("header.php"); ?>

<form action="<?php echo $gv_EndPoint_HC ?>/SimpleEIGTest1" method="post">  
	<input type="image" name="submit" border="0" src="https://www.paypal.com/en_US/i/btn/btn_subscribe_LG.gif" alt="PayPal - The safer, easier way to pay online">  
</form>            

<?php include("footer.php"); ?>
