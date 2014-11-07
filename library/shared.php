<?php
  /**
   * Class SHARED
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: shared.php,v 3.0 
   */
	
/** Check if environment is development and display errors **/

function setReporting() {
if (DEVELOPMENT_ENVIRONMENT == true) {
	error_reporting(E_ALL);
	ini_set('display_errors','On');
} else {
	error_reporting(E_ALL);
	ini_set('display_errors','Off');
	ini_set('log_errors', 'On');
	ini_set('error_log', ROOT.DS.'tmp'.DS.'logs'.DS.'error.log');
}
}

/** Check for Magic Quotes and remove them **/

function stripSlashesDeep($value) {
	$value = is_array($value) ? array_map('stripSlashesDeep', $value) : stripslashes($value);
	return $value;
}

function removeMagicQuotes() {
if ( get_magic_quotes_gpc() ) {
	$_GET    = stripSlashesDeep($_GET   );
	$_POST   = stripSlashesDeep($_POST  );
	$_COOKIE = stripSlashesDeep($_COOKIE);
}
}

/** Check register globals and remove them **/

function unregisterGlobals() {
    if (ini_get('register_globals')) {
        $array = array('_SESSION', '_POST', '_GET', '_COOKIE', '_REQUEST', '_SERVER', '_ENV', '_FILES');
        foreach ($array as $value) {
            foreach ($GLOBALS[$value] as $key => $var) {
                if ($var === $GLOBALS[$key]) {
                    unset($GLOBALS[$key]);
                }
            }
        }
    }
}

/** Secondary Call Function **/

function performAction($controller,$action,$queryString = null,$render = 0) {
	
	$controllerName = ucfirst($controller).'Controller';
	$dispatch = new $controllerName($controller,$action);
	$dispatch->render = $render;
	return call_user_func_array(array($dispatch,$action),$queryString);
}

/** Routing **/

function routeURL($url) {
	global $routing;

	foreach ( $routing as $pattern => $result ) {
            if ( preg_match( $pattern, $url ) ) {
				return preg_replace( $pattern, $result, $url );
			}
	}

	return ($url);
}

/** Main Call Function **/

function callHook() {
	global $url;
	global $default;

	$queryString = array();

	if (!isset($url)) {
		$controller = $default['controller'];
		$action = $default['action'];
	} else {
		$url = routeURL($url);
		$urlArray = array();
		$urlArray = explode("/",$url);
		$controller = $urlArray[0];
		array_shift($urlArray);
		if (isset($urlArray[0])) {
			$action = $urlArray[0];
			array_shift($urlArray);
		} else {
			$controller = $default['controller'];
			$action = 'index'; // Default Action
		}
		$queryString = $urlArray;
	}
	
		
	$controllerName = ucfirst($controller).'Controller';

	$dispatch = new $controllerName($controller,$action);
	
	if ((int)method_exists($controllerName, $action)) {
		call_user_func_array(array($dispatch,"beforeAction"),$queryString);
		call_user_func_array(array($dispatch,$action),$queryString);
		call_user_func_array(array($dispatch,"afterAction"),$queryString);
	} else {
		/* Error Generation Code Here */
		//echo "error";
	}
}


/** Autoload any classes that are required **/

