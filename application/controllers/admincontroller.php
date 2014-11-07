<?php
   /**
   * Admin Controller
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: admincontroller.php,v 3.0 
   */
class AdminController extends VanillaController {
	
	function beforeAction () {
		global $session;
		if(!$session->checklogin())
			redirect_to(' ');
			
		if($session->value('username') != $session->isAdmin())
			redirect_to("");
	}
	
	function settings($value = null){
		global $db, $msgOK, $settings;
		
		$msgOK = '';
		if($value == '1')
			$msgOK = "<div id='success' class='info_div'><span class='ico_success'>Yeah! Success! You Changed your Template!</span></div>";
		if($value == '2')
			$msgOK = "<div id='fail' class='info_div'><span class='ico_fail'>Failed! Error! You Might not have the template!</span></div>";			
		if($value == '3')
			$msgOK = "<div id='success' class='info_div'><span class='ico_success'>Yeah! Success! You update your Settings!</span></div>";			
			
		
		$this->set('msgOK', $msgOK);
		$target = ROOT.'/public/templates/'; 
		$weeds = array('.', '..'); 
		$directories = array_diff(scandir($target), $weeds);
		$settings = $settings->get_settings();
		$this->set('settings', $settings);
		$this->set('target', $target);
	 	$this->set('directories', $directories);
	 	$this->set('template', $db->get_template());
	}
	
	function update_settings_paypal(){
				global $db;
				if(post('email')):
				$email = sanitize(post('email'));
				$db->query('UPDATE '.DB_UCP.'.settings SET email = "'.$email.'"');
				endif;
				if(post('currency')):
				$currency = sanitize(post('currency'));
				$db->query('UPDATE '.DB_UCP.'.settings SET currency = "'.$currency.'"');
				endif;
				redirect_to('admin/settings/3');
	}
	
	function update_settings_site(){
				global $db;
				if(post('sitename')):
				$sitename = sanitize(post('sitename'));
				$db->query('UPDATE '.DB_UCP.'.settings SET sitename = "'.$sitename.'"');
				endif;
				if(post('underconstruction')):
				$underconstruction= (int)post('underconstruction');
				$db->query('UPDATE '.DB_UCP.'.settings SET underconstruction = "'.$underconstruction.'"');
				endif;
					if(post('forum')):
								$forum = sanitize(post('forum'));
				$db->query('UPDATE '.DB_UCP.'.settings SET forum = "'.$forum.'"');
				endif;
				redirect_to('admin/settings/3');
	}
	function broadcast($id = null){
		global $session, $db, $settings;
		$msgOK = '';
		if(post('broadcast') && post('broadcast') == '1' && post('content')):
			$db->query("UPDATE ".DB_UCP.".settings SET broadcast = '".sanitize(post('content'))."'");
			if($db->affected()):
				redirect_to('admin/broadcast/1');
			else:
				redirect_to('admin/broadcast/2');

			endif;
	  	endif;
	  		if($id == '2')
	  			$msgOK = "<div id='fail' class='info_div'><span class='ico_cancel'>Ups, there was an error</span></div>";
	  		if($id == '1')
	  			$msgOK = "<div id='success' class='info_div'><span class='ico_success'>Yeah! Success!</span></div>";
		$settings = $settings->get_settings();
	  	$this->set('msgOK', $msgOK);
	  	$this->set('broadcast', $settings['broadcast']);
	}
	
	function updatesettings($value1 = null){
		global $db;
		if($value1):
		$value1 = sanitize($value1);
		$target = ROOT.'/public/templates/'; 
		$weeds = array('.', '..'); 
		$directories = array_diff(scandir($target), $weeds);
		foreach($directories as $value):
		if(is_dir($target.$value)):
		if($value == $value1):
		$db->query('UPDATE '.DB_UCP.'.settings SET template = "'.$value1.'"');
		redirect_to('admin/settings/1');
		
		endif;
		else:
		redirect_to('admin/settings/2');
		endif;
		endforeach;
		else:
		redirect_to('admin/settings/');
		endif;	
	}
	
