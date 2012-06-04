<?php
class pcARBClass {

	protected $gv_EndPoint_Notifications;	
	protected $gv_EndPoint_Subscriptions;
	protected $gv_EndPoint_Management;
	protected $gv_EndPoint_IPN;
	protected $gv_EndPoint_Authentication;
	protected $gv_EndPoint_HC;

	public function __construct ( $gv_EndPoint_Notifications, $gv_EndPoint_Subscriptions, $gv_EndPoint_Management, $gv_EndPoint_Authentication ) {
	  $this->gv_EndPoint_Notifications = $gv_EndPoint_Notifications;
	  $this->gv_EndPoint_Subscriptions = $gv_EndPoint_Subscriptions;
	  $this->gv_EndPoint_Management = $gv_EndPoint_Management;
	  $this->gv_EndPoint_Authentication = $gv_EndPoint_Authentication;
	}
	
	public function Request($gv_Method, $gv_XML, $gv_EndPoint) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		// 1.) Get Timestamp
		$result = $this->GetCurrentTime();
		if ($result=="ERROR") {
		} else {
			$currentTime = $result;
		} 

		// 2.) Create Request	
		$pcv_token = hash_hmac('sha1', $strMerchantPassword.'|'.$currentTime, $strMerchantKey);	

		$pcv_username = $strMerchantUsername;							
		$xmlStr = $this->$gv_XML();

		//return $xmlStr;
		//exit;

