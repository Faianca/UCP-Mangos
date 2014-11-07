<?php
class VoteActions {
	 
	 public function __construct($realmdb)
    {
     
		$this->realmdb = $realmdb;
    }
   
	
	function vote($siteid) {
		global $db, $showMsg;
		mysql_select_db(DB_UCP);
		$site = mysql_real_escape_string($siteid);
		$myip = $_SERVER['REMOTE_ADDR'];
		$time = time();
		$next = time()+60*60*12;
		$user = mysql_real_escape_string($_SESSION['username']);
		$date = date("Y-m-d");
		
		$topsite_sql = "SELECT * FROM ".DB_UCP.".topsites WHERE id='$site'";
		$topsite_row = $db->fetch_all($topsite_sql);
		if($topsite_row): 
		if(isset($topsite_row[0]['id'])): 
		$votelog_sql = "SELECT * FROM ".DB_UCP.".votelog WHERE site='$site' AND user='$user' ORDER by time DESC limit 1";
		$votelog_row = $db->fetch_all($votelog_sql);
		
		if(isset($votelog_row[0]['id']) && $votelog_row[0]['next'] >= $time):
		$showMsg = "You have already voted with in the last 12 hours. <a href='".BASE_PATH."/vote/index'>Go back!</a>";
		
		else:
		
		$logMsg = "[VOTELOG][USER]:{$user} [IP]:{$myip} [SITE]:{$site} [DATE]:{$date} [TIME]: {$time} [NEXT]:{$next} \r\n";
		errorwrite($logMsg, 'votelog.log');
		
		$data = array(	  'user' => $user, 
			'site' => $site, 
			'ip' => $myip,
			'date' => $date,
			'time' => $time,
			'next' => $next  );
		
		
		$db->insert('votelog', $data);
		
		$user_sql = "SELECT * FROM ".DB_UCP.".vote_points WHERE username='$user'";
		$user_row = $db->fetch_all($user_sql);
		
		if(!$user_row):
		$user_row[0]['points'] = 0;
		$points = $user_row[0]['points'] + 1;
		
		$datanew = array ( 'username' => $user,
			'points' => $points );
		$db->insert('vote_points', $datanew);
		else:
		$points = $user_row[0]['points'] + 1;
		$data = array ( 'points' => $points );		
		$db->update('vote_points', $data, "username='" . $user . "'");
		endif;
		//mysql_query("UPDATE account SET votes='$points' WHERE username='$user'");
		
		$showMsg = '<script type="text/javascript">
		function redirect() {
		document.location = "'.$topsite_row[0]['url'].'";
		}
		setTimeout("redirect()",1000);
		
		
		document.write("<span style=\'font-family:verdana;font-size:12px;\'>You are being redirected to the topsite...<br />If you don\'t get redirected, please click <a href=\''.$topsite_row[0]['url'].'\'>here</a></span>");</script>'; 
		endif; 
		endif;
		else:
		$showMsg = "Topsite not found. <a href='".BASE_PATH."/vote/index'>Go back!</a>";
		endif;
		mysql_select_db(DB_NAME);
		//return $error;
	}
	
	function buy($id) {
		global $db, $session, $vote, $chars;
		if($id):
		$id = (int)$id;
		else:
		redirect_to('vote/index/2');
		endif;
		//echo $id;
		$user = sanitize($session->value('username'));
		$user_sql = $db->query("SELECT * FROM ".DB_UCP.".vote_points WHERE username LIKE '$user'");
		$user_row = mysql_fetch_assoc($user_sql);
		
		$realmid = sanitize($session->value('realmid'));
		$itemid = $db->escape($id);
		$rewards_sql = $db->query("SELECT * FROM ".DB_UCP.".rewards WHERE itemid='$itemid' AND realm='$realmid'");
		$rewards_row = mysql_fetch_assoc($rewards_sql);
		//print_r($rewards_row);
		$character = $db->escape($session->value('guid'));
		if(isset($rewards_row['itemid'])): 
		//print_r($user_row);
		if($rewards_row['cost'] > $user_row['points']):
			redirect_to('vote/index/3');
		else:
		$newvotes = $user_row['points'] - $rewards_row['cost'];
		
		$db->query("UPDATE ".DB_UCP.".vote_points SET points='$newvotes' WHERE username ='$user'");
		
		$realm_q = $db->query("SELECT * FROM ".DB_REALM." WHERE id='$realmid'");
		$realm_r = mysql_fetch_assoc($realm_q);
		
		$myip = $_SERVER['REMOTE_ADDR'];
		$date = date("Y-m-d");
		$time = date("H:i");
		
		$db->query("INSERT INTO ".DB_UCP.".shoplog(`user`, `character`, `ip`, `itemid`, `date`, `time`, `realm`) VALUES('$user', '$character', '$myip', '$itemid', '$date', '$time', '$realmid')");
		
		if(isset($realm_r['id'])):
		
		$char_q = "SELECT * FROM ".$this->realmdb.".".DB_CHARS." WHERE guid = '$character'";
		$char_r = $db->fetch_all($char_q);
		
		$user = $chars->get_charname($session->value('guid'));
		$logMsg = "[VOTELOG][USER]:{$user} [IP]:{$myip} [REWARD]:{$itemid} [DATE]:{$date} \r\n";
		errorwrite($logMsg, 'rewardsvotelog.log');
		
		$vote->send_mail_soap($user, $itemid);
		
		else: 
			die("Invalid realm id"); 
		endif;
		endif;
		else:
		redirect_to('vote/index/4');
		endif;
		//redirect_to('vote/index/1');
		
	}
}