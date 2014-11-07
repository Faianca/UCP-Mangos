<?php  
   /**
   * Class Template
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: template.class.php,v 3.0 
   */
   
class Template {
	
	protected $variables = array();
	protected $_controller;
	protected $_action;
	
	function __construct($controller,$action) {
		$this->_controller = $controller;
		$this->_action = $action;
	}

	/** Set Variables **/

	function set($name,$value) {
		$this->variables[$name] = $value;
	}

	/** Display Template **/
	
    function render($doNotRenderHeader = 0) {
		
		$html = new HTML;
		extract($this->variables);
		
		if ($doNotRenderHeader == 0) {
			
			if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'header.php')) {
				include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'header.php');
			} else {  
				include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . 'header.php');
			}
		}

		if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . $this->_action . '.php')) {
			include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . $this->_action . '.php');		 
		}
			
		if ($doNotRenderHeader == 0) {
			if (file_exists(ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'footer.php')) {
				include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS . $this->_controller . DS . 'footer.php');
			} else {
				include (ROOT . DS . 'application' . DS . 'views' . DS . TEMPLATE . DS .'footer.php');
			}
		}
    }

}