function __autoload($className) {
	if (file_exists(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php')) {
		require_once(ROOT . DS . 'library' . DS . strtolower($className) . '.class.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'controllers' . DS . strtolower($className) . '.php');
	} else if (file_exists(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php')) {
		require_once(ROOT . DS . 'application' . DS . 'models' . DS . strtolower($className) . '.php');
	} else {
		/* Error Generation Code Here */
	}
}


/** GZip Output **/

function gzipOutput() {
    $ua = $_SERVER['HTTP_USER_AGENT'];

    if (0 !== strpos($ua, 'Mozilla/4.0 (compatible; MSIE ')
        || false !== strpos($ua, 'Opera')) {
        return false;
    }

    $version = (float)substr($ua, 30); 
    return (
        $version < 6
        || ($version == 6  && false === strpos($ua, 'SV1'))
    );
}
 
  /**
   * redirect_to()
   * 
   * @param mixed $location
   * @return
   */
  function redirect_to($location)
  {
      if (!headers_sent())
          header('Location: ' . BASE_PATH.'/'.$location);
      else {
          echo '<script type="text/javascript">';
          echo 'window.location.href="' .BASE_PATH.'/'.$location . '";';
          echo '</script>';
          echo '<noscript>';
          echo '<meta http-equiv="refresh" content="0;url=' . BASE_PATH.'/'.$location . '" />';
          echo '</noscript>';
      }
  }

  /**
   * countEntries()
   * 
   * @param mixed $table
   * @param string $where
   * @param string $what
   * @return
   */
  function countEntries($table, $where = '', $what = '')
  {
      global $db;
      if (!empty($where) && isset($what)) {
          $q = "SELECT COUNT(*) FROM " . $table . "  WHERE " . $where . " = '" . $what . "' LIMIT 1";
      } else
          $q = "SELECT COUNT(*) FROM " . $table . " LIMIT 1";
      
      $record = $db->query($q);
      $total = $db->fetchrow($record);
      return $total[0];
  }
  
  
  /**
   * display_msg()
   * 
   * @return
   */
  function display_msg()
  {
      global $msgOk, $msgError, $msgAlert, $msgInfo, $msgSys, $showMsg;
      
      if (!empty($msgOk)) {
          echo "<div id=\"fader\"><div class=\"msgOk\">" . $msgOk . "</div></div>
    <script type=\"text/javascript\"> 
    // <![CDATA[
    $(document).ready(function() {       
      setTimeout(function() {       
        $(\"#fader\").customFadeOut(\"slow\" ,    
        function() {       
          $(\"#fader\").remove();  
        });
      },
      4000);
    });
    // ]]>
    </script>";
      }
      if (!empty($msgError)) {
          echo "<div id=\"fader\"><div class=\"msgError\">" . $msgError . "</div></div>
    <script type=\"text/javascript\"> 
    // <![CDATA[
    $(document).ready(function() {       
      setTimeout(function() {       
        $(\"#fader\").customFadeOut(\"slow\",    
        function() {       
          $(\"#fader\").remove();  
        });
      },
      4000);
    });
    // ]]>
    </script>";
      }
      if (!empty($msgAlert)) {
          echo "<div id=\"fader\"><div class=\"msgAlert\">" . $msgAlert . "</div></div>
    <script type=\"text/javascript\"> 
    // <![CDATA[
    $(document).ready(function() {       
      setTimeout(function() {       
        $(\"#fader\").customFadeOut(\"slow\",    
        function() {       
          $(\"#fader\").remove();  
        });
      },
      4000);
    });
    // ]]>
    </script>";
      }
      if (!empty($msgInfo)) {
          echo "<div id=\"fader\"><div class=\"msgInfo\">" . $msgInfo . "</div></div>
    <script type=\"text/javascript\"> 
    // <![CDATA[
    $(document).ready(function() {       
      setTimeout(function() {       
        $(\"#fader\").customFadeOut(\"slow\",    
        function() {       
          $(\"#fader\").remove();  
        });
      },
      4000);
    });
    // ]]>
    </script>";
      }
      echo $showMsg;
  }
  
  /**
   * getChecked()
   * 
   * @param mixed $row
   * @param mixed $status
   * @return
   */
  function getChecked($row, $status)
  {
      if ($row == $status) {
          echo "checked=\"checked\"";
      }
  }
  
  /**
   * post()
   * 
   * @param mixed $var
   * @return
   */
  function post($var)
  {
      if (isset($_POST[$var]))
          return $_POST[$var];
  }
  
  /**
   * get()
   * 
   * @param mixed $var
   * @return
   */
  function get($var)
  {
      if (isset($_GET[$var]))
          return $_GET[$var];
  }
  
  /**
   * getDays()
   * 
   * @param mixed $number
   * @param mixed $term
   * @return
   */

  function getDays($number, $term)
  {
      switch ($term) {
          case 'D':
              return $number;
              break;
          case 'W':
              return($number * 7);
              break;
          case 'M':
              return($number * 31);
              break;
          case 'Y':
              return($number * 365);
              break;
      }
  }
  
  /**
   * getTerm()
   * 
   * @param mixed $term
   * @return
   */
  function getTerm($term)
  {
      switch ($term) {
          case 'D':
              return 'Days';
              break;
          case 'W':
              return 'Weeks';
              break;
          case 'M':
              return 'Months';
              break;
          case 'Y':
              return 'Years';
              break;
      }
  }
  
  /**
   * format_date()
   * 
   * @param mixed $date
   * @param mixed $style
   * @return
   */
  function format_date($date, $style = null)
  {
      $date = date("m/d/Y g:i A T", strtotime($date));
      return $date;
  }
  
  /**
   * getDifference()
   * 
   * @param mixed $startDate
   * @param mixed $endDate
   * @param integer $format
   * @return
   */
  function getDifference($startDate, $endDate, $format = 6)
  {
      @list($date, $time) = explode(' ', $endDate);
      $startdate = explode("-", $date);
      $starttime = explode(":", $time);
      
      list($date, $time) = explode(' ', $startDate);
      $enddate = explode("-", $date);
      $endtime = explode(":", $time);
      
      $secondsDifference = @mktime($endtime[0], $endtime[1], $endtime[2], $enddate[1], $enddate[2], $enddate[0]) - @mktime($starttime[0], $starttime[1], $starttime[2], $startdate[1], $startdate[2], $startdate[0]);
      
      switch ($format) {
          case 0:
              return $secondsDifference;
          case 1:
              return floor($secondsDifference / 60);
          case 2:
              return floor($secondsDifference / 60 / 60);
          case 3:
              return floor($secondsDifference / 60 / 60 / 24);
          case 4:
              return floor($secondsDifference / 60 / 60 / 24 / 7);
          case 5:
              return floor($secondsDifference / 60 / 60 / 24 / 7 / 4);
          default:
              return floor($secondsDifference / 365 / 60 / 60 / 24);
      }
  }
  
  /**
   * sanitize()
   * 
   * @param mixed $string
   * @param bool $trim
   * @return
   */
  function sanitize($string, $trim = false)
  {
      $string = filter_var($string, FILTER_SANITIZE_STRING);
      $string = trim($string);
      $string = stripslashes($string);
      $string = strip_tags($string);
      $string = str_replace(array('‘', '’', '“', '”'), array("'", "'", '"', '"'), $string);
      if ($trim)
          $string = substr($string, 0, $trim);
      
      return $string;
  }
  
  function errorwrite($string, $errorlog){

  $myFile = ROOT . DS . 'tmp' . DS . 'logs' . DS .$errorlog;
  $fh = fopen($myFile, 'a');
  $stringData = $string;
  fwrite($fh, $stringData);
  fclose($fh);	  	  
  }

  /**
   * self()
   * 
   * @return
   */
  function self()
  {
      return htmlspecialchars($_SERVER['PHP_SELF']);
  }
  

/** Get Required Files **/

gzipOutput() || ob_start("ob_gzhandler");


$cache = new Cache();
$inflect = new Inflection();

 //Start the database
  $db = new Database(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
  
  //connect here
  $db->connect();
  
  if(!defined('TEMPLATE'))
  	  define('TEMPLATE', $db->get_template());
 
  //session starts
  $session = new Sessions();
  
  //Server Info Starts
   $settings = new Settings();
	 
	$vote = new Vote();
	
    if($session->is_set('realmid')):
		$realmdb = $session->get_realmsdb($session->value('realmid'));
		$serverinfo = new serverinfo($realmdb);
		$voteactions = new VoteActions($realmdb);
		else:
				$realmdb1 = 1;
				$realmdb = $session->get_realmsdb($realmdb1);
				$serverinfo = new serverinfo($realmdb);
				$voteactions = new VoteActions($realmdb);
	endif;
	
  // chars starts
  if($session->checklogin()):
  $donate = new Donate();
  
  if($session->is_set('realmid')):
  $chars = new chars($session->value('username'), $session->value('id'), $realmdb);
  $trans = new trans($chars->get_charname($session->value('guid')),$session->value('guid'),$vote->ucp(),$chars->get_id(),$realmdb);

  if($session->is_set('guid')):
                $char = new char($chars->get_race($session->value('guid')),$chars->get_class($session->value('guid')),$chars->get_gender($session->value('guid')));
                $verify = new verify();
  endif;
  endif;
  endif;
setReporting();
removeMagicQuotes();
unregisterGlobals();
callHook();
 

?>