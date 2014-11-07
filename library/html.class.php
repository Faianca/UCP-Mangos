<?php
  /**
   * Class Html
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: html.class.php,v 3.0 
   */
class HTML {
	private $js = array();

	function shortenUrls($data) {
		$data = preg_replace_callback('@(https?://([-\w\.]+)+(:\d+)?(/([\w/_\.]*(\?\S+)?)?)?)@', array(get_class($this), '_fetchTinyUrl'), $data);
		return $data;
	}

	private function _fetchTinyUrl($url) { 
		$ch = curl_init(); 
		$timeout = 5; 
		curl_setopt($ch,CURLOPT_URL,'http://tinyurl.com/api-create.php?url='.$url[0]); 
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1); 
		curl_setopt($ch,CURLOPT_CONNECTTIMEOUT,$timeout); 
		$data = curl_exec($ch); 
		curl_close($ch); 
		return '<a href="'.$data.'" target = "_blank" >'.$data.'</a>'; 
	}

	function sanitize($data) {
		return mysql_real_escape_string($data);
	}
        
	function cssswitch($id){
		echo ($id = '1') ? "slider.css" : "inner.css"; 	
	}
	
	function link($text,$path,$prompt = null,$confirmMessage = "Are you sure?") {
		$path = str_replace(' ','-',$path);
		if ($prompt) {
			$data = '<a href="javascript:void(0);" onclick="javascript:jumpTo(\''.BASE_PATH.'/'.$path.'\',\''.$confirmMessage.'\')">'.$text.'</a>';
		} else {
			$data = '<a href="'.BASE_PATH.'/'.$path.'">'.$text.'</a>';	
		}
		return $data;
	}

	function includeJs($fileName) {
		$data = '<script src="'.BASE_PATH.'/templates/'.TEMPLATE.'/js/'.$fileName.'.js"></script>';
		return $data;
	}
	function includeaJs($fileName) {
		$data = '<script src="'.BASE_PATH.'/templates/admin/js/'.$fileName.'.js"></script>';
		return $data;
	}
	
	function broadcast(){
		global $db;
		$sql = "SELECT broadcast FROM ".DB_UCP.".settings";
		$row = $db->first($sql);
		return $row['broadcast'];
	}
	function includeImage($fileName){
		$data = BASE_PATH.'/templates/'.TEMPLATE.'/images/'.$fileName;
		return $data;
	}
	function includeaImage($fileName){
		$data = BASE_PATH.'/templates/admin/img/'.$fileName;
		return $data;
	}
	function includeCss($fileName) {
		$data = '<link href="'.BASE_PATH.'/templates/'.TEMPLATE.'/css/'.$fileName.'.css" rel="stylesheet" type="text/css" />';
		return $data;
	}
	function includeaCss($fileName) {
		$data = '<link href="'.BASE_PATH.'/templates/admin/css/'.$fileName.'.css" rel="stylesheet" type="text/css" />';
		return $data;
	}
}