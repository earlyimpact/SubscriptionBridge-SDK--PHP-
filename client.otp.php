<?php
$sbCCPageName="Onetime Payment";
$sbButtonName="";
$sbFormAction="";
?>

<?php include("header.php"); ?>

    <?php
        $var_ReturnURL = "http://localhost/testStores/v4.5.1/sb/example/onetimepayment.asp";
        $var_Amount = "10.00";
        $var_APIKey = "8699D8F7EFD640CB8ECD9C4EBAA871D9";
		$var_Signature = hash_hmac('sha1', $var_Amount.'|'.$var_ReturnURL, $var_APIKey);	
    ?>
    <script type="text/javascript" language="javascript">
        var _noconflict = 0;
        var SubscriptionBridge = function () {
            if (_noconflict == 0) {

                var Transaction = new OnetimePayment();
                Transaction.URL = "http://www.subscriptionbridge.com/v2/OnetimePayment";
                Transaction.ID = "mydiv";
                Transaction.Guid = "TDUTUT2920126648";
                Transaction.Description = 'Extra Bandwith';
                Transaction.Amount = '<?php echo $var_Amount ?>';
                Transaction.Currency = 'EUR';
                Transaction.Language = 'en';
                Transaction.ReturnURL = '<?php echo $var_ReturnURL ?>';
                Transaction.Signature = '<?php echo $var_Signature ?>';
                Transaction.IsProrated = 'True';
                Transaction.IsRecurring = 'True';
                Transaction.PassThrough = 'val,val2,val3,val4';

                Transaction.Open();
            }
            _noconflict = 1;
        };
    </script>
    <div id="mydiv">
    </div>
    <script type="text/javascript" language="javascript">
        (function (d, t) { var g = d.createElement(t), s = d.getElementsByTagName(t)[0]; g.src = '//www.subscriptionbridge.com/v2/subscriptionbridge.min.js'; g.onreadystatechange = SubscriptionBridge; g.onload = SubscriptionBridge; s.parentNode.insertBefore(g, s) } (document, 'script'));
    </script>       

<?php include("footer.php"); ?>
