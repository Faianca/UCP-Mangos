<?php	

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

$url = $_GET['url'];
if($_GET['under'] == 'yes'):
include('under.php');
else:
require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');
endif;


