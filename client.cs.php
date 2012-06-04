<?php
$sbCCPageName="Create Subscription";
$sbButtonName="Create Subscription";
$sbFormAction="client.cs.php";
?>
<?php include("header.php"); ?>

			<?php 
			If ($_SERVER['CONTENT_LENGTH'] > 0) {

				$strMerchantUsername = $_POST["User"]; 
				$strMerchantPassword = $_POST["Pass"]; 
				$strMerchantKey = $_POST["Key"]; 
				$strGUID = $_POST["GUID"]; 

				$objSB = new pcARBClass($gv_EndPoint_Notifications, $gv_EndPoint_Subscriptions, $gv_EndPoint_Management, $gv_EndPoint_Authentication);
				
				$result = $objSB->Request("SubscriptionRequest","SubscriptionRequestXML",$gv_EndPoint_Subscriptions);


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
                    	<td class="leftCell" nowrap="nowrap">Package Link ID: </td>
                        <td><input class="sbInputField"  name="LINKID" type="text" value=""></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                    	<td colspan="2"><h2>Customer</h2></td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Firstname:  </td>
                        <td width="711">
                        <input class="sbInputField" type="text" name="x_BillFirstName" id="x_BillFirstName" size="30" maxlength="50" value="">&nbsp;*</td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Lastname:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_BillLastName" id="x_BillLastName" size="30" maxlength="50" value="">&nbsp;*
                        </td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Email:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_BillEmail" id="x_BillEmail" size="30" value="">
                        *&nbsp; </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                    	<td colspan="2"><h3>Billing</h3></td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Company:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_BillCompany" id="x_BillCompany" size="30" maxlength="50" value="">
                        </td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Address:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_BillAddress" id="x_BillAddress" size="30" maxlength="60" value="">&nbsp;*
                        </td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">City:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_BillCity" id="x_BillCity" size="30" maxlength="50" value="">&nbsp;*
                        </td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">State:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_BillState" id="x_BillState" size="30" maxlength="50" value="">
                        &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Postal Code:</td>
                        <td>
                        <input class="sbInputField" type="text" name="x_BillZip" id="x_BillZip" size="10" maxlength="20" value="">
                        &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Country:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_BillCountry" id="x_BillCountry" size="2" maxlength="4" value="">&nbsp;*
                        </td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Phone:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_BillPhone" id="x_BillPhone" size="30" maxlength="20" value="">
                        </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                    	<td colspan="2"><h3>Shipping (Optional)</h3></td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Company:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_ShipCompany" id="x_ShipCompany" size="30" maxlength="50" value="">
                        </td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Address:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_ShipAddress" id="x_ShipAddress" size="30" maxlength="60" value="">
                        &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">City:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_ShipCity" id="x_ShipCity" size="30" maxlength="50" value="">
                        &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">State:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_ShipState" id="x_ShipState" size="30" maxlength="50" value="">
                        &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Postal Code:</td>
                        <td>
                        <input class="sbInputField" type="text" name="x_ShipZip" id="x_ShipZip" size="10" maxlength="20" value="">
                        &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Country:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_ShipCountry" id="x_ShipCountry" size="2" maxlength="4" value="">
                        &nbsp;</td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Phone:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_ShipPhone" id="x_ShipPhone" size="30" maxlength="20" value="">
                        </td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td>&nbsp;</td>
                    </tr>
                    <tr>
                      <td colspan="2"><h2>Credit Card</h2></td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Card Type:  </td>
                        <td>
                        <select class="sbSelectField" name="x_CardType" id="x_CardType">
                          <option value="Visa" selected="selected">Visa</option>
                          <option value="MasterCard">MasterCard</option>
                          <option value="Discover">Discover</option>
                          <option value="Amex">American Express</option>
                      </select>&nbsp;*
                      </td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Card Number:  </td>
                        <td>
                        <input class="sbInputField" type="text" name="x_CardNum" id="x_CardNum" size="30" value="">&nbsp;*
                        </td>
                    </tr>
                    <tr>
                        <td class="leftCell" nowrap="nowrap">Expiration Date:  </td>
                        <td>
                        <select class="sbSelectField" name="x_ExpDateMonth">
                          <option value="01">01</option>
                          <option value="02">02</option>
                          <option value="03">03</option>
                          <option value="04">04</option>
                          <option value="05">05</option>
                          <option value="06">06</option>
                          <option value="07">07</option>
                          <option value="08">08</option>
                          <option value="09">09</option>
                          <option value="10">10</option>
                          <option value="11">11</option>
                          <option value="12">12</option>
                      </select>
                      <?php $var_ThisYear=date("Y") ?>
                      <select class="sbSelectField" name="x_ExpDateYear">
                        <option value="<?php echo $var_ThisYear ?>"><?php echo $var_ThisYear ?></option>
                        <option value="<?php echo $var_ThisYear+1 ?>" selected="selected"><?php echo $var_ThisYear+1 ?></option>
                        <option value="<?php echo $var_ThisYear+2 ?>"><?php echo $var_ThisYear+2 ?></option>
                        <option value="<?php echo $var_ThisYear+3 ?>"><?php echo $var_ThisYear+3 ?></option>
                        <option value="<?php echo $var_ThisYear+4 ?>"><?php echo $var_ThisYear+4 ?></option>
                        <option value="<?php echo $var_ThisYear+5 ?>"><?php echo $var_ThisYear+5 ?></option>
                        <option value="<?php echo $var_ThisYear+6 ?>"><?php echo $var_ThisYear+6 ?></option>
                        <option value="<?php echo $var_ThisYear+7 ?>"><?php echo $var_ThisYear+7 ?></option>
                        <option value="<?php echo $var_ThisYear+8 ?>"><?php echo $var_ThisYear+8 ?></option>
                        <option value="<?php echo $var_ThisYear+9 ?>"><?php echo $var_ThisYear+9 ?></option>
                        <option value="<?php echo $var_ThisYear+10 ?>"><?php echo $var_ThisYear+10 ?></option>
                        <option value="<?php echo $var_ThisYear+11 ?>"><?php echo $var_ThisYear+11 ?></option>
                      </select>&nbsp;*        
                        </td>
                    </tr>
                    <tr>
                      <td class="leftCell" nowrap="nowrap">CVV2:  </td>
                      <td>
                        <input class="sbInputField" type="text" name="x_CVV" id="x_CVV" size="5" maxlength="5" />&nbsp;*
                      </td>
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