<?php
  /**
   * Class Vote System
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: vote.class.php,v 3.0 
   */
class Vote{
	
	function alreadyvoted($siteid) {
		
		global $db;
		$myip = $_SERVER['REMOTE_ADDR'];
		$sql = "SELECT * FROM ".DB_UCP.".votelog WHERE site='$siteid' AND user='{$_SESSION['username']}' ORDER by time DESC limit 1";
		$row = $db->fetch_all($sql);
		return $row;
        }
	
	function shop($realmid) {
		global $db;
		$sql = "SELECT * FROM ".DB_UCP.".rewards WHERE realm='$realmid' ORDER by id ASC";
		$rewards = $db->fetch_all($sql);
		return $rewards;
	}
	function get_amount($id) {
		global $db;
		$sql = "SELECT * FROM ".DB_UCP.".donateitems WHERE id = '$id'";
		$amount = $db->first($sql);
		return $amount['amount'];
	}
	
	function get_rewardid($realmid, $id) {
		global $db;
		$sql = "SELECT * FROM ".DB_UCP.".rewards WHERE realm='$realmid' AND itemid = '$id'";
		$rewards = $db->fetch_all($sql);
		return $rewards;
	}
	
	function realms() {
		global $db;
		
		$sql = "SELECT id,name FROM ".DB_NAME.".".DB_REALM." ORDER BY id ASC";
		$row = $db->fetch_all($sql);
		return $row;
		
	}
	
	function get_realm($id) {
		global $db;
		$sql = "SELECT name FROM ".DB_NAME.".".DB_REALM." WHERE id = {$id}";
		$row = $db->fetch_all($sql);
		return $row;
		
	}
	function ucp() {
		global $db;
		$points = '0';
		$sql = ("SELECT points FROM ".DB_UCP.".vote_points WHERE `username` = '".$_SESSION['username']."'");	 
		$row = $db->first($sql);
		if($row):
		return $row['points'];
		else:
		return $points;
		endif;
	}	
	
	function vote1() {
		global $db;
		$sql = "SELECT * FROM ".DB_UCP.".topsites ORDER BY id ASC";
		$row = $db->fetch_all($sql);
		return $row;
   	} 
   	
   	function send_mail_ra($char_name,$subject,$message,$item,$itemcount,$user,$pass,$ip,$port)
   	{
   		$telnet = @fsockopen($ip, $port, $errno, $errstr, 3);
   		if($telnet)
   		{
   			fgets($telnet,1024);
   			$send1 = fputs($telnet, "USER ".$user."n");
   			sleep(3);
   			$send2 = fputs($telnet, "PASS ".$pass."n");
   			sleep(3);
   			if(($send1) && ($send2) && (fgets($telnet,1024) <> ""))
   			{
   				$send3 = fputs($telnet, "send items ".$char_name."' '".$subject."' '".$message."' '".$item.":".$itemcount."n");
   				sleep(5);
   				if($send3)
   				{
   					echo 'Item sent.';
   				}
   			}
   			fclose($telnet);
   		}
   		else
  	  	return $errstr;
        }
	        
        function LogSoapError($e)
        {
        	$date = date('d.m.Y');
        	$time = date('G:i:s');
        	$ip = $_SERVER['REMOTE_ADDR'];
        	$error = $e->getMessage();
        	$errorcode = $e->getCode();
        	$file = $e->getFile();
        	$line = $e->getLine();
        	
        	$errorstring = "\r\n";
        	
        	$f = fopen("soaperror.log", "a+");
        	fwrite($f, $errorstring);
        	fclose($f);
        	
        	print $errorstring;
        	
        }
        
        function send_mail_soap($username,$item)
        {
        	global $db, $session, $emuserver;
        	$uri = ($emuserver == '1')? "urn:MaNGOS" : "urn:TC";
			$client = new SoapClient(NULL,
        		array(
        			"user_agent"=>"HTTP RFC",
        			"location" => "http://127.0.0.1:7878/",
        			"uri" => $uri,
        			"style" => SOAP_RPC,
        			"login" => USER_SOAP,
        			"password" => PASS_SOAP
        			));
        	try
        	{
        		$soapcmd = $this->get_rewardid($session->value('realmid'), $item);
        		if($soapcmd[0]['stacks'] != 0):
        	        $command = "send item ".$username." \"WOWPT VOTE SYSTEM\" \"Caro jogador do WOWPT, Obrigado por nos ajudar a subir nos rankings! Aqui tem a nossa reward como agradecimento\" ".$item."[:".$soapcmd[0]['stacks']."]";
        		else:
        	        $command = "send item ".$username." \"WOWPT VOTE SYSTEM\" \"Caro jogador do WOWPT, Obrigado por nos ajudar a subir nos rankings! Aqui tem a nossa reward como agradecimento\" ".$item."";
        		endif;
        		$result = $client->executeCommand(new SoapParam($command, "command"));
        	}
        	catch(Exception $e)
        	{
        		
        		//print_r(array('sent'=>false, 'message'=>$e->getMessage()));
        	}
        	//print_r(array('sent'=>true, 'message'=>$result));
        	redirect_to('vote/index/1');
        }
    	
        
        
}
