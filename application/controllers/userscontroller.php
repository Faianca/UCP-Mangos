<?php
   /**
   * Users Controller
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: userscontroller.php,v 3.0 
   */
class UsersController extends VanillaController {
	
	function beforeAction () {
                global $session, $chars, $db;
		if($db->get_under() == '1' AND $session->value('username') != $session->isAdmin())
			redirect_to('index.php?under=yes');
			
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
		if(!empty($error)):
		//echo $error;
		else:
		$error = 'Tamper Data - IP LOGGED';
		$ip = getenv("REMOTE_ADDR");
		$logMsg = "[CHARACTERTOOLS][TRIED TO CHANGE HIS GUID] [ACCOUNT]:{$_SESSION['username']} [IP]:{$ip} [TRIED TO CHANGE TO THIS GUID]:{$session->value('guid')} [DATE]:".date("F j, Y, g:i a")."\r\n";
		errorwrite($logMsg, 'hackingattemp.log');
		$_SESSION['guid'] = null;
		endif;
		endif;
		endif;
		
		if(post('guid')):
			$_SESSION['guid'] = (int)post('guid');
			redirect_to('users/tools/');
			endif;
			
		
	}
	
	function checkout($id = null) {
		global $session, $db, $vote;
			
		if(post('guidonate')):
			$id = (int)$id;
			$_SESSION['guid'] = (int)post('guidonate');
			redirect_to('users/checkout/'.$id);
			endif;
			
		if(post('realm')):
		$id = (int)$id;
		$realmid = sanitize(post('realm'));
		$realmid = (int)$realmid;
		$_SESSION['realmid'] = $realmid;
		$session->get_realmsdb($realmid);
		redirect_to('users/checkout/'.$id);
		endif;
		

	if($session->is_set('realmid'))
		$this->set('realmname', $vote->get_realm($session->value('realmid')));
		
		
		$id = (int)$id;
		
		$this->set('donateid', $id);
		
		if($id == null)
			redirect_to('users/donate/');
		
		$sql = "SELECT * FROM ".DB_UCP.".donateitems WHERE id='".$id."'";
		$result = $db->fetch_all($sql);
		
		$this->set('realms', $vote->realms());
		$this->set('row', $result);
		$this->set('user', $session->value('username'));
		$this->set('css', "0");
	}
	
	
	
	function donate() {
		global $db, $session, $vote;
		
		$usrow = $session->getDonationItems();
		$this->set('usrow', $usrow);
		
		$this->set('css', "0");
	}
	
	function account() {
		 global $toolscost;
		 $this->set('toolscost', $toolscost);
		 $this->set('username', Sessions::value('username'));
		 $this->set('account', "Welcome Faianca");
		 $this->set('css', "0");
	       
	}
	
	function tools() {
		global $session, $trans, $msgOK, $vote,$chars;
			
		if(post('realm')):
		$realmid = sanitize(post('realm'));
		$realmid = (int)$realmid;
		$_SESSION['realmid'] = $realmid;
		$session->get_realmsdb($realmid);
		redirect_to('users/tools/');
		endif;
	if($session->is_set('realmid'))
		$this->set('realmname', $vote->get_realm($session->value('realmid')));
		
		if($session->is_set('guid')):
		if (post('class'))
			$trans->changefaction(post('class'));	
		if (post('race'))
			$trans->changerace(post('race'));	
		if (isset($_POST['gender']))
			$trans->changegender($_POST['gender']);	
		if (post('name'))
			$trans->changename(post('name'));
		if (post('account'))
			$trans->changeAccount(post('account'));
		endif;
		$this->set('realms', $vote->realms());
		$this->set('points', $vote->ucp());
		$this->set('css', "0");
		
		
	}
	
	function edit() {
		global $session, $msgAlert, $showMsg;
		if(post('edit_user'))
		$session->updateUser($session->value('id'));
			//print_r($_POST);
		$this->set('css', "0");
		
	}

	function afterAction() {
		
		
	}


}
