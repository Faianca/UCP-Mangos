<?php
   /**
   * Server Stats
   *
   * @Website / User Cpanel for Mangos/Trinity etc..
   * @copyright 2010 Jorge Faianca
   * @version $id: class.server.php,v 2.0 
   */

	  
class serverinfo {
       
	   public function __construct($realmdb)
    {
     
		$this->realmdb = $realmdb;
    }
   
     function get_uptime(){
     	     global $db;
     	     $sql = "SELECT * FROM ".DB_NAME.".`uptime` ORDER BY `starttime` DESC LIMIT 1";  
     	     $uptime_results = $db->fetch_all($sql);

     	     if ($uptime_results[0]['uptime'] > 86400) :
     	     	     $uptime =  round(($uptime_results[0]['uptime'] / 24 / 60 / 60),2)." Days";
    	     
    	     elseif($uptime_results[0]['uptime'] > 3600):
    	     	     $uptime =  round(($uptime_results[0]['uptime'] / 60 / 60),2)." Hours";
    	    
    	     else:
    	     	     $uptime =  round(($uptime_results[0]['uptime'] / 60),2)." Min";
    	     endif;
    	     return $uptime;

} // uptime Ends

	function get_online() {
		global $db;
		if (! $sock = @fsockopen("127.0.0.1", "3306", $num, $error, 3)):
                          $online = 'Offline';
                      else:
                               $online = 'Online';
                               fclose($sock); 
                endif;
       	return $online;
      	} // End get_online

	function get_playersonline() {
		global $db;
		$sql = "SELECT Count(Online) FROM ".$this->realmdb.".".DB_CHARS." WHERE `online` = 1";
		$row = $db->fetch_all($sql);
		$online = $row[0]["Count(Online)"];
		if(!$online)
			$online = 0;
		return $online;
	} // End get_players online

	function get_maxonline() {
		global $db;
		$max = $db->query("select max(`maxplayers`) from uptime");    
		$max = mysql_result($max,0);
		return $max;

	} // End get_maxonline
	
	function get_horde() {
		global $db;
		$sql = "SELECT Count(guid) FROM ".$this->realmdb.".".DB_CHARS." WHERE race = '2' OR race = '10' OR race = '8' OR race = '5' OR race = '6'";    
		
		$row = $db->fetch_all($sql);
		if($row):
		$horde = $row[0]["Count(guid)"];
		else:
		$horde = 0;
		endif;
		return $horde;

	} // End get_maxonline

	function get_alliance() {
		global $db;
		$sql = "SELECT Count(guid) FROM ".$this->realmdb.".".DB_CHARS." WHERE race = '1' OR race = '11' OR race = '4' OR race = '7' OR race = '3'";    
		
		$row = $db->fetch_all($sql);
		if($row):
		$horde = $row[0]["Count(guid)"];
		else:
		$horde = 0;
		endif;
		return $horde;

	} // End get_maxonline

	
	function list_chars(){
		global $db;
		$sql = "SELECT Count(guid) FROM ".$this->realmdb.".".DB_CHARS."";
		$row = $db->fetch_all($sql);
		if($row):
		$row = $row[0]["Count(guid)"];
		else:
		$row = 0;
		endif;
		return $row;
	}
	
	function list_acc(){
		global $db;
		$sql = "SELECT Count(id) FROM ".DB_NAME.".".DB_ACCOUNT."";
		$row = $db->fetch_all($sql);
		if($row):
		$row = $row[0]["Count(id)"];
		else:
		$row = 0;
		endif;
		return $row;
	}
	
	function get_ban(){
		global $db;
		$sql = "SELECT Count(id) FROM ".DB_NAME.".".DB_BAN." WHERE active = '1'";
		$row = $db->fetch_all($sql);
		if($row):
		$row = $row[0]["Count(id)"];
		else:
		$row = 0;
		endif;
		return $row;
	}
	
	
	function get_topkills() {
		global $db;
		$sql = "SELECT name, totalKills FROM ".$this->realmdb.".".DB_CHARS." ORDER BY totalKills DESC LIMIT 0,20";
		$row = $db->fetch_all($sql);
		return $row;
	} // Fim TopKills

	function get_toparena($type) {
		global $db;
		$type = (int)$type;
        $teamType = array(
                '2' => '2x2',
                '3' => '3x3',
                '5' => '5x5'
                );
       $sql = mysql_query("SELECT * 
FROM ".$this->realmdb.".arena_team 
JOIN ".$this->realmdb.".arena_team_stats ON ( arena_team.arenateamid = arena_team_stats.arenateamid ) 
WHERE type = {$type} ORDER BY rating DESC LIMIT 0,20");

echo "<center><table id=\"dataTable\"><THEAD>
<tr>
<th>Team Name</th>
<th align=center>Command Type</th>
<th align=center><center>Team Leader</center></th>
<th>Faction</th>
<th align=center>Rating</th>

</tr></THEAD>";
while ($row = mysql_fetch_array($sql)):

        	$query_num = mysql_query("SELECT COUNT(*) FROM ".$this->realmdb.".`arena_team_member` WHERE `arenateamid`='$row[arenateamid]' ");
        	$gleader = "SELECT name,race FROM ".$this->realmdb.".".DB_CHARS." WHERE `guid`='$row[captainguid]' ";
        	$myrow = mysql_fetch_array(mysql_query($gleader));
        	$top = mysql_query("SELECT * FROM ".$this->realmdb.".`arena_team_stats` WHERE `arenateamid`='$row[arenateamid]'");
        	$toprow = mysql_fetch_array($top);

        	if($myrow['race']=="1" or $myrow['race']=="3" or $myrow['race']=="4" or $myrow['race']=="7" or  $myrow['race']=="11"):
   
        		$faction = "alliance";
        		else:
        		$faction = "horde";
        		endif;
        		
        		echo "
        		<tr>
        		<td  class=\"alt\">
        		<p style='padding-left: 5px'>".$row['name']."</p>
        		</td>
        		<td  align=center><center>".$teamType[$row['type']]."</center></td>

        		<td>".$myrow['name']."</td>
        		<td align=center><center><img src='".BASE_PATH."/public/images/icons/".$faction.".jpg' title=".$faction."></center></td>
		<td align=right><p style='padding-right: 8px'>".$toprow['rating']."</p></td></tr>";

	endwhile;
	echo "</table></center><br>";

} // Ends get_toparena

	function get_banned() {
		global $db;
		$sql = "SELECT `ab`.*, `a`.`username` FROM `account_banned` as `ab` "."LEFT JOIN `account` as `a` ON `a`.`id` = `ab`.`id` ;";
		$row = $db->fetch_all($sql);
		return $row;
	} // Ends get_banned

} // Class Ends


?>