<?php
   /**
   * Page Controller
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: pagecontroller.php,v 3.0 
   */
class PageController extends VanillaController {
	
	function beforeAction () {
		global $db, $session, $vote;
		if($db->get_under() == '1' AND $session->value('username') != $session->isAdmin())
			redirect_to('index.php?under=yes');
		
		$this->set('realms', $vote->realms());
		if($session->is_set('realmid'))
		$this->set('realmname', $vote->get_realm($session->value('realmid')));
		
	}

	function login() {
		global $session, $msgError;
		if($session->checklogin())
			redirect_to(' ');
		
		if (isset($_POST['submit'])) {
			$session->login($_POST['username'], $_POST['password'], isset($_POST['remember']));
		}
		//if(isset($result)): 
     	       //  	 redirect_to('users/account/'); endif;
     	        
     	        
	         $this->set('css', "0");
	}
		
	function register() {
		global $session;
		if($session->checklogin())
			redirect_to(' ');
		
		if (isset($_POST['register']) && $_POST['register'] == 1): 
  		$username = $_POST['username'];
 		$pass = $_POST['password'];
  		$pass2 = $_POST['password2'];
  		$email = $_POST['email'];
		$pin1 = $_POST['pin_generated'];
		$pin2 = $_POST['pin_submitted'];
  		$session->register($username, $pass, $pass2, $email, $pin1, $pin2);
  		endif;
  		
     	         if(isset($result)) 
     	         	 redirect_to(' ');
     	         
	         $this->set('css', "0");
	}
	
	
	function logout() {
		global $db, $session;
		if ($session->checklogin())
			$session->logout();
	  
			redirect_to(" ");
      
			$db->close();	
	
	}
	function arenas() {
		global $session;
		if(post('realm')):
		$realmid = sanitize(post('realm'));
		$realmid = (int)$realmid;
		$_SESSION['realmid'] = $realmid;
		$session->get_realmsdb($realmid);
		redirect_to('page/arenas/');
		endif;
		$this->set('css', "0");

	}
	function arena($value = null) {
			global $session;
			if(post('realm')):
			$realmid = sanitize(post('realm'));
			$realmid = (int)$realmid;
			$_SESSION['realmid'] = $realmid;
			$session->get_realmsdb($realmid);
			redirect_to('page/arena/'.$value);
			endif;
		
		if(isset($value))
			$value = (int)$value;
			
			if($value == '5'):
			$this->set('team', $value);
	
			elseif($value == '2'):
			$this->set('team', $value);
	
			elseif($value == '3'):
			$this->set('team', $value);
		
			else:
			$this->set('team', '2');
			endif;
			//echo $value;
		$this->set('css', "0");

	}
	
	function connect() {
		$this->set('css', "0");
	       
	}
	
	function thankyou() {
		$this->set('css', "0");
	       
	}
            
	function index() {
		
		 $this->set('css', "0");
	       
	}
	
	function news() {
		global $db;
		$sql = ("SELECT * FROM ".DB_UCP.".news WHERE active=1 ORDER BY newsid DESC LIMIT 0,5");
		$row = $db->fetch_all($sql);
		$this->set('row', $row);
		$this->set('css', "0");
		
	       
	}

	function stats(){
		global $session;
		if(post('realm')):
		$realmid = sanitize(post('realm'));
		$realmid = (int)$realmid;
		$_SESSION['realmid'] = $realmid;
		$session->get_realmsdb($realmid);
		redirect_to('page/stats/');
		endif;
		 $this->set('css', "0");
	}
	
	function kills(){
		 global $serverinfo,$session;
		 	if(post('realm')):
		$realmid = sanitize(post('realm'));
		$realmid = (int)$realmid;
		$_SESSION['realmid'] = $realmid;
		$session->get_realmsdb($realmid);
		redirect_to('page/kills/');
		endif;
		 $this->set('row', $serverinfo->get_topkills());
		 $this->set('css', "0");
	}
	
	function banlist(){
		global $serverinfo, $session;
			if(post('realm')):
		$realmid = sanitize(post('realm'));
		$realmid = (int)$realmid;
		$_SESSION['realmid'] = $realmid;
		$session->get_realmsdb($realmid);
		redirect_to('page/banlist/');
		endif;
		$this->set('row', $serverinfo->get_banned());
		$this->set('css', "0");
	}
	
	function afterAction() {

	}


}
