<?php
   /**
   * Vote Controller
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: Votecontroller.php,v 3.0 
   */
class VoteController extends VanillaController {
	
	function beforeAction () {
		global $session, $chars;
		global $db;
		if($db->get_under() == '1' AND $session->value('username') != $session->isAdmin())
			redirect_to('index.php?under=yes');
		$error = '';
		if(!$session->checklogin())
			redirect_to('page/login');
	
		if($session->is_set('realmid')):	
		$x = $chars->get_chares2();
		if($session->is_set('guid')):	
		//print_r($x);
		foreach($x as $x):
		if($x['guid'] == $session->value('guid'))
		$error = 'clean'; 
		endforeach;
		if($error):
		//echo $error;
		else:
		$error = 'Tamper Data - IP LOGGED';
		$ip = getenv("REMOTE_ADDR");
		$logMsg = "[VOTELOG][TRIED TO CHANGE HIS GUID] [ACCOUNT]:{$_SESSION['username']} [IP]:{$ip} [TRIED TO CHANGE TO THIS GUID]:{$session->value('guid')} [DATE]:".date("F j, Y, g:i a")."\r\n";
		errorwrite($logMsg, 'hackingattemp.log');
		$_SESSION['guid'] = null;
		endif;
		endif;
		endif;
			
		if(post('guid')):
		$_SESSION['guid'] = (int)post('guid');
		redirect_to('vote/index/');
		endif;
		
	}
	
	function buy($id = null) {
		global $voteactions;
		if($id)
			$id = (int)$id;
	  	$voteactions->buy($id);
		$this->set('css', "0");
		
	}
	
	function index($id = null) {
		global $vote, $session;
		$i = '0';
		$id = (int)$id;
		$msgOK = '';
		$time = time();
		if($session->is_set('realmid')):
		$this->set('realmname', $vote->get_realm($session->value('realmid')));
		$this->set('shop', $vote->shop($session->value('realmid')));
		endif;
			
		if(post('realm')):
		$realmid = sanitize(post('realm'));
		$realmid = (int)$realmid;
		$_SESSION['realmid'] = $realmid;
		$session->get_realmsdb($realmid);
		redirect_to('vote/index/');
		endif;
		
		foreach($vote->vote1() as $top):
		$topsite[$i] = $top['name'];
		$alreadyvoted[$i] = $vote->alreadyvoted($top['id']);
		if(isset($alreadyvoted[$i][0]['id']) && $alreadyvoted[$i][0]['next'] >= $time):
		$voted[$i] = '<td><img src='.$top['image'].' /></td><td>'.$top['name'].'</td><td>Voted</td>'; 
		else:
		$voted[$i] = '<td><img src='.$top['image'].' /></td><td>'.$top['name'].'</td><td><a href="'.BASE_PATH.'/vote/add/'. $top['id'].'" target="_new">Vote Now</a></td>';	
		endif;
		$i++;
		endforeach;
		
		if($id == 1)
			$msgOK = "<span class='notice' >Sucess! You Are going to receive your item soon.</span>";
		if($id == 2)
			$msgOK = "<span class='alert' >Error! Contact Admin.</span>";
		if($id == 3)
			$msgOK = "<span class='alert' >Error! You dont have enough points.</span>";
		if($id == 4)
			$msgOK = "<span class='alert' >Error! Invalid Item.</span>";
		
		$this->set('msgOK', $msgOK);
		$this->set('realms', $vote->realms());
		$this->set('topsite', $voted);
		$this->set('points', $vote->ucp());
		$this->set('css', "0");
		
	}
	
	function add($id = null) {
		global $vote, $showMsg;
		if($id):
		$id = (int)$id;
		global $voteactions;
		$voteactions->vote($id);
		//$this->set('error', $voteactions->vote($id));
		else:
		$showMsg = "Precisas de algo?";
		endif;
		$this->set('error', $showMsg);
		$this->set('css', "0");		
	}
		
	function test(){
		global $vote, $session,$chars;
		$item = '45624';
		$user = $chars->get_charname($session->value('guid'));
		$vote->send_mail_soap($user,$item);
	}
	
	function afterAction() {
		
	}
	
	
}