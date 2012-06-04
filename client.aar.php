<?php
$sbCCPageName="Add Adjustment Request";
$sbButtonName="Add Adjustment Request";
$sbFormAction="client.aar.php";
?>
<?php include("header.php"); ?>

			<?php 
			If ($_SERVER['CONTENT_LENGTH'] > 0) {

				$strMerchantUsername = $_POST["User"]; 
				$strMerchantPassword = $_POST["Pass"]; 
				$strMerchantKey = $_POST["Key"]; 
				$strGUID = $_POST["GUID"]; 

				$objSB = new pcARBClass($gv_EndPoint_Notifications, $gv_EndPoint_Subscriptions, $gv_EndPoint_Management, $gv_EndPoint_Authentication);
				
				$result = $objSB->Request("AddAdjustmentRequest","AddAdjustmentRequestXML",$gv_EndPoint_Management);

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
                    	<td colspan="2"><h2>Credentials</h2></td>
                    </tr>
                    <tr>
                    	<td class="leftCell" nowrap="nowrap">Username:  </td>
                        <td><input class="sbInputField"  name="User" type="text" value=""></td>
                    </tr>
                    <tr>
                    	<td class="leftCell" nowrap="nowrap">Password:  </td>
                        <td><input class="sbInputField"  name="Pass" type="text" value=""></td>
                    </tr>
                    <tr>
                    	<td class="leftCell" nowrap="nowrap">API Key:  </td>
                        <td><input class="sbInputField"  name="Key" type="text" value=""></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                    	<td colspan="2"><h2>Subscription</h2></td>
                    </tr> 
                    <tr>
                    	<td class="leftCell" nowrap="nowrap">GUID: </td>
                        <td><input class="sbInputField"  name="GUID" type="text" value=""></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                    	<td colspan="2"><h2>Feature</h2></td>
                    </tr>
                    <tr>
                    	<td class="leftCell" nowrap="nowrap">Description: </td>
                        <td><input class="sbInputField" name="Description" type="text" value="This is bandwith that is really large"></td>
                    </tr>
                    <tr>
                    	<td class="leftCell" nowrap="nowrap">Name: </td>
                        <td><input class="sbInputField" name="Name" type="text" value="Extra Bandwith"></td>
                    </tr>
                    <tr>
                    	<td class="leftCell" nowrap="nowrap">Amount: </td>
                        <td><input class="sbInputField" name="Amount" type="text" value=".29"></td>
                    </tr>
                    <tr>
                    	<td class="leftCell" nowrap="nowrap">Trial Amount: </td>
                        <td><input class="sbInputField" name="TrialAmount" type="text" value="0"></td>
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