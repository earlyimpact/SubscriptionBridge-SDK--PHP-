<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SubscriptionBridge "Kitchen Sink" Demo</title>
<?php include("CallerService.php"); ?>
<?php
$gv_EndPoint_Notifications		= 	"https://www.subscriptionbridge.com/Notifications/Service1.svc";
$gv_EndPoint_Subscriptions		= 	"https://www.subscriptionbridge.com/Subscriptions/Service2.svc";
$gv_EndPoint_Management			= 	"https://www.subscriptionbridge.com/Management/Service3.svc";
$gv_EndPoint_IPN				= 	"https://www.subscriptionbridge.com/Gateway/Service4.svc"; 
$gv_EndPoint_Authentication		=	"https://www.subscriptionbridge.com/Authentication/Service5.svc";
$gv_EndPoint_HC					= 	"https://www.subscriptionbridge.com/checkout";
?>

<link href="client.css" rel="stylesheet" type="text/css" />
</head>
<body class="yui-skin-sam">

	<div id="sbCC2">

        <div id="sbCC2logo"><img src="<?php echo $sbStoreLogo; ?>" alt="<?php echo $sbCCPageNameAlt; ?>"></div>
   
		<div id="sbCC2mainShadow">
        
            <div id="sbCC2main">

                <div id="menuContainer">
                    <div id="menu">
                                <a href="client.home.php">Main Menu</a>
                    </div> 
                </div>

				<h1><?php echo $sbCCPageName; ?></h1>
				<!-- End of Header -->