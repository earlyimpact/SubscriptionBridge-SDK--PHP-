<?php
$sbCCPageName="Terms Widget (jQuery)";
$sbButtonName="";
$sbFormAction="";
?>

<?php include("header.php"); ?>

<style>

/* CSS Style for Subscription Term Widget */

/* This DIV wraps around the entire Widget */
.sbTermsWrapper {
	width: 250px;
	background-color: #E9EEFE;
	border: 1px solid  #CCC;
	margin: 10px 0 15px 10px;
	padding: 10px;
	color: #000000;
	font-size: 12px;
	text-align: left;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
}

/* This DIV contains the current price (e.g. "Free for the first 15 days") */
.sbTerms {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	color: #000000;
	text-align: left;
	margin-bottom: 2px;
	font-weight: bold;
}

/* This DIV contains the ongoing subscription amount (e.g. "$14.95 every month after 15 day trial") */
.sbTermsSub {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #666666;
	text-align: left;
	margin-bottom: 2px;
}

/* This DIV contains additional, optional information (e.g. "Taxes added at checkout") */
.sbTermsCustom {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: 11px;
	color: #6699CC;
	text-align: left;
	font-style: italic;
}

</style>

<script type="text/javascript" src="https://www.subscriptionbridge.net/Widget/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="https://www.subscriptionbridge.net/Widget/widget.js"></script>	

<script type="text/javascript">
	GetTerms("SimpleEIGTest1","DivID");
</script>  

<br />

<script type="text/javascript">
	GetTerms("SimpleEIGTest","DivID2");
</script>           

<?php include("footer.php"); ?>
