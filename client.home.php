<?php
$sbCCPageName="Kitchen Sink Demo";
$sbButtonName="";
$sbFormAction="";
?>

<?php include("header.php"); ?>

            <h2>JavaScript API</h2>
			<ul>
            	<li><a href="client.otp.php" target="_blank">Onetime Payment</a></li>
                <li><a href="client.ubi.php" target="_blank">Update Billing</a></li>
            </ul>

            <h2>Hosted Checkout</h2>
			<ul>
            	<li><a href="client.hcb.php" target="_blank">Subscribe Button</a></li>
                <li><a href="client.opc.php" target="_blank">Subscribe Button (OPC)</a></li>
                <li><a href="client.hcl.php">Subscribe Link</a></li>
                <li><a href="client.opc1.php">Subscribe Link (OPC)</a></li>
                <li><a href="client.hcpf.php" target="_blank">Pre-fill Checkout Form</a></li>
                <li><a href="client.hcal.php" target="_blank">Checkout with Auto Login</a></li>
                <li><a href="client.hcru.php" target="_blank">Checkout w. Return URL</a></li>
                <li><a href="client.hcse.php" target="_blank">Checkout... pass along Encrypted Password</a></li>
                <li><a href="client.tw.php">Terms Widget (jQuery)</a></li>
                <li><a href="client.twp.php">Terms Widget (Prototype)</a></li>
            </ul>
            
            <h2>Authentication API</h2>
			<ul>
            	<li><a href="client.vac.php">Verify Account Credentials Request</a></li>
                <li><a href="client.caa.php">Check Account Available Request</a></li>
                <li><a href="client.mac.php">Modify Account Credentials Request</a></li>
                <li><a href="login.php">Sample Login</a></li>
            </ul>
            
            <h2>Management API</h2>
			<ul>
            	<li><a href="client.ttf.php">Trial To Full</a> (EIG)</li>
                <li><a href="client.ub.php">Update Subscription</a></li>
                <li><a href="client.gsr.php">Get Subscriptions Request</a></li>
                <li><a href="client.gsdr.php">Get Subscription Details Request</a></li>
                <li><a href="client.cr.php">Cancellation Request</a></li>
                <li><a href="client.amr.php">Add Metered Request</a> (EIG)</li>
                <li><a href="client.gshr.php">Get Subscription History Request</a></li>
                <li><a href="client.afr.php">Add Feature Request</a> (Beta)</li>
                <li><a href="client.aar.php">Add Adjustement Request</a></li>
                <li><a href="client.rar.php">Remove Adjustement Request</a></li>
            </ul>
            
            <!--
            <h2>Notification API</h2>
			<ul>
            	<li><a href="client.">Notification Request</a></li>
            	<li><a href="client.whr.">Webhook Request</a></li>
            </ul>
            -->
            
            <h2>Subscription API</h2>
			<ul>
            	<li><a href="client.cs.php">Create Subscription</a></li>
                <li><a href="client.gt.php">Get Terms</a></li>
                <li><a href="client.time.php">Get Timestamp</a></li>                
                <!--<li><a href="client.act.asp">Activation Request</a></li>-->
                <li><a href="client.gpr.php">Get Packages Request</a></li>
                <li><a href="client.gf.php">Get Features Request</a></li>
            </ul>
            
            <!--
            <h2>Gateway API</h2>
            <ul>
                <li><a href="client.vt.">Vault Payment Request</a> (EIG)</li>
                <li><a href="client.dpr.">Direct Payment Request</a> (EIG)</li>
            </ul>
            -->

<?php include("footer.php"); ?>