	function template($name) {
		global $db;
		if(isset($newsid)):
		mysql_select_db(DB_UCP);
		$db->delete('news', "newsid='".$newsid."'");
		redirect_to('admin/news/3');
		endif;		
	}
	
	function index() {
		global $serverinfo;
		 $this->set('maxplayers', $serverinfo->get_online());
		 $this->set('horde', $serverinfo->get_horde());
		 $this->set('alliance', $serverinfo->get_alliance());
		 $this->set('serveronline', $serverinfo->get_online());
		 $this->set('playersonline', $serverinfo->get_playersonline());
		 $this->set('listchars', $serverinfo->list_chars());
		 $this->set('listacc', $serverinfo->list_acc());
		  $this->set('getban', $serverinfo->get_ban());
	       	}
	
	
	function donate($value = null) {
		global $db, $session;
		$msgOK = '';
		if(post('item') and post('status') and post('amount') ):
		        $data = array('title' => post('item'),
		        	      'status' => post('status'),
		        	      'amount' => post('amount'));
		        mysql_select_db(DB_UCP);
		        $db->insert('donateitems', $data);
		   	if($db->affected()):
			redirect_to('admin/donate/2');
			else:
			$msgOK = "<div id='fail' class='info_div'><span class='ico_cancel'>Ups, there was an error</span></div>";
		endif;
		endif;
		
		if(post('deletedonation')):
		$deletedonation = (int)post('deletedonation');
		$db->query("DELETE FROM ".DB_UCP.".donateitems WHERE id='$deletedonation'");
		if($db->affected()):
			redirect_to('admin/donate/1');
			else:
			$msgOK = "<div id='fail' class='info_div'><span class='ico_cancel'>Ups, there was an error</span></div>";
		endif;
		endif;
		if($value == '1')
			$msgOK = "<div id='success' class='info_div'><span class='ico_success'>Yeah! Success! Deleted!</span></div>";
		if($value == '2')
			$msgOK = "<div id='success' class='info_div'><span class='ico_success'>Yeah! Success! You Added a new Donation!</span></div>";
				
		$this->set('msgOK', $msgOK);
		$sql = $session->getDonationItems();
		$this->set('row1', $sql);
		$usrow = $session->getDonation();
		$this->set('usrow', $usrow);
		$status = array('0' => 'New',
				'1' => 'Hot',
				'2' => 'Normal');
		$this->set('status', $status);
	}
	
	function active($status = null) {
		global $db;
		if(isset($status) && isset($_GET['id'])):
		if($status == '1'):
			$data['active'] = $status;
			mysql_select_db(DB_UCP);
			$db->update('news', $data, "newsid='".(int)$_GET['id']."'");
		endif;
		if($status == '0'):
			$data['active'] = $status;
			mysql_select_db(DB_UCP);
			$db->update('news', $data, "newsid='".(int)$_GET['id']."'");
		
		endif;
		endif;
		$msgOK = "Updated";
		
		redirect_to('admin/news/');
	}
	
	function donateactive($status = null) {
		global $db;
		if(isset($status) && isset($_GET['id'])):
		if($status == '1'):
			$data['send'] = $status;
			mysql_select_db(DB_UCP);
			$db->update('donate', $data, "id='".(int)$_GET['id']."'");
		endif;
		if($status == '0'):
			$data['send'] = $status;
			mysql_select_db(DB_UCP);
			$db->update('donate', $data, "id='".(int)$_GET['id']."'");
		
		endif;
		endif;
		$msgOK = "Updated";
		
		redirect_to('admin/donate/');
	}
	
	function del($newsid = null) {
		global $db;
		if(isset($newsid)):
		mysql_select_db(DB_UCP);
		$db->delete('news', "newsid='".$newsid."'");
		redirect_to('admin/news/3');
		endif;
		
		
	}
	
	function news($status = null) {
		global $db, $session, $msgOK, $pager;
		$msgOK = '';
		
		if($status == '1')
			$msgOK = "<div id='success' class='info_div'><span class='ico_success'>Yeah! Success! Edited!</span></div>";
		if($status == '2')
			$msgOK = "<div id='success' class='info_div'><span class='ico_success'>Yeah! Success! You Added a New Message!</span></div>";
		if($status == '3')
			$msgOK = "<div id='success' class='info_div'><span class='ico_success'>Yeah! Success! You Deleted one New!</span></div>";
					
		$this->set('msgOK', $msgOK);
		$usrow = $session->getNews();
		$this->set('usrow', $usrow);
		if (post('news') && post('news') == '1')
	  	$session->addNew();
         	
	}
	
