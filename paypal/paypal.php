<?php
	
	/**
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: paypal.php,v 3.0 
   */
	include('../config/config.php');
	
	  function get_realmsdb($realmid){
				global $realmdb;
		foreach($realmdb as $realmdb1):
			if($realmid == $realmdb1['id'])
					return $realmdb1['dbname'];
		endforeach;
	   }

 
	//mysql Connect 
	error_reporting(E_ALL ^ E_NOTICE);
		ini_set('log_errors', 'On');
			ini_set('error_log', 'error.log');
			
	
	mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die(mysql_error());
	
	mysql_select_db(DB_UCP) or die(mysql_error());

	
	$sql = mysql_query("SELECT * FROM settings");
	$row = mysql_fetch_assoc($sql);
	
	// check if the payment is correct
	function payment_amount_correct($mc_gross, $item_id)
	{
		$mc_gross = round($mc_gross);
		$sql = mysql_query("SELECT * FROM donateitems WHERE id = ".$item_id."");
		$row = mysql_fetch_assoc($sql);
		$amount = $row['amount'];
		if($amount == $mc_gross)
		{
		  return true;	
		}
		else
		{
		  return false;	
		}
   
	}
	
	// ERROR WRITE FUNCTION duuuughhh
	function errorwrite($string, $errorlog){
	$myFile = "../tmp/logs/".$errorlog;
	$fh = fopen($myFile, 'a');
	$stringData = $string;
	fwrite($fh, $stringData);
	fclose($fh);	  	  
	}
	
	function get_charname($realmdid,$guid) {
					$sql = mysql_query("SELECT `name` FROM {$realmdid}.".DB_CHARS." WHERE `guid` = '{$guid}'");
					$row = mysql_fetch_assoc($sql);
					return $row['name'];
		}
					
     // read the post from PayPal system and add 'cmd'
			$req = 'cmd=_notify-validate';

		foreach ($_POST as $key => $value) {
		$value = urlencode(stripslashes($value));
		$req .= "&$key=$value";
		}
			
			// post back to PayPal system to validate
			$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
			$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
			$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
			$fp = fsockopen ('ssl://www.sandbox.paypal.com', 443, $errno, $errstr, 30);//Test
			
			//$fp = fsockopen ('ssl://www.paypal.com', 443, $errno, $errstr, 30);//Live

			// assign posted variables to local variables
			$item_name = $_POST['item_name'];
			$payment_status = $_POST['payment_status'];
			$payment_amount = $_POST['mc_gross'];
			$payment_currency = $_POST['mc_currency'];
			$user_name = $_POST['user_name'];
			$txn_id = $_POST['txn_id'];
			$receiver_email = $_POST['receiver_email'];
			$payer_email = $_POST['payer_email'];
			// explode the item id and character id
			$string = $_POST['item_number'];
			$string = explode('_', $string);
			$item_id = $string[0];
			$char_id = $string[1];
			$realmdid = get_realmsdb($string[2]);

			
			if (!$fp) {
			// HTTP ERROR
			} else {
			
			fputs ($fp, $header . $req);
			while (!feof($fp)) {
			$res = fgets ($fp, 1024);
			if (strcmp ($res, "VERIFIED") == 0) {
			  // GET CHAR NAME
				$char_name = get_charname($realmdid, $char_id);
				
				if ($_POST['payment_status'] == 'Completed'
						  && $row['email'] == $_POST['receiver_email']
						  && $row['currency'] == $_POST['mc_currency']
						  && payment_amount_correct($payment_amount, $item_id)
						)
				{
				// Insert Into Donate Table
				mysql_query("INSERT INTO ".DB_UCP.".donate (email, amount, username, date, txn_id, item_name, realm)
					VALUES ('$payer_email', '$payment_amount', '$char_name', NOW(), '$txn_id', '$item_name', '$realmdid')");
					
							$logMsg = "--------------------------------------------------------------
							   DONATE SUCCESS: 
							   [CHARNAME]:{$char_name} [EMAIL]:{$_POST['payer_email']}
							   [ITEM]:{$_POST['item_name']} [AMOUNT]:{$_POST['mc_gross']} 
							   [EMAIL-Seller]:{$_POST['receiver_email']} \r\n";
							errorwrite($logMsg, 'donations.log');
				}
				else {
					$logMsg = "--------------------------------------------------------------
							   DONATE HACKING ATTEMP:
							   [STATUS]:{$_POST['payment_status']}
							   [CHARNAME]:{$char_name} 
							   [EMAIL-DB]:{$_POST['payer_email']} [EMAIL]:{$_POST['payer_email']}
							   [ITEM]:{$_POST['item_name']} [ITEM-ID]:{$item_id}
							   [DB-CURRENCY]:{$row['currency']} [CURRENCY]:{$_POST['mc_currency']}
							   [ExplodeString]:{$_POST['item_number']}
							   [AMOUNT-DB]:{$_POST['mc_gross']} 
							   [EMAIL-DB]:{$row['email']} [EMAIL-Seller]:{$_POST['receiver_email']} \r\n";
					errorwrite($logMsg, 'hackingattemp.log');
				}
			}
			else if (strcmp ($res, "INVALID") == 0) {
			// log for manual investigation
			}
			}
			}	
?>