<?php
   /**
   * Class chars Re-done
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: chars.class.php,v 3.0 
   */

class chars {

         var $username;
	 public $name;
	 public $guid;
	 
	   public function __construct($username,$id,$realmdb)
    {
        $this->username = $username;
		$this->id = $id;
		$this->realmdb = $realmdb;
    }

     function get_id() {
     	 global $db;
	 $sql = "SELECT * FROM ".DB_ACCOUNT." WHERE `username` = '{$this->username}'";
	 $row = $db->first($sql);
         return $row['id'];
    }	
	 
	 
	 function get_class($guid) {
	 $result = mysql_query("SELECT `class` FROM ".$this->realmdb.".".DB_CHARS." WHERE `guid` = '{$guid}'");
	 while ($row = mysql_fetch_assoc($result)) {
         $this->data_array = $row['class'];
      } // while
      return $this->data_array;
    }	
	  
	 function get_race($guid) {
	 
	 $result = mysql_query("SELECT `race` FROM ".$this->realmdb.".".DB_CHARS." WHERE `guid` = '{$guid}'");
	 while ($row = mysql_fetch_assoc($result)) {
         $this->data_array = $row['race'];
      } // while
      return $this->data_array;
    }	
	 
	  function get_gender($guid) {
	 
	 $result = mysql_query("SELECT `gender` FROM ".$this->realmdb.".".DB_CHARS." WHERE `guid` = '{$guid}'");
	 while ($row = mysql_fetch_assoc($result)) {
         $this->data_array = $row['gender'];
      } // while
      return $this->data_array;
    }	
	 
	 function online($guid) {
	 
	 $result = mysql_query("SELECT `online` FROM ".$this->realmdb.".".DB_CHARS." WHERE `guid` = '{$guid}'");
	 while ($row = mysql_fetch_assoc($result)) {
         $this->data_array = $row['online'];
      } // while
      return $this->data_array;
    }
	 
	 
	 
	function get_charname($guid) {
	
	$result = mysql_query("SELECT `name` FROM ".$this->realmdb.".".DB_CHARS." WHERE `guid` = '{$guid}'");
	 while ($row = mysql_fetch_assoc($result)) {
         $this->data_array = $row['name'];
      } // while
      return $this->data_array;
    }	
	
	
	 
    function get_chares() 
	{
		global $db;
	
		$sql = $db->query("SELECT `guid`, `name` FROM ".$this->realmdb.".".DB_CHARS." WHERE `account` = $this->id");
    
      ?>
	  
   	   	<form action="<?php echo $_SERVER['REQUEST_URI']; ?>" method="POST">
      			Select Character: 
			<select name="guid">
				<?php
				while($row = mysql_fetch_assoc($sql)) 
				{
					echo "<option value=\"",$row["guid"],"\">",$row["name"],"</option>";												   
				}  
				?>
			</select>
			<input type="submit" class="button"  value="submit" />
		
			</form>

			<?php  
     }
	 
		function get_charesdonation($donateid) 
	{
		global $db;
		$this->donate = $donateid;
		$sql = $db->query("SELECT `guid`, `name` FROM ".$this->realmdb.".".DB_CHARS." WHERE `account` = $this->id");
    
      ?>
	  
   	   	<form action="" method="POST">
      			Select Character: 
			<select name="guidonate">
				<?php
				while($row = mysql_fetch_assoc($sql)) 
				{
					echo "<option value=\"",$row["guid"],"\">",$row["name"],"</option>";												   
				}  
				?>
			</select>
			<input type="submit" class="button"  value="submit" />
		
			</form>

			<?php  
     }
	 

	function get_charescheck($donateid) 
	{
		global $db;
	
		$sql = $db->query("SELECT `guid`, `name` FROM ".$this->realmdb.".".DB_CHARS." WHERE `account` = $this->id");
    
      ?>
	  
   	   	<form action="users/checkout/<?php echo $donateid; ?>" method="POST">
      			Select Character: 
			<select name="guidcheck">
				<?php
				while($row = mysql_fetch_assoc($sql)) 
				{
					echo "<option value=\"",$row["guid"],"\">",$row["name"],"</option>";												   
				}  
				?>
			</select>
			<input type="submit" class="button"  value="submit" />
		
			</form>

			<?php  
     }
	 
	   function get_chares2() 
	{
		global $db;
		$x = $db->fetch_all("SELECT `guid`, `name` FROM ".$this->realmdb.".".DB_CHARS." WHERE `account` = $this->id");
		return $x;
     	}
} //Get chars 