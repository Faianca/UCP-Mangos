<?php
  /**
   * Main Model
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: vanillamodel.class.php,v 3.0 
   */
class VanillaModel extends Sessions {
	protected $_model;

	function __construct() {
		
		global $inflect;

		  
		//$this->_limit = PAGINATE_LIMIT;
		//$this->_model = get_class($this);
		//$this->_table = strtolower('news');
	}

	function __destruct() {
	}
}