		// 3.) Process Response
		$result = $this->methodCall($gv_Method, $xmlStr, $gv_EndPoint);
		return $result;
		
		
	}

	//////////////////////////////////////////////////////////////////////////////
	// START: Get Features Request
	//////////////////////////////////////////////////////////////////////////////
	function GetFeaturesRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<GetFeaturesRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<LinkID>' . $this->removeInvalidXML($_POST["LinkID"]) . '</LinkID>';
		$xmlStr = $xmlStr . 		'<LanguageCode>' . $this->removeInvalidXML($_POST["LanguageCode"]) . '</LanguageCode>';
		$xmlStr = $xmlStr . 	'</GetFeaturesRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Get Features Request
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START: Get Packages Request
	//////////////////////////////////////////////////////////////////////////////
	function GetPackagesRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<GetPackagesRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<LanguageCode>' . $this->removeInvalidXML($_POST["LanguageCode"]) . '</LanguageCode>';
		$xmlStr = $xmlStr . 	'</GetPackagesRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Get Packages Request
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START: Get Current Time
	//////////////////////////////////////////////////////////////////////////////
	function GetTimeRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<GetTimeRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $this->removeInvalidXML($_POST["Username"]) . '</Username>';
		$xmlStr = $xmlStr . 	'</GetTimeRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Get Current Time
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START: Get Terms
	//////////////////////////////////////////////////////////////////////////////
	function GetTermsRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<GetTermsRequest>';	
		$xmlStr = $xmlStr . 		'<LinkID>' . $this->removeInvalidXML($_POST["LinkID"]) . '</LinkID>';
		$xmlStr = $xmlStr . 	'</GetTermsRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Get Terms
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START: Remove Adjustment
	//////////////////////////////////////////////////////////////////////////////
	function RemoveAdjustmentRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<RemoveAdjustmentRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Guid>' . $this->removeInvalidXML($_POST["GUID"]) . '</Guid>';
		$xmlStr = $xmlStr . 		'<Adjustment>';
		$xmlStr = $xmlStr . 			'<AdjustmentID>' . $this->removeInvalidXML($_POST["AdjustmentID"]) . '</AdjustmentID>';
		$xmlStr = $xmlStr . 		'</Adjustment>';
		$xmlStr = $xmlStr . 	'</RemoveAdjustmentRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Remove Adjustment
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START: Add Adjustment
	//////////////////////////////////////////////////////////////////////////////
	function AddAdjustmentRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<AddAdjustmentRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Guid>' . $this->removeInvalidXML($_POST["GUID"]) . '</Guid>';
		$xmlStr = $xmlStr . 		'<Adjustment>';
		$xmlStr = $xmlStr . 			'<Description>' . $this->removeInvalidXML($_POST["Description"]) . '</Description>';
		$xmlStr = $xmlStr . 			'<Name>' . $this->removeInvalidXML($_POST["Name"]) . '</Name>';
		$xmlStr = $xmlStr . 			'<Price>' . $this->removeInvalidXML($_POST["Price"]) . '</Price>';
		$xmlStr = $xmlStr . 			'<TrialPrice>' . $this->removeInvalidXML($_POST["TrialPrice"]) . '</TrialPrice>';
		$xmlStr = $xmlStr . 		'</Adjustment>';
		$xmlStr = $xmlStr . 	'</AddAdjustmentRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Add Adjustment
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START: Add Feature
	//////////////////////////////////////////////////////////////////////////////
	function AddFeatureRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<AddFeatureRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Guid>' . $this->removeInvalidXML($_POST["GUID"]) . '</Guid>';
		$xmlStr = $xmlStr . 		'<Feature>';
		$xmlStr = $xmlStr . 			'<Description>' . $this->removeInvalidXML($_POST["Description"]) . '</Description>';
		$xmlStr = $xmlStr . 			'<Name>' . $this->removeInvalidXML($_POST["Name"]) . '</Name>';
		$xmlStr = $xmlStr . 			'<Price>' . $this->removeInvalidXML($_POST["Price"]) . '</Price>';
		$xmlStr = $xmlStr . 			'<TrialPrice>' . $this->removeInvalidXML($_POST["TrialPrice"]) . '</TrialPrice>';
		$xmlStr = $xmlStr . 		'</Feature>';
		$xmlStr = $xmlStr . 	'</AddFeatureRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Add Feature
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START: Get Subscription History
	//////////////////////////////////////////////////////////////////////////////
	function GetSubscriptionHistoryRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<GetSubscriptionHistoryRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Guid>' . $this->removeInvalidXML($_POST["GUID"]) . '</Guid>';
		$xmlStr = $xmlStr . 		'<PageSize>' . $this->removeInvalidXML($_POST["PageSize"]) . '</PageSize>';
		$xmlStr = $xmlStr . 		'<PageIndex>' . $this->removeInvalidXML($_POST["PageIndex"]) . '</PageIndex>';
		$xmlStr = $xmlStr . 		'<DeductAmount>True</DeductAmount>';
		$xmlStr = $xmlStr . 	'</GetSubscriptionHistoryRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Get Subscription History
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START:  Add Metered
	//////////////////////////////////////////////////////////////////////////////
	function AddMeteredRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<AddMeteredRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Guid>' . $this->removeInvalidXML($_POST["GUID"]) . '</Guid>';
		$xmlStr = $xmlStr . 		'<Amount>' . $this->removeInvalidXML($_POST["Amount"]) . '</Amount>';
		$xmlStr = $xmlStr . 		'<Memo>' . $this->removeInvalidXML($_POST["Memo"]) . '</Memo>';
		$xmlStr = $xmlStr . 		'<RefName>' . $this->removeInvalidXML($_POST["LinkID"]) . '</RefName>';
		$xmlStr = $xmlStr . 		'<DeductAmount>True</DeductAmount>';
		$xmlStr = $xmlStr . 	'</AddMeteredRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Add Metered
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START:  Cancellation Request
	//////////////////////////////////////////////////////////////////////////////
	function CancellationRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<CancellationRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Guid>' . $this->removeInvalidXML($_POST["GUID"]) . '</Guid>';
		$xmlStr = $xmlStr . 		'<Reason>' . $this->removeInvalidXML($_POST["Reason"]) . '</Reason>';
		$xmlStr = $xmlStr . 	'</CancellationRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Cancellation Request
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START:  Get Subscription Details
	//////////////////////////////////////////////////////////////////////////////
	function GetSubscriptionDetailsRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<GetSubscriptionDetailsRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Guid>' . $this->removeInvalidXML($_POST["GUID"]) . '</Guid>';
		$xmlStr = $xmlStr . 	'</GetSubscriptionDetailsRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Get Subscription Details
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START:  Get Subscriptions Request
	//////////////////////////////////////////////////////////////////////////////
	function GetSubscriptionsRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<GetSubscriptionsRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';	
		$xmlStr = $xmlStr . 	'</GetSubscriptionsRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Get Subscriptions Request
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START:  Update Subscription
	//////////////////////////////////////////////////////////////////////////////
	function UpdateSubscriptionRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<UpdateSubscriptionRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Guid>' . $this->removeInvalidXML($_POST["GUID"]) . '</Guid>';
		$xmlStr = $xmlStr . 		'<Customer>';
		$xmlStr = $xmlStr . 			'<Email>' . $this->removeInvalidXML($_POST["x_BillEmail"]) . '</Email>';
		$xmlStr = $xmlStr . 			'<FirstName>' . $this->removeInvalidXML($_POST["x_BillFirstName"]) . '</FirstName>';
		$xmlStr = $xmlStr . 			'<LastName>' . $this->removeInvalidXML($_POST["x_BillLastName"]) . '</LastName>';
		$xmlStr = $xmlStr . 			'<BillingAddress>';
		$xmlStr = $xmlStr . 				'<FirstName>' . $this->removeInvalidXML($_POST["x_BillFirstName"]) . '</FirstName>';
		$xmlStr = $xmlStr . 				'<LastName>' . $this->removeInvalidXML($_POST["x_BillLastName"]) . '</LastName>';
		
		if ($_POST["x_BillCompany"]!='') {
			$xmlStr = $xmlStr . 			'<Company>' . $this->removeInvalidXML($_POST["x_BillCompany"]) . '</Company>';
		}
		
		$xmlStr = $xmlStr . 				'<Address>' . $this->removeInvalidXML($_POST["x_BillAddress"]) . '</Address>';
		
		if ($_POST["x_BillAddress2"]!='') {
			$xmlStr = $xmlStr . 			'<Address2>' . $this->removeInvalidXML($_POST["x_BillAddress2"]) . '</Address2>';
		}	
		
		$xmlStr = $xmlStr . 				'<City>' . $this->removeInvalidXML($_POST["x_BillCity"]) . '</City>';
		
		if ($_POST["x_BillState"]!='') {
			$xmlStr = $xmlStr . 				'<Region>' . $this->removeInvalidXML($_POST["x_BillState"]) . '</Region>';		
		}
		
		$xmlStr = $xmlStr . 				'<PostalCode>' . $this->removeInvalidXML($_POST["x_BillZip"]) . '</PostalCode>';
		$xmlStr = $xmlStr . 				'<Country>' . $this->removeInvalidXML($_POST["x_BillCountry"]) . '</Country>';
		
		if ($_POST["x_BillPhone"]!='') {
			$xmlStr = $xmlStr . 			'<Phone>' . $this->removeInvalidXML($_POST["x_BillPhone"]) . '</Phone>';
		}
		
		$xmlStr = $xmlStr . 			'</BillingAddress>';

		$xmlStr = $xmlStr . 		'</Customer>';

		if ($_POST["x_CardNum"]!='') {
			
			$xmlStr = $xmlStr . 		'<CreditCard>';
			$xmlStr = $xmlStr . 			'<CardNumber>' . $_POST["x_CardNum"] . '</CardNumber>';
			$xmlStr = $xmlStr . 			'<CardType>' . $_POST["x_CardType"] . '</CardType>';
			$xmlStr = $xmlStr . 			'<ExpMonth>' . $_POST["x_ExpDateMonth"] . '</ExpMonth>';
			$xmlStr = $xmlStr . 			'<ExpYear>' . $_POST["x_ExpDateYear"] . '</ExpYear>';
			$xmlStr = $xmlStr . 			'<SecureCode>' . $_POST["x_CVV"] . '</SecureCode>';
			$xmlStr = $xmlStr . 		'</CreditCard>';
		}	

	
		$xmlStr = $xmlStr . 	'</UpdateSubscriptionRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Update Subscription
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START:  Trial To Full
	//////////////////////////////////////////////////////////////////////////////
	function TrialToFullRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<TrialToFullRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Guid>' . $this->removeInvalidXML($_POST["GUID"]) . '</Guid>';
		$xmlStr = $xmlStr . 		'<Customer>';
		$xmlStr = $xmlStr . 			'<Email>' . $this->removeInvalidXML($_POST["x_BillEmail"]) . '</Email>';
		$xmlStr = $xmlStr . 			'<FirstName>' . $this->removeInvalidXML($_POST["x_BillFirstName"]) . '</FirstName>';
		$xmlStr = $xmlStr . 			'<LastName>' . $this->removeInvalidXML($_POST["x_BillLastName"]) . '</LastName>';
		$xmlStr = $xmlStr . 			'<BillingAddress>';
		$xmlStr = $xmlStr . 				'<FirstName>' . $this->removeInvalidXML($_POST["x_BillFirstName"]) . '</FirstName>';
		$xmlStr = $xmlStr . 				'<LastName>' . $this->removeInvalidXML($_POST["x_BillLastName"]) . '</LastName>';
		
		if ($_POST["x_BillCompany"]!='') {
			$xmlStr = $xmlStr . 			'<Company>' . $this->removeInvalidXML($_POST["x_BillCompany"]) . '</Company>';
		}
		
		$xmlStr = $xmlStr . 				'<Address>' . $this->removeInvalidXML($_POST["x_BillAddress"]) . '</Address>';
		
		if ($_POST["x_BillAddress2"]!='') {
			$xmlStr = $xmlStr . 			'<Address2>' . $this->removeInvalidXML($_POST["x_BillAddress2"]) . '</Address2>';
		}	
		
		$xmlStr = $xmlStr . 				'<City>' . $this->removeInvalidXML($_POST["x_BillCity"]) . '</City>';
		
		if ($_POST["x_BillState"]!='') {
			$xmlStr = $xmlStr . 				'<Region>' . $this->removeInvalidXML($_POST["x_BillState"]) . '</Region>';		
		}
		
		$xmlStr = $xmlStr . 				'<PostalCode>' . $this->removeInvalidXML($_POST["x_BillZip"]) . '</PostalCode>';
		$xmlStr = $xmlStr . 				'<Country>' . $this->removeInvalidXML($_POST["x_BillCountry"]) . '</Country>';
		
		if ($_POST["x_BillPhone"]!='') {
			$xmlStr = $xmlStr . 			'<Phone>' . $this->removeInvalidXML($_POST["x_BillPhone"]) . '</Phone>';
		}
		
		$xmlStr = $xmlStr . 			'</BillingAddress>';

		$xmlStr = $xmlStr . 		'</Customer>';

		if ($_POST["x_CardNum"]!='') {
			
			$xmlStr = $xmlStr . 		'<CreditCard>';
			$xmlStr = $xmlStr . 			'<CardNumber>' . $_POST["x_CardNum"] . '</CardNumber>';
			$xmlStr = $xmlStr . 			'<CardType>' . $_POST["x_CardType"] . '</CardType>';
			$xmlStr = $xmlStr . 			'<ExpMonth>' . $_POST["x_ExpDateMonth"] . '</ExpMonth>';
			$xmlStr = $xmlStr . 			'<ExpYear>' . $_POST["x_ExpDateYear"] . '</ExpYear>';
			$xmlStr = $xmlStr . 			'<SecureCode>' . $_POST["x_CVV"] . '</SecureCode>';
			$xmlStr = $xmlStr . 		'</CreditCard>';
		}	

	
		$xmlStr = $xmlStr . 	'</TrialToFullRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Trial To Full
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START:  Verify Account Credentials Request
	//////////////////////////////////////////////////////////////////////////////
	function VerifyAccountCredentialsRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<VerifyAccountCredentialsRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Email>' . $this->removeInvalidXML($_POST["Email"]) . '</Email>';
		$xmlStr = $xmlStr . 		'<Password>' . $this->removeInvalidXML($_POST["Password"]) . '</Password>';
		$xmlStr = $xmlStr . 	'</VerifyAccountCredentialsRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Verify Account Credentials Request
	//////////////////////////////////////////////////////////////////////////////


	//////////////////////////////////////////////////////////////////////////////
	// START:  Check Account Available Request
	//////////////////////////////////////////////////////////////////////////////
	function CheckAccountAvailableRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<CheckAccountAvailableRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Email>' . $this->removeInvalidXML($_POST["Email"]) . '</Email>';
		$xmlStr = $xmlStr . 	'</CheckAccountAvailableRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Check Account Available Request
	//////////////////////////////////////////////////////////////////////////////



	//////////////////////////////////////////////////////////////////////////////
	// START:  Modify Account Credentials Request
	//////////////////////////////////////////////////////////////////////////////
	function ModifyAccountCredentialsRequestXML( ) {

		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<ModifyAccountCredentialsRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';
		$xmlStr = $xmlStr . 		'<Email>' . $this->removeInvalidXML($_POST["Email"]) . '</Email>';
		$xmlStr = $xmlStr . 		'<Password>' . $this->removeInvalidXML($_POST["Password"]) . '</Password>';
		$xmlStr = $xmlStr . 		'<NewPassword>' . $this->removeInvalidXML($_POST["NewPassword"]) . '</NewPassword>';
		$xmlStr = $xmlStr . 	'</ModifyAccountCredentialsRequest>';

		return $xmlStr;
		
	}	
	//////////////////////////////////////////////////////////////////////////////
	// END:  Modify Account Credentials Request
	//////////////////////////////////////////////////////////////////////////////



	//////////////////////////////////////////////////////////////////////////////
	// START:  Create Subscription
	//////////////////////////////////////////////////////////////////////////////
	function SubscriptionRequestXML( ) {
		
		global $strMerchantUsername, $strMerchantPassword, $strMerchantKey, $pcv_token, $strGUID;
		
		$xmlStr = 				'<?xml version="1.0" encoding="utf-8"?>';
		$xmlStr = $xmlStr . 	'<SubscriptionRequest>';	
		$xmlStr = $xmlStr . 		'<Username>' . $strMerchantUsername . '</Username>';
		$xmlStr = $xmlStr . 		'<Token>' . $pcv_token . '</Token>';	
		$xmlStr = $xmlStr . 		'<Customer>';
		$xmlStr = $xmlStr . 			'<Email>' . $this->removeInvalidXML($_POST["x_BillEmail"]) . '</Email>';
		$xmlStr = $xmlStr . 			'<FirstName>' . $this->removeInvalidXML($_POST["x_BillFirstName"]) . '</FirstName>';
		$xmlStr = $xmlStr . 			'<LastName>' . $this->removeInvalidXML($_POST["x_BillLastName"]) . '</LastName>';
		$xmlStr = $xmlStr . 			'<BillingAddress>';
		$xmlStr = $xmlStr . 				'<FirstName>' . $this->removeInvalidXML($_POST["x_BillFirstName"]) . '</FirstName>';
		$xmlStr = $xmlStr . 				'<LastName>' . $this->removeInvalidXML($_POST["x_BillLastName"]) . '</LastName>';
		
		if ($_POST["x_BillCompany"]!='') {
			$xmlStr = $xmlStr . 			'<Company>' . $this->removeInvalidXML($_POST["x_BillCompany"]) . '</Company>';
		}
		
		$xmlStr = $xmlStr . 				'<Address>' . $this->removeInvalidXML($_POST["x_BillAddress"]) . '</Address>';
		
		if ($_POST["x_BillAddress2"]!='') {
			$xmlStr = $xmlStr . 			'<Address2>' . $this->removeInvalidXML($_POST["x_BillAddress2"]) . '</Address2>';
		}	
		
		$xmlStr = $xmlStr . 				'<City>' . $this->removeInvalidXML($_POST["x_BillCity"]) . '</City>';
		
		if ($_POST["x_BillState"]!='') {
			$xmlStr = $xmlStr . 				'<Region>' . $this->removeInvalidXML($_POST["x_BillState"]) . '</Region>';		
		}
		
		$xmlStr = $xmlStr . 				'<PostalCode>' . $this->removeInvalidXML($_POST["x_BillZip"]) . '</PostalCode>';
		$xmlStr = $xmlStr . 				'<Country>' . $this->removeInvalidXML($_POST["x_BillCountry"]) . '</Country>';
		
		if ($_POST["x_BillPhone"]!='') {
			$xmlStr = $xmlStr . 			'<Phone>' . $this->removeInvalidXML($_POST["x_BillPhone"]) . '</Phone>';
		}
		
		$xmlStr = $xmlStr . 			'</BillingAddress>';
		
		$xmlStr = $xmlStr . 			'<ShippingAddress>';
		$xmlStr = $xmlStr . 				'<FirstName>' . $this->removeInvalidXML($_POST["x_ShipFirstName"]) . '</FirstName>';
		$xmlStr = $xmlStr . 				'<LastName>' . $this->removeInvalidXML($_POST["x_ShipLastName"]) . '</LastName>';
		
		if ($_POST["x_ShipCompany"]!='') {
			$xmlStr = $xmlStr . 			'<Company>' . $this->removeInvalidXML($_POST["x_ShipCompany"]) . '</Company>';
		}
		
		$xmlStr = $xmlStr . 				'<Address>' . $this->removeInvalidXML($_POST["x_ShipAddress"]) . '</Address>';
		
		if ($_POST["x_ShipAddress2"]!='') {
			$xmlStr = $xmlStr . 			'<Address2>' . $this->removeInvalidXML($_POST["x_ShipAddress2"]) . '</Address2>';
		}
		
		$xmlStr = $xmlStr . 				'<City>' . $this->removeInvalidXML($_POST["x_ShipCity"]) . '</City>';
		
		if ($_POST["x_ShipState"]!='') {
			$xmlStr = $xmlStr . 				'<Region>' . $this->removeInvalidXML($_POST["x_ShipState"]) . '</Region>';		
		}
		
		$xmlStr = $xmlStr . 				'<PostalCode>' . $this->removeInvalidXML($_POST["x_ShipZip"]) . '</PostalCode>';
		$xmlStr = $xmlStr . 				'<Country>' . $this->removeInvalidXML($_POST["x_ShipCountry"]) . '</Country>';
		
		if ($_POST["x_ShipPhone"]!='') {
			$xmlStr = $xmlStr . 			'<Phone>' . $this->removeInvalidXML($_POST["x_ShipPhone"]) . '</Phone>';
		}
		
		$xmlStr = $xmlStr . 			'</ShippingAddress>';
		
		$xmlStr = $xmlStr . 			'<Password>' . $this->removeInvalidXML($_POST["x_Password"]) . '</Password>';
		$xmlStr = $xmlStr . 			'<Account>' . $this->removeInvalidXML($_POST["x_AccountNum"]) . '</Account>';
		$xmlStr = $xmlStr . 		'</Customer>';

		if ($_POST["x_CardNum"]!='') {
			
			$xmlStr = $xmlStr . 		'<CreditCard>';
			$xmlStr = $xmlStr . 			'<CardNumber>' . $_POST["x_CardNum"] . '</CardNumber>';
			$xmlStr = $xmlStr . 			'<CardType>' . $_POST["x_CardType"] . '</CardType>';
			$xmlStr = $xmlStr . 			'<ExpMonth>' . $_POST["x_ExpDateMonth"] . '</ExpMonth>';
			$xmlStr = $xmlStr . 			'<ExpYear>' . $_POST["x_ExpDateYear"] . '</ExpYear>';
			$xmlStr = $xmlStr . 			'<SecureCode>' . $_POST["x_CVV"] . '</SecureCode>';
			$xmlStr = $xmlStr . 		'</CreditCard>';
		}	

		if ($_POST["RegularAmt"]!='') {
			
			// NOT LINKED
			
			//$xmlStr = $xmlStr . 		'<Cart>';
			//$xmlStr = $xmlStr . 			'<RegularAmt>' . $_POST["RegularAmt"] . '</RegularAmt>';
			//$xmlStr = $xmlStr . 			'<TrialAmt>' . $_POST["TrialAmt"] . '</TrialAmt>';
			//$xmlStr = $xmlStr . 			'<RegularTax>' . $_POST["RegularTax"] . '</RegularTax>';
			//$xmlStr = $xmlStr . 			'<TrialTax>' . $_POST["TrialTax"] . '</TrialTax>';
			//$xmlStr = $xmlStr . 			'<RegularShipping>' . $_POST["RegularShipping"] . '</RegularShipping>';
			//$xmlStr = $xmlStr . 			'<TrialShipping>' . $_POST["TrialShipping"] . '</TrialShipping>';
			//$xmlStr = $xmlStr . 			'<IsShippable>' . $_POST["IsShippable"] . '</IsShippable>';
			//$xmlStr = $xmlStr . 			'<ShipName>' . $_POST["ShipName"] . '</ShipName>';
			//$xmlStr = $xmlStr . 			'<TaxName>' . $_POST["TaxName"] . '</TaxName>';
			//$xmlStr = $xmlStr . 			'<AgreedToTerms>' . $_POST["AgreedToTerms"] . '</AgreedToTerms>';
			//$xmlStr = $xmlStr . 			'<LanguageCode>' . $_POST["LanguageCode"] . '</LanguageCode>';
			//$xmlStr = $xmlStr . 		'</Cart>';
		}
		
		// LINKED		
		$xmlStr = $xmlStr . 		'<Package>';
		$xmlStr = $xmlStr . 			'<LinkID>' . $this->removeInvalidXML($_POST["LINKID"]) . '</LinkID>';
		$xmlStr = $xmlStr . 		'</Package>';	
		
		
		$xmlStr = $xmlStr . 	'</SubscriptionRequest>';

		return $xmlStr;
		
	}
	//////////////////////////////////////////////////////////////////////////////
	// END:  Create Subscription
	//////////////////////////////////////////////////////////////////////////////



	function GetCurrentTime() {
		return $this->actual_time("Y-m-d\TH:i:00",0,time());
	}


	function methodCall($method, $xmlStr, $endpoint) {

		$strEndPoint=$endpoint."/".$method;
		
		define('XML_PAYLOAD', $xmlStr);
		define('XML_POST_URL', $strEndPoint);
		
		/*
		// Initialize handle and set options
		*/
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, XML_POST_URL);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 400);
		curl_setopt($ch, CURLOPT_POSTFIELDS, XML_PAYLOAD);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: text/xml'));
		
		// WARNING: this would prevent curl from detecting a 'man in the middle' attack
		curl_setopt ($ch, CURLOPT_SSL_VERIFYHOST, 0);
		curl_setopt ($ch, CURLOPT_SSL_VERIFYPEER, 0);
		
		/*
		// Execute the request and also time the transaction
		*/
		$start = array_sum(explode(' ', microtime()));
		$result = curl_exec($ch);
		$stop = array_sum(explode(' ', microtime()));
		$totalTime = $stop - $start;
		//echo($result);
		//echo($resultMsg);
		//echo($resultCode);
		
		/*
		// Check for errors
		*/
		if ( curl_errno($ch) ) {
			$result = 'ERROR -> ' . curl_errno($ch) . ': ' . curl_error($ch);
		} else {
			$returnCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
			switch($returnCode){
				case 404:
					$result = 'ERROR -> 404 Not Found';
					break;
				case 200:
					break;
				default:
					break;
			}
		}
	
		/*
		// Close the handle
		*/
		curl_close($ch);

		return $result;
	}


	function removeInvalidXML($string) {
		
		return $string;
	}


	function actual_time($format,$offset,$timestamp){
	   //Offset is in hours from gmt, including a - sign if applicable.
	   //So lets turn offset into seconds
	   $offset = $offset*60*60;
	   $timestamp = $timestamp + $offset;
		//Remember, adding a negative is still subtraction ;)
	   return gmdate($format,$timestamp);
	}


	function custom_hmac($algo, $data, $key, $raw_output)
	{
		$algo = strtolower($algo);
		$pack = 'H'.strlen($algo('test'));
		$size = 64;
		$opad = str_repeat(chr(0x5C), $size);
		$ipad = str_repeat(chr(0x36), $size);

		if (strlen($key) > $size) {
			$key = str_pad(pack($pack, $algo($key)), $size, chr(0x00));
		} else {
			$key = str_pad($key, $size, chr(0x00));
		}

		for ($i = 0; $i < strlen($key) - 1; $i++) {
			$opad[$i] = $opad[$i] ^ $key[$i];
			$ipad[$i] = $ipad[$i] ^ $key[$i];
		}

		$output = $algo($opad.pack($pack, $algo($ipad.$data)));

		return ($raw_output) ? pack($pack, $output) : $output;
	}

}
?>
<?php

function encrypt($text, $key, $iv)
{

	$block = mcrypt_get_block_size(MCRYPT_RIJNDAEL_256, MCRYPT_MODE_CBC);
	$padding = $block - (strlen($text) % $block);
	$text .= str_repeat(chr($padding), $padding);
	$crypttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_256, $key, $text, MCRYPT_MODE_CBC, $iv);
	$crypttext64=base64_encode($crypttext);
	
	return $crypttext64;

}
	
function random($len) { 
    
	if (@is_readable('/dev/urandom')) { 
        $f=fopen('/dev/urandom', 'r'); 
        $urandom=fread($f, $len); 
        fclose($f); 
    } 

    $return=''; 
	
    for ($i=0;$i<$len;++$i) { 
        if (!isset($urandom)) { 
            if ($i%2==0) mt_srand(time()%2147 * 1000000 + (double)microtime() * 1000000); 
            $rand=48+mt_rand()%64; 
        } else $rand=48+ord($urandom[$i])%64; 

        if ($rand>57) 
            $rand+=7; 
        if ($rand>90) 
            $rand+=6; 

        if ($rand==123) $rand=45; 
        if ($rand==124) $rand=46; 
        $return.=chr($rand); 
    } 
    return $return; 
} 
?>