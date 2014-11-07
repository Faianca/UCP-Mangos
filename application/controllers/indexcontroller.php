<?php
   /**
   * Index Controller
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: indexcontroller.php,v 3.0 
   */
class IndexController extends VanillaController {
	
	function beforeAction () {
		 //Website UnderConstruction
		global $db, $session;
		if($db->get_under() == '1' AND $session->value('username') != $session->isAdmin())
			redirect_to('index.php?under=yes');
	}

	
	function index() {
		 $this->set('css', "1");
	       
	}

	function afterAction() {

	}


}