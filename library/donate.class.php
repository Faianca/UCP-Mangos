<?php
   /**
   * Class Donate Re-done
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: donate.class.php,v 3.0 
   */

class Donate {

		function get_currency(){
			global $db;
				$sql = "SELECT * FROM ".DB_UCP.".settings";
				$row = $db->fetch_all($sql);
				return $row[0]['currency'];
		}
		
		function get_mail(){
			global $db;
				$sql = "SELECT * FROM ".DB_UCP.".settings";
				$row = $db->fetch_all($sql);
				return $row[0]['email'];
		}

}