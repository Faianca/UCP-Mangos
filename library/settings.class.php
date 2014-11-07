<?php
   /**
   * Class Settings
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: settings.class.php,v 3.0 
   */

class Settings {

		function get_settings(){
			global $db;
				$sql = "SELECT * FROM ".DB_UCP.".settings";
				$row = $db->fetch_all($sql);
				return $row[0];
		}

}