	function edit($newsid = null) {
		global $db, $pager;
	
		if(post('editnews') && isset($newsid)):
		$data = array ( 'title' => post('title'),
			 	'content' => post('content'));
		mysql_select_db(DB_UCP);
		$db->update('news', $data, "newsid='" . $newsid . "'"); 
		redirect_to('admin/news/1');
		endif;
		if(isset($newsid)):
		$sql = "Select * From ".DB_UCP.".news WHERE newsid = {$newsid}";
		$row = $db->fetch_all($sql);
		$this->set('row', $row);
		endif;
		
	}
	
	function topsites() {
		global $db, $msgOK;
		$sql = "SELECT * FROM ".DB_UCP.".topsites ORDER by id ASC";
		$row = $db->fetch_all($sql);
		$this->set('topsites', $row);
		if(post('addtopsitename') && post('addtopsiteurl') && post('addtopsiteimage')):
		 $addtopsitename = sanitize(post('addtopsitename'));
		 $addtopsiteurl = sanitize(post('addtopsiteurl'));
		 $addtopsiteimage = sanitize(post('addtopsiteimage'));
		 $db->query("INSERT INTO ".DB_UCP.".topsites(name, url, image) VALUES('$addtopsitename', '$addtopsiteurl', '$addtopsiteimage')");
		 redirect_to('admin/topsites/');
		 endif;
		if(post('deletetopsite')):
		$deletetopsite = sanitize(post('deletetopsite'));
		$db->query("DELETE FROM ".DB_UCP.".topsites WHERE id='$deletetopsite'");
		redirect_to('admin/topsites/');
		endif;
		
	}
	
	function rewards() {
		global $db, $msgOK;
		$msgOK = '';
		$sql = "SELECT * FROM ".DB_UCP.".rewards ORDER by realm ASC";
		$sql = $db->fetch_all($sql);
		$sql2 = "SELECT * FROM ".DB_NAME.".".DB_REALM." ORDER by id ASC";
		$sql2 = $db->fetch_all($sql2);
		
		if(post('additemname')):
		if(!empty($_POST['additemid'])):
			$additemid = (int)($_POST['additemid']);  
			else: 
			$additemid = 123; 
			endif;
		
		$additemname = sanitize($_POST['additemname']);
		$additemstack = (int)$_POST['additemstack'];
			
		if(!empty($_POST['additemcost'])):
			$additemcost = (int)($_POST['additemcost']); 
			else: 
			$additemcost = 123; 
			endif;
			
		$additemcolor = sanitize($_POST['additemcolor']);
		$additemrealm = (int)($_POST['additemrealm']);
	
			
		$db->query("INSERT INTO ".DB_UCP.".rewards(itemid, name, cost, color, realm, stacks) VALUES('$additemid', '$additemname', '$additemcost', '$additemcolor', '$additemrealm', '$additemstack')");
		if($db->affected()):
			$msgOK = "<div id='success' class='info_div'><span class='ico_success'>Yeah! Success!</span></div>";
			else:
			$msgOK = "<div id='fail' class='info_div'><span class='ico_cancel'>Ups, there was an error</span></div>";
		endif;
		endif;
		
		if(post('deletereward')):
		$deletereward = (int)post('deletereward');
		$db->query("DELETE FROM ".DB_UCP.".rewards WHERE id='$deletereward'");
		if($db->affected()):
			$msgOK = "<div id='success' class='info_div'><span class='ico_success'>Yeah! Success!</span></div>";
			else:
			$msgOK = "<div id='fail' class='info_div'><span class='ico_cancel'>Ups, there was an error</span></div>";
		endif;
		endif;
		
		
		$this->set('msgOK', $msgOK);
		$this->set('row1', $sql);
		$this->set('row2', $sql2);
		
		
	}
	
	function afterAction() {

	}


}