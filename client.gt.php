<?php
$sbCCPageName="Get Terms Request";
$sbButtonName="Get Terms Request";
$sbFormAction="client.gt.php";
?>
<?php include("header.php"); ?>

			<?php 
			If ($_SERVER['CONTENT_LENGTH'] > 0) {

				$strMerchantUsername = $_POST["User"]; 
				$strMerchantPassword = $_POST["Pass"]; 
				$strMerchantKey = $_POST["Key"]; 
				$strGUID = $_POST["GUID"]; 

				$objSB = new pcARBClass($gv_EndPoint_Notifications, $gv_EndPoint_Subscriptions, $gv_EndPoint_Management, $gv_EndPoint_Authentication);
				
				$result = $objSB->Request("GetTermsRequest","GetTermsRequestXML",$gv_EndPoint_Subscriptions);

				$pos = strrpos($result, "ERROR");
				if ($pos === false) {					
					$strStatus = 'Success'; 
				} else {				
					$strStatus = 'Error'; 
				}	
				?>
                
				<h2>The Response:</h2>
				<table width="100%" border="0" cellpadding="2" cellspacing="2">
                    <tr>
                    	<td>
                   			Status:  <?php echo $strStatus ?>
                    	</td>
                    </tr>
                    <tr>
                        <td>
                        	Full Response:  <textarea name="" cols="40" rows="10"><?php echo $result ?></textarea>
                        </td>
                    </tr>
		  		</table>
                
        	<?php } Else { ?>
            
				<table width="100%" border="0" cellpadding="2" cellspacing="2">
                  <form action="<?php echo $sbFormAction ?>" method="post" class="sbForms">
                    <tr>
                    	<td colspan="2"><h2>Subscription</h2></td>
                    </tr> 
                    <tr>
                    	<td class="leftCell" nowrap="nowrap">LinkID: </td>
                        <td><input class="sbInputField"  name="LinkID" type="text" value=""></td>
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
			
<?php include("footer.php"); ?>